<?php

namespace App\Console\Commands;

use App\Models\UploadHAP;
use App\Models\PriceNodes;
use App\Imports\ImportHap;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
ini_set('max_execution_time', 10000);
ini_set('max_input_vars', 100000);
class RunHapMin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-hap-min';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $timestamp=date('Ymd_h00', strtotime('-1 hour'));
        $source      = 'C:\Users\steph\Downloads\MDAS FILES\HAP\HAP_'.$timestamp.'.xls';
        $destination = 'C:\Users\steph\Downloads\MDAS FILES\HAP\HAP_'.$timestamp.'.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($source);
        $writer      = new Xlsx($spreadsheet);
        $writer->save($destination);
        $identifiers=generateRandomString();
        $data=[
            'identifier'=>$identifiers,
            'upload_by'=>0,
        ];
        Excel::import(new ImportHap($data), 'C:\Users\steph\Downloads\MDAS FILES\HAP\HAP_'.$timestamp.'.xlsx');
    }
}
