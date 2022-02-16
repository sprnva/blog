<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Auth;
use App\Core\Filesystem\Filesystem;
use App\Core\Request;

class ProfileController
{
    protected $pageTitle;

    public function index()
    {
        $pageTitle = "Profile";
        $user_id = Auth::user('id');
        $user_data = DB()->select("*", 'users', "id='$user_id'")->get();

        return view('/auth/profile', compact('user_data', 'pageTitle'));
    }

    public function update()
    {
        $request = Request::validate('/profile', [
            'email' => ['required', 'email']
        ]);

        $user_id = Auth::user('id');

        $update_data = [
            'email' => "$request[email]",
            'fullname' => "$request[name]",
            'job_desc' => $request['job_desc']
        ];

        DB()->update('users', $update_data, "id = '$user_id'");
        redirect("/profile", ["message" => "Profile information updated."]);
    }

    public function changePass()
    {
        $request = Request::validate('/profile', [
            'old-password' => ['required'],
            'new-password' => ['required'],
            'confirm-password' => ['required']
        ]);

        $response_message = Auth::resetPassword($request);
        redirect("/profile", $response_message);
    }

    public function destroy($user_id)
    {
        Request::validate();
        DB()->delete('users', "id = '$user_id'");

        Auth::logout();
    }

    public function uploadAvatar()
    {
        $user_id = Auth::user('id');

        if (Request::hasFile('upload_file')) {
            $file_tmp = $_FILES['upload_file']['tmp_name'];

            $file_name = explode('_', str_replace(array('.', ' ', ',', '-'), '_', $_FILES['upload_file']['name']));
            array_pop($file_name);

            $fileSize = $_FILES['upload_file']['size'] / 1000000;
            $file_type = explode('.', $_FILES['upload_file']['name']);
            $file_type_end = end($file_type);
            $fileType = strtoupper($file_type_end);

            $filename = strtoupper(randChar(4)) . date('Ymdhis') . "." . $file_type_end;
            $folder = uniqid() . '-' . date('Ymdhis');
            $temp_dir = "public/storage/images/{$user_id}";
            $folderName = implode('_', $file_name);

            $formData = [
                "avatar" => "/storage/images/{$user_id}/{$filename}"
            ];

            DB()->update("users", $formData, "id = '$user_id'");

            if (!Filesystem::exists($temp_dir . "/" . $filename)) {
                Request::storeAs($file_tmp, $temp_dir, $_FILES['upload_file']['type'], $filename);
            }

            redirect('/profile', ["message" => "Avatar updated."]);
        } else {
            redirect('/profile', ["message" => "no file chosen."]);
        }
    }
}
