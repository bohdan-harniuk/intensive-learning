<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LessonsGroup;

class AppController extends Controller
{
    public function getAdminDashboard()
    {
        return view('admin.dashboard.dashboard');
    }
    
    public function getLanding()
    {
        return view('landing', ['lessons_groups' => LessonsGroup::all()]);
    }
}
