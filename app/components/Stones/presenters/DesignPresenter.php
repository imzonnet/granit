
<?php namespace Components\Stones\Presenters;

use Robbo\Presenter\Presenter;

class DesignPresenter extends Presenter
{
    /**
     * Get the creation date of the page
     * @return string
     */
    // public function date()
    // {
    //     return $this->created_at->format('d') . '<br>' . $this->created_at->format('M') . '<br>' . $this->created_at->format('Y');
    // }

    /**
     * Get the page's status
     * @return string
     */
    public function status()
    {
        return \Str::title($this->status);
    }

    /**
     * Get the category's author
     * @return string
     */
    // public function author()
    // {
    //     try {
    //         $user = \Sentry::findUserById($this->created_by);
    //         return $user->username;
    //     } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
    //         return '';
    //     }
    // }

}
