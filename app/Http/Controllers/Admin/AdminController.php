<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{

    /* the following method is to show the admin page */
    public  function index()
    {

        return view('Admin.index');
    }


}
