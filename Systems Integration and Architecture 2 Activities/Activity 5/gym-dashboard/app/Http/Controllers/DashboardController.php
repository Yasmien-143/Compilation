<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->json();

        return view('dashboard', compact('users', 'posts'));
    }
}