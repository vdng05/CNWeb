<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\School;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    //
    use HasFactory;
    //
    protected $fillable = [
        'school_id',
        'full_name',
        'student_id',
        'email',
        'phone',
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
