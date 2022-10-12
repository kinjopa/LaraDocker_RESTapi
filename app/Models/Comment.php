<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Comment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "posts";

    protected $fillable = [
        'id',
        'user_id',
        'comment',
        'date',
        'status'
    ];
    public function user_id(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
