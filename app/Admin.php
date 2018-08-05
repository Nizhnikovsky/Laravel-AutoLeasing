<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use App\Price;
use Illuminate\Support\Facades\DB;
class Admin extends Model
{
    public static function getClass($brand,$model)
    {
       $class = DB::table('autos')->where([
           ['brand', '=', $brand],
           ['model', '=', $model],
       ])->value('class');
       return $class;
    }
    
    public static function getPriceOfRent($date,$time,$date_n,$time2,$region,$brand)
    {
        $date1 = strip_tags($date);
        $date1 = explode('-',$date1);
        $date2 = strip_tags($date_n);
        $date2 = explode('-',$date2);
        $brand = preg_split('/(?=[A-Z])/',$brand);
        $dt1 = Carbon::create(intval($date1[0]),intval($date1[1]),intval($date1[2]),intval($time));
        $dt2 = Carbon::create(intval($date2[0]),intval($date2[1]),intval($date2[2]),intval($time2));
        
        $hoursAmong = $dt1->diffInHoursFiltered(function(Carbon $date) {
            return $date->diffInHours();
        }, $dt2);
        $daysAmong = intval(ceil($hoursAmong/24));
        
        $class = self::getClass($brand[1],$brand[2]);
        
        $pricePerDay = DB::table('prices')->where([
            ['region', '=', $region],
            ['class', '=', $class],
        ])->value('price');
        
        // Цена с БД в зависимости от переданого класса авто
        //Коєффициенты на которые будет умножаться базовая цена(1-3 дня)
        //Можно вынести как константы
        $four_or_seven = 0.85;
        $eight_or_fifteen = 0.75;
        $sexteen_or_twentynine = 0.7;
        $more_then_thirty = 0.56;
        
        if (($dt1->isWeekend()) and ($dt2->isWeekend()))
        {
            $bonus = 40;
        }
        elseif ($dt2->isWeekend())
        {
            $bonus = 20;
        }
        elseif ($dt1->isWeekend())
        {
            $bonus = 20;
        }
        else
            $bonus = 0;
        
        
        if ($daysAmong<4)
        {
            $totalPrice = ($pricePerDay*$daysAmong)+$bonus;
        }
        elseif (($daysAmong<7) and ($daysAmong>4))
        {
            $totalPrice = (intval($pricePerDay*$four_or_seven)*$daysAmong)+$bonus;
        }
        elseif (($daysAmong<16) and ($daysAmong>6))
        {
            $totalPrice = (intval($pricePerDay*$eight_or_fifteen)*$daysAmong)+$bonus;
        }
        elseif (($daysAmong<30) and ($daysAmong>15))
        {
            $totalPrice = (intval($pricePerDay*$sexteen_or_twentynine)*$daysAmong)+$bonus;
        }
        elseif ($daysAmong>30)
        {
            $totalPrice = (intval($pricePerDay*$more_then_thirty)*$daysAmong)+$bonus;
        }
        return $totalPrice;
    }
}
