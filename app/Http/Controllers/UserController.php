<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function conversations(User $user)
    {
        $conversations = $user->conversations();

        return view('users.conversations', compact('user', 'conversations'));
    }
}
