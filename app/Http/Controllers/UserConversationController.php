<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Exception;

class UserConversationController extends Controller
{
    public function conversations(User $user)
    {
        $conversations = $user->conversations();

        return view('users.conversations', compact('user', 'conversations'));
    }

    public function join(User $user, Conversation $conversation)
    {
        if (!$user) {
            return redirect()
                ->route('login')
                ->with('error', 'You must be logged in to join a conversation');
        }

        try {
            $conversation->conversationUser()->create(['user_id' => $user->id]);
        } catch (Exception $e) {
            return redirect()
                ->route('conversations.index')
                ->with(
                    'error',
                    'Failed to join conversation: ' . $e->getMessage(),
                );
        }

        return redirect()
            ->route('conversations.index')
            ->with(
                'success',
                'You have joined conversation ' . $conversation->name,
            );
    }
}
