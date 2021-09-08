<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Companie extends Model
{
    use HasFactory;
    use softDeletes;
   
    protected $dates = ['deleted_at'];
    // protected $table = ['companies'];
    protected $fillable = [
        'name','email','logo','website'
    ];
}
