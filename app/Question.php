<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'quiz_id',
    ];

    public function answers ()
    {
        return $this->hasMany(Answer::class);
    }

    public function quiz ()
    {
        return $this->belongsTo(Quiz::class);
    }


}
