<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

      public function applicants(){
        return $this->hasMany(Applicant::class);
    }
    public function grade(){
        return $this->BelongsTo(Grade::class);
    }

        public function subject(){
        return $this->belongsToMany(Subject::class);
    }

  public function attendance(){
        return $this->hasOne(Attendance::class);
    }}