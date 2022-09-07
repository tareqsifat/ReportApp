<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Interfaces\ManPowerInterface;
use App\Models\ManPowerList;
use Illuminate\Http\Request;

class ManPowerRemoveController extends Controller
{
    private ManPowerInterface $man_power_interface;
    
    public function __construct(ManPowerInterface $man_power_interface)
    {
        $this->man_power_interface = $man_power_interface;
    }


    public function remove_via_list($id)
    {
        $man_power = ManPowerList::find($id);
        if(isset($man_power)){
            
        }
    }
}
