<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nis', 'name', 'gender', 'major', 'class'])]
#[Table('students')]
class Student extends Model
{
    use HasFactory;


public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
