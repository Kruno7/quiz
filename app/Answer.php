<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'answer', 'correct', 'question_id'
    ];


    public function question ()
    {
        return $this->belongsTo(Question::class);
    }

}
