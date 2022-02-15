<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Request;

class BlogController
{
    protected $pageTitle;

    public function index()
    {
        $pageTitle = "Articles";

        $blogs = DB()->selectLoop("*", "blog")->paginate(10);

        // display GUI of crud index
        return view('/blog/index', compact('pageTitle', 'blogs'));
    }

    public function store()
    {
        // the request will be unique to test table
        // [means no duplicated in test table] 
        $request = Request::validate('', [
            "title" => ['required', 'max:150', 'unique:blog'],
            "content" => ['required']
        ]);

        if (empty($request['validationError'])) {

            $store_data = [
                'title' => "$request[title]",
                'description' => addslashes($request['description'])
            ];

            // test is the table in our database
            $result = DB()->insert('blog', $store_data);

            // echo the response we get from our query
            // insert query output will be 1 = inserted/ok , 0 = error
            echo json_encode($result);
        } else {

            // echo the validationError
            echo json_encode($request['validationError']);
        }
    }

    public function edit($id)
    {
        $pageTitle = "Article Edit";

        $data = DB()->select("*", "blog", "id = '$id'")->get();

        // display the GUI of the edit page
        return view('/blog/edit', compact('pageTitle', 'data'));
    }

    public function update()
    {
        $id = $_REQUEST['id'];

        // the request will be unique to test table but disregard the same id
        // [means no duplicated in test table but disregard the same id] 
        $request = Request::validate('', [
            "title" => ['required', 'max:150', 'unique:blog,id,' . $id],
            "content" => ['required'],
        ]);

        if (empty($request['validationError'])) {

            $update_data = [
                'title' => "$request[title]",
                'content' => addslashes($request['content'])
            ];

            $result = DB()->update('blog', $update_data, "id = '$id'");

            // echo the response we get from our query
            // update query output will be 1 = inserted/ok , 0 = error
            echo json_encode($result);
        } else {

            // echo the validationError
            echo json_encode($request['validationError']);
        }
    }

    public function deleteItem()
    {
        // nothing to validate? just leave it blank
        $request = Request::validate();

        $result = DB()->delete('test', "id = '$request[id]'");

        // echo the response we get from our query
        // delete query output will be 1 = inserted/ok , 0 = error
        echo json_encode($result);
    }

    public function detail($id)
    {
        $pageTitle = "Article Edit";

        $blog = DB()->select("*", "blog", "id = '$id'")->get();

        // display the GUI of the edit page
        return view('/article', compact('pageTitle', 'blog'));
    }
}
