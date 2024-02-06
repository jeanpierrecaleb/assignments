<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $table = 'outcomes';


    protected $fillable = [

        'name',
        'program_id',

        'status',
        'objective',
        'description',
        'indicators',



    ];



    public function program(){

        return $this->belongsTo(Program::class);

        }

        public function ocindicators (){

            return $this->hasMany(Ocindicator::class);
    }








}
