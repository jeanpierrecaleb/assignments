<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocindicator extends Model
{
    use HasFactory;

    protected $table = 'Ocindicators';

    protected $fillable = [
        'name',
        'outcome_id',
        'baseline_date',
        'target_date',
        'sector',
        'measure_unit',
        'baseline',
        'target',

        'baseline_description',
        'target_description',



    ];

    public function outcome (){

        return $this->belongsTo(Outcome::class);
    }
}
