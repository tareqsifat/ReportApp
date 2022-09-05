<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManPower extends Model
{
    use HasFactory;
    
    protected $guarded = ['*'];


    public function man_power_add()
    {
        return $this->hasMany(ManPowerAdd::class, 'unique_id', 'unique_id');
    }

    public function man_power_remove()
    {
        return $this->hasMany(ManPowerRemove::class, 'unique_id', 'unique_id');
    }

    public function man_power_role_id()
    {
        return $this->belongsTo(ManPowerRole::class, 'man_power_role_id', 'id');
    }
}
