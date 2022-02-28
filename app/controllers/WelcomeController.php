<?php

namespace App\Controllers;

class WelcomeController
{
    protected $pageTitle;

    public function index()
    {
        $pageTitle = "The Sprnva Blog";

        $blogs = DB()->selectLoop("*", "blog", 'id > 0 ORDER BY id DESC')->paginate(50)->with([
            "users" => ['user_id', 'id']
        ]);

        return view('/welcome', compact('pageTitle', 'blogs'));
    }

    public function home()
    {
        $pageTitle = "Home";

        return view('/home', compact('pageTitle'));
    }


    public function detail($url)
    {
        $pageTitle = "The Sprnva Blog";

        $blogs = DB()->select("*", "blog", "url = '$url'");

        if (!$blogs->get()) {
            return abort(404, 'NOT FOUND');
        } else {

            $blog = $blogs->with([
                "users" => ['user_id', 'id']
            ])->get();

            // display the GUI of the edit page
            return view('/article', compact('pageTitle', 'blog'));
        }
    }
}
