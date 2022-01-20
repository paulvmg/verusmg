<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\GenericClassWithMedia;

class User extends Authenticatable
{
    use Notifiable;
    use GenericClassWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido', 'email', 'password', 'user_role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $images_attr = ['dni_mano', 'dni_frente', 'dni_dorso'];
    protected $folder_images = 'user_images';

    public function admin()
    {
        return $this->user_role === 'admin';
    }

    public function files()
    {
        return $this->hasMany('App\Archivo');
    }

    public function requested_documents()
    {
        return $this->hasMany('App\RequestedDocument');
    }

    public function documents()
    {
        return $this->belongsToMany('App\Document','requested_documents');
    }

    //SCOPES
    public function scopeUsers($query)
    {
        return $query->where('user_role','!=','admin');
    }
    //END SCOPES

    public static function roles_list()
    {
        return ['persona_juridica' => 'Persona Jurídica', 'persona_fisica' => 'Persona Física'];
    }

    public function getNombreCompletoAttribute()
    {
        return $this->nombre.' '.$this->apellido;
    }
}
