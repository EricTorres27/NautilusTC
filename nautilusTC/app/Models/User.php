<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Session;
use App\Models\Questionnaire;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'idNumber',
        'email',
        'consent_information',
        'consent_practices',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }

    /**
     * Get current user roles.
     */
    public function getRoles()
    {
        return $this->roles->pluck('name')->toArray();
    }

    /**
     * The sessions that belong to the user.
     */
    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'users_sessions', 'user_id', 'session_id');
    }

    /**
     * Get current user roles.
     */
    public function getSessions()
    {
        return $this->sessions->pluck('id')->toArray();
    }

    /**
     * Get current user questionnaires.
     */
    public function questionnaires()
    {
        return $this->hasMany('App\Questionnaires');
    }

}
