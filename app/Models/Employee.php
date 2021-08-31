<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname','lname','companie_id','email','mobile'
    ];

    public function companie()
    {
        return $this->belongsTo(Companie::class,'companie_id');
    }
}
