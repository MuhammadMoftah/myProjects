<?php
namespace App\Traits;
use Carbon\Carbon;

trait HandleDateDisplay
{


    public function displayStart(){
        $class     = self::class;
        switch($class){
            
            case "App\Certificate":
                $original = $this->getOriginal('date');
            break;

            case "App\WorkExperience":
                $original = $this->getOriginal('from');
            break;

            case "App\Education":
                $original = $this->getOriginal('from_year');
            break;

            default:
                $original = "";
        }
        if($original){
            return Carbon::parse($original)->format('m-Y');
        }
        return "";
    }


    public function displayEnd(){
        $class     = self::class;
        switch($class){

            case "App\Certificate":
                $original  = $this->getOriginal('expired_date');
            break;

            case "App\WorkExperience":
                $original = $this->getOriginal('to');
            break;

            case "App\Education":
                $original = $this->getOriginal('to_year');
            break;  

            default:
                $original = "";
        }
        if($original){
            return Carbon::parse($original)->format('m-Y');
        }
        return "No expiration date";
    }
}