<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('admin/login');
    }

    public function register(): string
    {
        // Placeholder for register view
        return view('admin/login'); // Or just return login for now if register view doesn't exist
    }
}

?>