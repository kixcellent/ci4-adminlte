<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class Test extends BaseController
{
    public function getIndex()
    {
        // $data = plural('category');
        // $data = number_to_currency(1234.56, 'PHP', 'en_US', 2);

        // $db = db_connect();
        // $data = $db->getForeignKeyData('users');
        // $userModel = model(UserModel::class);
        // $data = $userModel->find();
        $data = auth()->user()->identities;
        
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        // echo form_open('email/send');
        // return view('test');
    }

    public function getPage()
    {
        return view('test');
    }
}
