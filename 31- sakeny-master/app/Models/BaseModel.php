<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function getColName($col)
    {
        $lang = config('app.locale');
        $col = $col. '_' . $lang;
        return $this->$col;
    }
    
    public function getFormattedDay($date)
    {
        $date = explode("-",$date);
        return $date[2];
    }

    public function getFormattedMonth($date)
    {
        $date = explode("-",$date);
        $month = $date[1];
        switch ($month) {
            case '1': return __('lang.Jan'); break;
            case '2': return __('lang.Feb'); break;
            case '3': return __('lang.Mar'); break;
            case '4': return __('lang.Apr'); break;
            case '5': return __('lang.May'); break;
            case '6': return __('lang.Jun'); break;
            case '7': return __('lang.Jul'); break;
            case '8': return __('lang.Aug'); break;
            case '9': return __('lang.Sep'); break;
            case '10': return __('lang.Oct'); break;
            case '11': return __('lang.Nov'); break;
            case '12': return __('lang.Dec'); break;
            default:  return __('lang.other'); break;
        }
    }
}
