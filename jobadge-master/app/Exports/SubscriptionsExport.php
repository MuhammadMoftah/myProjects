<?php

namespace App\Exports;

use App\Job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubscriptionsExport implements FromCollection, WithStrictNullComparison, WithHeadings
{
    protected $emails;

    public function __construct($emails)
    {
        $this->emails = $emails;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $subscriptions = array();
        foreach ($this->emails as $key => $email) {
            $subscriptions[$key]['email'] = $email->email;
            $subscriptions[$key]['subscribed_at'] = $email->created_at;
        }

        return collect($subscriptions);
    }

    public function headings(): array
    {
        return [
            'email',
            'subscribed_at'
        ];
    }
}
