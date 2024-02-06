<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;


    protected $table = 'programs';

    protected $fillable = [
        'name',
        'wpa_id',
        'status',
        'active',
        'startdate',
        'endate',
        'objective',
        'description',


    ];

    public function wpa(){

        return $this->belongsTo(Wpa::class);

     }

     public function outcomes(){

        return $this->hasMany(Outcome::class);

     }

     public function subprograms(){

        return $this->hasMany(Subprogram::class);

     }




}
