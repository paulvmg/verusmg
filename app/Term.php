<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateGenericClass;

class Term extends Model
{
    use UpdateGenericClass;

    protected $table = 'terms_conditions';

    protected $fillable = ['description'];
}
