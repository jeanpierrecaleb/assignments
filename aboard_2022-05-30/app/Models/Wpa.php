<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wpa extends Model
{
    use HasFactory;

    protected $table = 'wpas';

    protected $fillable = [

        'name',
        'directorate_id',
        'user_id',
        'status',
        'active',
        'startdate',
        'endate',
        'description',

        ];




        public function user(){

        return $this->belongsTo(User::class);

     }

        public function directorate(){

        return $this->belongsTo(Directorate::class);

        }

        public function programs (){

            return $this->hasMany(Program::class);
        }

}
