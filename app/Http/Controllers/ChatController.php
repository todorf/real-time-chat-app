<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('admin.chats.index');
    }

    public function create()
    {
        return view('admin.chat.create');
    }
}
