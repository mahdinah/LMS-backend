<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
protected $fillable = [
        'name',
        'staff_id'
    ];
       public function staff(){
        return $this->belongsTo(Staff::class);
    }

        public function section(){
        return $this->belongsToMany(Section::class);
    }
}
?>