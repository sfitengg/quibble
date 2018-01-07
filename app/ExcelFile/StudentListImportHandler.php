<?php

namespace App\ExcelFile;

use Excel;
use App\Student;
use \Maatwebsite\Excel\Files\ImportHandler;

class StudentListImportHandler implements ImportHandler 
{
    public function handle($studentList)
    {
        return  Excel::selectSheets($studentList->sheetName)->load($studentList->getFile(),function($reader){
            $reader->ignoreEmpty();
            $reader->limitColumns(3);
            $reader->limitRows(90);
        })->get();
    }
    
}