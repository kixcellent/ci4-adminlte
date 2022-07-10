<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function getIndex()
    {
        return view('admin/dashboard');
    }
}
