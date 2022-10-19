<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateTimeCarbonHelper
{
    public static function getDate(){
        $date = Carbon::now('America/Lima');
        $date = $date->format('d/m/Y');
        return $date;
    }

    public static function getTime(){
        $time = Carbon::now('America/Lima');
        $time = $time->format('h:i:s A');
        return $time;
    }

    public static function getDateTime(){
        $dateTime = Carbon::now('America/Lima');
        $dateTime->toDateTimeString();
        return $dateTime;
    }


}
