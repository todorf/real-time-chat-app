<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use SoftDeletes;

    protected $table = 'conversations';
    protected $fillable = ['type', 'name'];

    public function conversationUser(): HasMany
    {
        return $this->hasMany(ConversationUser::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
