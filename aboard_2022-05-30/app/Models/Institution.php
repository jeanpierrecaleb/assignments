<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $table = 'institutions';

    protected $fillable = [
        'name',
        'country',
        'town',
        'date_creation',
        'address',
        'meta_descrip',
        'description',


    ];

    public function departments (){

        return $this->hasMany(Department::class);
    }

}
