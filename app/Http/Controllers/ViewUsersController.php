<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewUsersController extends Controller
{
    public function index()
    {
        $users = User::with('media')
            ->where('id', '!=', Auth::id())
            ->withCount('posts')
            ->latest()
            ->paginate();
        
        return view('show-users-to-follow', [
            'users' => $users,
        ]);
    }
}
