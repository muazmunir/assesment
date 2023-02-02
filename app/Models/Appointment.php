<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time', 'end_time', 'duration', 'businessperson_id',
    ];
 
    public function businessperson()
    {
        return $this->belongsTo(Calendar::class);
    }
}
