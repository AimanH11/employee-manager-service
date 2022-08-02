<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Employees extends Model
{
    use HasFactory;
    protected $dates = [
        'date_of_joining',
    ];
    use HasFactory;

    protected $fillable = ['user_id','name', 'email','date_of_joining','bio'];

    public function getDateOfJoiningAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }

}
