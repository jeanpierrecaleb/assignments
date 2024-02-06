<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otpindicator extends Model
{
    use HasFactory;

    protected $table = 'otpindicators';


    protected $fillable = [

        'name',
        'output_id',
        'baseline_date',
        'target_date',
        'sector',
        'measure_unit',
        'baseline',
        'target',

        'baseline_description',
        'target_description',

    ];



    public function output(){

        return $this->belongsTo(Output::class);

        }
}
