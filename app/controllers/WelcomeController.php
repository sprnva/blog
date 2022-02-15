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


    public function detail($id)
    {
        $pageTitle = "Article Detail";

        $blog = DB()->select("*", "blog", "id = '$id'")->get();

        // display the GUI of the edit page
        return view('/article', compact('pageTitle', 'blog'));
    }
}
