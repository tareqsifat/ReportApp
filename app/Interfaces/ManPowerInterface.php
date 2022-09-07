<?php
namespace App\Interfaces;


interface ManPowerInterface
{
    public function man_power_save($request, $add);

    public function get_previous_number($request);

    public static function get_current_number($id);

    public function improvement_deficit($request);
}