<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subprogram extends Model
{
    use HasFactory;


    protected $table = 'subprograms';

    protected $fillable = [
        'name',
        'program_id',
        'status',
        'active',
        'startdate',
        'endate',
        'objective',
        'description',


    ];

    public function program(){

        return $this->belongsTo(Program::class);

     }

     public function outputs(){

        return $this->hasMany(Output::class);

     }

     public function spactivities(){

        return $this->hasMany(Spactivity::class);

     }

}
