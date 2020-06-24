<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithStrictNullComparison, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::all();
       
        $users = $users->map(function($item){
            $return  = Arr::only($item->toArray(), ['first_name', 'last_name', 'title', 'email', 'phone', 'no_of_views', 'no_of_shares', 'created_at']);
            $return['percentage of completing'] = $item->getUserRate();
            return $return ;
        });
        
        return $users;
    }

    public function headings(): array
    {
        return [
            'first name',
            'last name',
            'title',
            'email',
            'phone',
            'no_of_views',
            'no_of_shares',
            'created_at',
            'percentage of completing',
        ];
    }
}
