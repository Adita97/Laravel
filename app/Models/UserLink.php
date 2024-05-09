<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLink extends Model
{
    use HasFactory;

    protected $fillable = ['website', 'twitter', 'instagram'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
