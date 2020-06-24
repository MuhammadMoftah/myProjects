<?php

namespace App\Models\Development\Crud;

use DB;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{


    /**
     * Ui lists
     */

    public function getFormInputTypes()
    {
        return [
            "noinput"=>"no input",
            "hidden"=>"hidden",
            "text"=>"text",
            "password"=>"password",
            "textarea"=>"textarea",
            "textareaWithCkeditor"=>"textareaWithCkeditor",
            "number"=>"number",
            "date"=>"date",
            "file"=>"file",
            "checkbox"=>"checkbox",
            "radio"=>"radio",
            "color"=>"color",
            "email"=>"email",
            "url"=>"url",
        ];
    }

    /**
     * Database lists
     */
    public function getDatabaseDataTypeList()
    {
        return [
            "string"=>"string",
            "json"=>"json",
            "text"=>"text",
            "longText"=>"longText",
            "integer"=>"integer",
            "boolean"=>"boolean",
            "date"=>"date",
            "time"=>"time",
        ];
    }

    public function getDatabaseAttributes($value='')
    {
        return [
            "unsigned"=>"unsigned",
        ];
    }

    public function getDatabaseTables()
    {
        $filters = ['languages', 'menus', 'migrations', 'modules', 'modules_urls', 'password_resets', 'protected_urls', 'role_modules', 'role_urls', 'roles', 'sessions', 'translation_keys', 'translations'];
        $tables = collect(DB::select('SHOW TABLES'));
        $tables = $tables->filter(function($table) use($filters){
            return !in_array($table->Tables_in_solid, $filters);
        })->pluck('Tables_in_solid');

        return $tables;
    }

    public function getDatabaseRelationsAttributes()
    {
        return [
            'SET NULL'=>'SET NULL',
            'CASCADE'=>'CASCADE',
            'NO ACTION'=>'NO ACTION',
            'RESTRICT'=>'RESTRICT',
        ];
    }
}
