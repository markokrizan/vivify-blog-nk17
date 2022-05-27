<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        if (Auth::id() != $user->id) {
            $user->load([
                'posts' => function ($q) {
                    return $q->published();
                }
            ]);
        }

        return view('users.show', compact('user'));
    }
}
