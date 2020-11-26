<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $fillable = ['name', 'active'];

    public function equipments()
    {
        return $this->hasOne('App\Models\Equipments', 'laboratory_id');
    }
}
