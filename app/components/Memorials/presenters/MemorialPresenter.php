<?php

namespace Components\Memorials\Presenters;

use Robbo\Presenter\Presenter;
use Carbon\Carbon;

class MemorialPresenter extends Presenter {

    /**
     * Get the creation date of the page
     * @return string
     */
    public function date() {
        return $this->created_at->format('d') . '<br>' . $this->created_at->format('M') . '<br>' . $this->created_at->format('Y');
    }

    /**
     * Get the birthday
     */
    public function birthday() {
        $time = date_create($this->birthday);
        return date_format($time,"M d, Y") . ' at ' . date_format($time,"h:mA");
    }
    /**
     * Get the death
     */
    public function death() {
        $time = date_create($this->death);
        return date_format($time,"M d, Y") . ' at ' . date_format($time,"h:mA");
    }

    /**
     * Get the category's author
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
