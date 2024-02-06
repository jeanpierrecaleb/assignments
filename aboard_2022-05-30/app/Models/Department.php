<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = [
        'institution_id',
        'name',
        'country',
        'town',
        'address',
        'date_creation',
        'description'

    ];


    public function institution(){

       return $this->belongsTo(Institution::class);

    }



    public function directorates (){

        return $this->hasMany(Directorate::class);

    }
}
