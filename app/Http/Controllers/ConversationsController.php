<?php

namespace App\Http\Controllers;

use App\Enums\TypeOptions;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Exception;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function index()
    {
        $conversations = Conversation::all();

        return view('conversations.index', compact('conversations'));
    }

    public function create()
    {
        return view('conversations.create-edit', [
            'title' => 'Create Conversation',
            'conversation' => null,
        ]);
    }

    public function edit(Conversation $conversation)
    {
        return view('conversations.create-edit', [
            'title' => 'Edit Conversation',
            'conversation' => $conversation,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:conversations,name',
            'type' =>
                'required|string|in:' .
                implode(',', TypeOptions::getAllOptions()),
        ]);

        try {
            Conversation::create($request->only('name', 'type'));
        } catch (Exception $e) {
            return redirect()
                ->route('conversations.create')
                ->with(
                    'error',
                    'Failed to create conversation: ' . $e->getMessage(),
                );
        }

        return redirect()
            ->route('conversations.index')
            ->with('success', 'Conversation created successfully');
    }

    public function update(Request $request, Conversation $conversation)
    {
        $request->validate([
            'name' =>
                'required|string|max:255|unique:conversations,name,' .
                $conversation->id,
            'type' =>
                'required|string|in:' .
                implode(',', TypeOptions::getAllOptions()),
        ]);

        try {
            $conversation->update($request->only('name', 'type'));
        } catch (Exception $e) {
            return redirect()
                ->route('conversations.edit', $conversation->id)
                ->with(
                    'error',
                    'Failed to update conversation: ' . $e->getMessage(),
                );
        }

        return redirect()
            ->route('conversations.index', $conversation->id)
            ->with(
                'success',
                'Conversation ' . $conversation->name . ' updated successfully',
            );
    }

    public function destroy(Conversation $conversation)
    {
        try {
            $conversation->delete();
        } catch (Exception $e) {
            return redirect()
                ->route('conversations.index')
                ->with(
                    'error',
                    'Failed to delete conversation: ' . $e->getMessage(),
                );
        }

        return redirect()
            ->route('conversations.index')
            ->with(
                'success',
                'Conversation ' . $conversation->name . ' deleted successfully',
            );
    }

    public function show(Conversation $conversation)
    {
        return view('conversations.show', compact('conversation'));
    }

    public function join(Conversation $conversation)
    {
        $user = auth()->user();
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
