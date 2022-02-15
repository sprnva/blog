<?php

namespace App\Controllers;

class WelcomeController
{
    protected $pageTitle;

    public function index()
    {
        $pageTitle = "The Sprnva Blog";

        $blogs = DB()->selectLoop("*", "blog")->paginate(50);

        return view('/welcome', compact('pageTitle', 'blogs'));
    }

    public function home()
    {
        $pageTitle = "Home";

        return view('/home', compact('pageTitle'));
    }
}
