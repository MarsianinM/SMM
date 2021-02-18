<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message', 'sender_id', 'receiver_id', 'parent_id', 'read'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
