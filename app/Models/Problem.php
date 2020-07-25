<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'laboratory_id', 'active', 'status'];

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function locale()
    {
        return $this->belongsTo('App\Models\Laboratory', 'laboratory_id', 'id');
    }
}
