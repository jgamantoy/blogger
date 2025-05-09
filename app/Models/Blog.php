<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'publish',
        'banner'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
