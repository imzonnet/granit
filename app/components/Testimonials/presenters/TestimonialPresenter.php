<?php

namespace Components\Testimonials\Presenters;

use Robbo\Presenter\Presenter;

class TestimonialPresenter extends Presenter {

    /**
     * Get the creation date of the page
     * @return string
     */
    public function date() {
        return $this->created_at->format('d') . '<br>' . $this->created_at->format('M') . '<br>' . $this->created_at->format('Y');
    }

    /**
     * Rate
     */
    public function rate() {
        $output = "";
        $i = 0;
        while ($i < $this->rate) {
            $output .= '<span class="fa fa-star"></span>';
            $i++;
        }
        $j = 0;
        while ($j < (5 - $this->rate)) {
            $output .= '<span class="fa fa-star-o"></span>';
            $j++;
        }
        return $output;
    }

}
