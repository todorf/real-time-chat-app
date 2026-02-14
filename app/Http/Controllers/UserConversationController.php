<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\ConversationUser;
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

    public function leave(User $user, Conversation $conversation)
    {
        if (!$user || !$conversation) {
            return;
        }

        $conversationUser = ConversationUser::where(
            'user_id',
            $user->id,
        )->where('conversation_id', $conversation->id);

        try {
            $conversationUser->delete();
            return redirect()
                ->route('conversations.index')
                ->with('success', 'You left the conversation');
        } catch (Exception $e) {
            return redirect()
                ->route('conversations.index')
                ->withErrors(
                    'There was a problem with leaving this conversation: ' .
                        $e->getMessage(),
                );
        }
    }
}
