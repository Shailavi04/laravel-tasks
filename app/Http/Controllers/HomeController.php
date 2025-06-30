<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch raw data arrays
        $newsArray = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        $usersArray = Http::get('https://jsonplaceholder.typicode.com/users')->json();

        // Paginate News
        $newsCurrentPage = LengthAwarePaginator::resolveCurrentPage('news');
        $newsPerPage = 3;
        $newsItems = array_slice($newsArray, ($newsCurrentPage - 1) * $newsPerPage, $newsPerPage);
        $news = new LengthAwarePaginator($newsItems, count($newsArray), $newsPerPage, $newsCurrentPage, [
            'pageName' => 'news',
        ]);
        $news->withPath('/');

        // Paginate Users
        $usersCurrentPage = LengthAwarePaginator::resolveCurrentPage('users');
        $usersPerPage = 5;
        $userItems = array_slice($usersArray, ($usersCurrentPage - 1) * $usersPerPage, $usersPerPage);
        $users = new LengthAwarePaginator($userItems, count($usersArray), $usersPerPage, $usersCurrentPage, [
            'pageName' => 'users',
        ]);
        $users->withPath('/');

        return view('welcome', compact('news', 'users'));
    }

    public function user($id)
    {
        $user = Http::get("https://jsonplaceholder.typicode.com/users/{$id}")->json();
        $posts = Http::get("https://jsonplaceholder.typicode.com/posts", [
            'userId' => $id
        ])->json();

        return view('user', compact('user', 'posts'));
    }
}
