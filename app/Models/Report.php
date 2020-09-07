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

    public function labs()
    {
        return $this->belongsToMany(Laboratory::class, 'reports_laboratories', 'report_id', 'laboratory_id');
    }
}
