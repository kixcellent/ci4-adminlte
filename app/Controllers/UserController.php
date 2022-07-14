<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $user = new \App\Models\UserModel();

        $data = [
            'users' => $user->paginate(10, 'group1'),
            'pager' => $user->pager,
            'currentPage' => $user->pager->getCurrentPage('group1'), // The current page number
            'totalPages'  => $user->pager->getPageCount('group1'),   // The total page count
        ];

        return view('users/index', $data);
    }
}
