<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'browser'
    ];

    public static function addVisitor()
    {
        $visited = Session::get('visited');
        if (!$visited) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            $already_visitor = self::where('ip', $ipaddress)->first();
            if (!$already_visitor) {
                self::create([
                    'ip' => $ipaddress,
                    'browser' => $useragent,
                ]);
                session(['visited' => 1]);
            }
        }
    }
}
