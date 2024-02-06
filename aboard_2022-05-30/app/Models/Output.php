<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $table = 'outputs';


    protected $fillable = [

        'name',
        'subprogram_id',
        'status',
        'quater',
        'description',
        'outcome_id',
        'risks',
        'indicators',



    ];



    public function subprogram()
    {

        return $this->belongsTo(Subprogram::class);
    }

    public function otpindicators()
    {

        return $this->hasMany(Otpindicator::class);
    }
}
