<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $editing = false;
        $tasks = Todo::orderBy('priority', 'DESC')->get();

        return view('home', compact('editing', 'tasks'));
    }
}
