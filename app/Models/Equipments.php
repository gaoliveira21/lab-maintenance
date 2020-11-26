<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    protected $fillable = ['computers', 'projectors', 'televisions', 'laboratory_id'];
}
