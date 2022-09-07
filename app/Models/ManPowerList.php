<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManPowerList extends Model
{
    use HasFactory;
    
    protected $guarded = ['*'];

    public function man_power()
    {
        return $this->belongsTo(ManPower::class, 'unique_id', 'unique_id');
    }
}
