<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['title', 'text', 'active', 'user_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
