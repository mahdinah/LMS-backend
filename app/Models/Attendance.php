<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
protected $fillable = [
        'date',
        'status',
    ];
      public function section(){
        return $this->belongsTo(Section::class);
    }
       public function staff(){
        return $this->BelongsTo(Staff::class);
    }
      public function applicant(){
        return $this->BelongsTo(Attendance::class);
    }

}
