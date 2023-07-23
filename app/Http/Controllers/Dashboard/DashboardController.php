<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user_dashbaord()
    {
        return view('dashboard.user.index');
    }

    public function admin_dashbaord()
    {
        return view('dashboard.admin.index');
    }
}
