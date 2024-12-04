<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $data = [
            'user' => 'test',
            'data' => 'data-test',
            'status' => 500,
        ];

        return response()->json($data, 500);
        return view('home', compact('user'));
    }

    public function post()
    {
        return view('home');
    }

    public function test()
    {
        return view('home');
    }
}
