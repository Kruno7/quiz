<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'teacher_id', 'subject_id',
    ];

    public function questions ()
    {
        return $this->hasMany(Question::class);
    }
}
