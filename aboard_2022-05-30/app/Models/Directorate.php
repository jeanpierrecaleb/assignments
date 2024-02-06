<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Directorate extends Model
{
    use HasFactory;

    protected $table = 'directorates';

    protected $fillable = [

        'name',
        'department_id',
        'country',
        'city',
        'address',
        'description',

    ];


    public function department(){

        return $this->belongsTo(Department::class);

     }

     public function wpas(){
         return $this->hasMany(Wpa::class);
     }


}
