<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Session;

class Questionnaire extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6'
    ];

    /**
     * Get current user questionnaires.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get current session questionnaires.
     */
    public function session():BelongsTo
    {
        return $this->belongsTo(Session::class);
    }
}
