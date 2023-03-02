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
       public function staff(){
        return $this->BelongsToMany(Staff::class);
    }
      public function applicant(){
        return $this->BelongsTo(Attendance::class);
    }

}
