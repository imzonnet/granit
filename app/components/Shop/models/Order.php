<?php namespace Components\Shop\Models;
use App, Str;
use Robbo\Presenter\PresentableInterface;
use Components\Shop\Presenters\OrderPresenter;

class Order extends \Eloquent implements PresentableInterface {
    protected $table = 'granit_shop_orders';
    protected $fillable = array('order_code', 'status', 'customer_message', 'products', 'user_info', 'extra_fields', 'total_price', 'created_by');
    protected $guarded = array('id');

    /**
     * create
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        
        $attributes['created_by'] = current_user()->id;
        return parent::create($attributes);
    }

    /**
     * update
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {

        return parent::update($attributes);
    }

    /**
     * Implement presenter
     */
    public function getPresenter() {
        return new OrderPresenter($this);
    }

    public static function all_status()
    {
        return array(
            'published'   => 'Publish',
            'unpublished' => 'Unpublish',
            'drafted'     => 'Draft',
            'archived'    => 'Archive'
            );
    }
}