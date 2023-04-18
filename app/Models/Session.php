<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questionnaire;
use App\Models\User;

class Session extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'format',
        'wordCount',
        'durationHours',
        'durationMinutes',
        'durationSeconds',
    ];

    /**
     * The users that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_sessions', 'session_id', 'user_id');
    }

    /**
     * Get current user roles.
     */
    public function getUsers()
    {
        return $this->users->pluck('name')->toArray();
    }

    /**
     * Get current user questionnaires.
     */
    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }

}
