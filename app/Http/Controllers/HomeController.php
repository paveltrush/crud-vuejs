<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    /**
     * Home page is products page for now.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function __invoke()
    {
        return redirect('/products');
    }
}
