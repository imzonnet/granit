<?php

namespace Components\Products\Presenters;

use Robbo\Presenter\Presenter;
use Components\Products\Models\Product;

class ProductColorPresenter extends Presenter {

    /**
     * Get the creation date of the page
     * @return string
     */
    public function date() {
        return $this->created_at->format('d') . '<br>' . $this->created_at->format('M') . '<br>' . $this->created_at->format('Y');
    }

    /**
     * Get the page's status
     * @return string
     */
    public function status() {
        return \Str::title($this->status);
    }

    /**
     * Get the page's status
     * @return string
     */
    public function product() {
        return Product::findOrFail($this->product_id)->name;
    }

    /**
     * Get The price
     */
    public function getPrice() {
        $html = '';
        if( $this->sale > 0 ) {
            $new = $this->price - $this->price*$this->sale/100;
            $html .= '<span class="product-price">Kr.'.$new.',-</span><span class="old-price">Kr.$'.$this->price.',-</span>';
        } else {
            $html .= '<span class="product-price">Kr.'.$this->price.',-</span>';
        }
        return $html;
    }
    
    /**
     * Get the product's author
     * @return string
     */
    public function author() {
        try {
            $user = \Sentry::findUserById($this->created_by);
            return $user->username;
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return '';
        }
    }

}
