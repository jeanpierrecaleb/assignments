<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spactivity extends Model
{
    use HasFactory;

    protected $table = 'spactivities';

    protected $fillable = [
        'name',
        'subprogram_id',
        'status',
        'pyearactivity',
        'code',
        'category',
        'location',
        'ecowas_budget',
        'dornor_budget',
        'startdate',
        'endate',
        'responsible_officer',
        'output_id',
        'l_comments',


    ];

    public function subprogram(){

        return $this->belongsTo(Subprogram::class);

     }

     public function output(){

        return $this->belongsTo(Output::class);

     }
}
