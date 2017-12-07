<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/7/2017
 * Time: 2:00 AM
 */

namespace App\Http\ViewComposers;


use Illuminate\View\View;

class ContactUnReadComposer
{

    public function __construct(UserRepository $users)
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', $this->users->count());
    }
}