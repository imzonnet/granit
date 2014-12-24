<?php

namespace Components\Products\Presenters;

use Robbo\Presenter\Presenter;
use Components\Products\Models\Category;

class ProductPresenter extends Presenter {

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
    public function category() {
        return Category::findOrFail($this->cat_id)->name;
    }

    /**
     * Get classes color of a product
     */
    public function getClasses() {
        $classes = array();
        foreach ($this->productColor as $product_color) {
            $classes[] = \Str::slug($product_color->color->name) . '-' . $product_color->color->id;
        }
        return implode(' ', $classes);
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
