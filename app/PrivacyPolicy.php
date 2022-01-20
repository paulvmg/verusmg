<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateGenericClass;

class PrivacyPolicy extends Model
{
    use  UpdateGenericClass;

    protected $table = 'privacy_policy';

    protected $fillable = ['description'];
}
