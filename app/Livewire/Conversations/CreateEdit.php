<?php

namespace App\Livewire\Conversations;

use App\Models\Conversation;
use Livewire\Component;

class CreateEdit extends Component
{
    public ?Conversation $conversation;
    public string $name;
    public string $type;

    public function render()
    {
        return view('livewire.conversations.create-edit');
    }
}
