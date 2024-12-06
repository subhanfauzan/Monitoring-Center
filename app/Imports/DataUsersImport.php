<?php

namespace App\Imports;

use App\Models\DataUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class DataUsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private function convertDate($dates) {
    $date = (int) $dates;
    $baseDate = Carbon::create(1899, 12, 30); // Base date Excel (1 Januari 1900 minus 2 hari karena offset)
    $convertedDate = $baseDate->addDays(floor($date))
                              ->addSeconds(($date - floor($date)) * 86400)
                              ->format('Y-m-d H:i:s');

    return "{$convertedDate}";
    }

    public function model(array $row)
    {
        $diff = (int) $row[11] - (int) $row[10];

        if($row[23] != null){
            return null;
        }

        if( $row[3] != "Incident" ) {
            return null;
        }

        return new DataUser([
            'site_name' => $row[5],
            'saverity' => $row[2],
            'suspect_problem' => $row[16],
            'time_down' => $row[10],
            'waktu_saat_ini' => $row[11],
            'status_site' => $row[23],
            'tim_fop' => $row[17],
            'remark' => $row[17],
            'ticket_swfm' => $row[2],
            'nop' => $row[18],
            'cluster_to' => $row[7],
        ]);
    }
}
