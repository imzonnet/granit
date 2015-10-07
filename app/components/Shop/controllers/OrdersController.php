<?php 
namespace Components\Shop\Controllers;

use View, App, Str, Cart, Redirect, paypal, Request;
use Components\Shop\Models\Order;
use Components\Stones\Models\Design;
use Components\Shop\Models\ShopSetting;

/**
* https://github.com/Crinsane/LaravelShoppingcart
*/

class OrdersController extends \BaseController {

	function __construct() {

		View::addLocation( app_path() . '/components/Shop/views' );
        View::addNamespace('Shop', app_path() . '/components/Shop/views');

        $getModel = new ShopSetting;
        $this->settings = $getModel->get_settings();

        /* START paypal init */
        $pp_params = array(
        	'pp_user' 		=> trim( $this->settings->pp_user ),
        	'pp_pass' 		=> trim( $this->settings->pp_password ),
        	'pp_signature' 	=> trim( $this->settings->pp_signature ),
        	'pp_sandbox' 	=> ( $this->settings->pp_sandbox == 1 ) ? true : false,
        	);
        $this->paypal = new paypal\paypal();
        $this->paypal->init( $pp_params );
        /* END paypal init */

        parent::__construct();
	}

	/**
	* index
	*/
	public function index() {

		$content = Cart::content();

		$this->layout->title = 'Cart';
   	 	$this->layout->content = View::make('Shop::frontend.orders.index')
   	 	->with( 'cart', $content );
	}

	/**
	* checkout
	*/
	public function checkout() {

		$content = Cart::content();

		$this->layout->title = 'Checkout';
   	 	$this->layout->content = View::make('Shop::frontend.orders.checkout')
   	 	->with( 'cart', $content );
	}

	public function removeProduct( $rowId ) {
		Cart::remove($rowId);

		return Redirect::to("shop/cart");
		exit;
	}

	/**
	* add to cart
	*/
	public function addToCart() {
		extract( $_POST );

		if( isset( $did ) ) {
			$designItem = Design::findOrFail( $did );
			$designInfo = json_decode( $designItem->data );
			//print_r( $designInfo );die;
			$price = $designInfo->total_price;

			$product_code = md5( date('YmdHis') );

			Cart::add(
				array(
					'id' 	=> $designItem->id, 
					'name' 	=> $product_code, 
					'options'	=> array(
						'thumb' => $designItem->image, 
						'info'	=> $designItem->data,
						),
					'qty' 	=> 1, 
					'price' => $price, 
					)
				);
		}

		return Redirect::to("shop/cart");
		exit;
	}

	/**
	* updateCart
	*/
	public function updateCart() {
		extract( $_POST );
		
		if( isset( $cart['qty'] ) ) {
			foreach( $cart['qty'] as $k => $v ) {
				Cart::update( $k, array( 'qty' => $v ) );
			}
		}

		return Redirect::to("shop/cart");
		exit;
	}

	/**
	* editCheckout
	*/
	public function editCheckout() {
		extract( $_POST );

		$_user = \Sentry::getUser();
		$content = Cart::content();
		if( $_user->id && count( $content ) > 0 ) {
			$order_code = md5( date('YmdHis') );
			$products = array();

			foreach( $content as $cart_item ) {
				array_push( $products, array(
					'thumb' => $cart_item->options->thumb,
					'info'	=> json_decode( $cart_item->options->info, true ),
					'qty'	=> $cart_item->qty,
					'price'	=> $cart_item->price,
					) );
			}

			$data = array(
				'order_code' 		=> $order_code,
				'status' 			=> 'pending',
				'customer_message' 	=> $customer_message,
				'products' 			=> json_encode( $products ),
				'user_info' 		=> json_encode( $user ),
				'total_price'		=> Cart::total(),
				);

			$result = Order::create( $data );
			Cart::destroy();

			return Redirect::to("shop/payment/" . $result->id);
		}
		exit;
	}

	/**
	* payment
	*/
	function payment( $order_id ) {
		// echo $order_id;

		$order = Order::findOrFail( $order_id );

		$this->layout->title = 'Payment';
   	 	$this->layout->content = View::make('Shop::frontend.orders.payment')
   	 	->with( 'order', $order )
   	 	->with( 'settings', $this->settings )
   	 	->with( 'paypal', $this->paypal );
	}

