<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

 public function attendance(){
        return $this->hasOne(Attendance::class);
    }    
  public function section(){
        return $this->belongsTo(Section::class);
    }
}
