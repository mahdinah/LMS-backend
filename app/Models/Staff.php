<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',

    ];
        public function subject(){
        return $this->hasOne(Subject::class);
    }    
    
    
    public function attendance(){
        return $this->hasMany(Attendance::class);
    }


}