	/**
	 * do_checkout
	 */
	function doCheckout() {
		if (session_id() == "") 
			session_start();

		$_SESSION["order_id"] = $_POST['order_id'];

		$returnURL = Request::root() . '/shop/return'; //$this->paypal->config_general['RETURN_URL'];
   		$cancelURL = Request::root() . '/shop/cancel'; //$this->paypal->config_general['CANCEL_URL']; 

		$resArray = $this->paypal->CallShortcutExpressCheckout( $_POST, $returnURL, $cancelURL );
	   	$ack = strtoupper( $resArray["ACK"] );

	   	// if SetExpressCheckout API call is successful
	   	if( $ack=="SUCCESS" || $ack == "SUCCESSWITHWARNING" ) {

			$this->paypal->RedirectToPayPal ( $resArray["TOKEN"] );
	   	}else {
		   	//Display a user friendly Error on the page using any of the following error information returned by PayPal
		   	$ErrorCode 			= urldecode( $resArray["L_ERRORCODE0"] );
		   	$ErrorShortMsg 		= urldecode( $resArray["L_SHORTMESSAGE0"] );
		   	$ErrorLongMsg 		= urldecode( $resArray["L_LONGMESSAGE0"] );
		   	$ErrorSeverityCode 	= urldecode( $resArray["L_SEVERITYCODE0"]);
		   	
		   	echo "SetExpressCheckout API call failed. ";
		   	echo "Detailed Error Message: " . $ErrorLongMsg;
		   	echo "Short Error Message: " . $ErrorShortMsg;
		   	echo "Error Code: " . $ErrorCode;
		   	echo "Error Severity Code: " . $ErrorSeverityCode;
	   	}	

		//print_r( $_POST ); die;
		exit;
	}

	function pp_return() {
		if (session_id() == "") 
			session_start();

		$token = "";
		$finalPaymentAmount =  $_SESSION["Payment_Amount"];

		if ( isset( $_REQUEST['token'] ) ) {
			$token = $_REQUEST['token'];
		} else if( isset( $_SESSION['TOKEN'] ) ) {
			$token = $_SESSION['TOKEN'];
		}

		if ( $token != "" ) {
			$resArrayGetExpressCheckout = $this->paypal->GetShippingDetails( $token );
			$ackGetExpressCheckout = strtoupper( $resArrayGetExpressCheckout["ACK"] );	
			if( $ackGetExpressCheckout == "SUCCESS" || $ackGetExpressCheckout == "SUCESSWITHWARNING") {
				//echo '<pre>'; print_r( $resArrayGetExpressCheckout ); echo '</pre>';

				$totalAmt   		= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_AMT"];
				$currencyCode       = $resArrayGetExpressCheckout["CURRENCYCODE"]; // 'Currency being used 
				if($_SESSION["Payment_Amount"] != $totalAmt || $_SESSION["currencyCodeType"] != $currencyCode)
					exit("Parameters in session do not match those in PayPal API calls");
			}else {
				echo 'Failed.';
			}
		}

		$resArrayDoExpressCheckout = $this->paypal->ConfirmPayment ( $finalPaymentAmount );
		$ackDoExpressCheckout = strtoupper( $resArrayDoExpressCheckout["ACK"] );

		if( $ackDoExpressCheckout == "SUCCESS" || $ackDoExpressCheckout == "SUCCESSWITHWARNING" ) {
			//echo '<pre>'; print_r( $resArrayDoExpressCheckout ); echo '</pre>';die;
			$order_id = $_SESSION["order_id"];
			$_data = array(
				'status' => 'success',
				'extra_fields' => json_encode( $resArrayDoExpressCheckout ),
				);
			Order::findOrFail( $order_id )->update($_data);
			
			return Redirect::to("shop/checkout/success");
		}else{
			//echo '<pre>'; print_r( $resArrayDoExpressCheckout ); echo '</pre>';die;
			return Redirect::to("shop/cancel");
		}

		//echo '<pre>'; print_r( $_SESSION ); echo '</pre>';

		$this->layout->title = 'Return';
   	 	$this->layout->content = View::make('Shop::frontend.orders.return');

   	 	
	}

	function pp_cancel() {
		$this->layout->title = 'Payment';
   	 	$this->layout->content = View::make('Shop::frontend.orders.cancel');
	}

	function pp_checkout_success() {
		$this->layout->title = 'Checkout Success';
   	 	$this->layout->content = View::make('Shop::frontend.orders.checkout_success');
	}

}
?>
