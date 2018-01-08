<?php

namespace App\ExcelFile;

use Maatwebsite\Excel\Excel;
use \Maatwebsite\Excel\Files\ExcelFile;

use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;

class StudentListImport extends ExcelFile 
{
    protected $filename;
    protected $fileParameter = 'file';
    /**
     * Return the file location
     *
     * @return string
     */
    public function getFile()
    {
        $this->setInputFile();
        // Return it's location
        return $this->filename;
    }

    /**
     * Sets the filename from which the data
     * is to be imported
     *
     * @param Request $request
     * @param string $filename
     * @return void
     */
    public function setInputFile()
    {
        $file = Input::file($this->fileParameter);
        $this->filename = $file->getRealPath();
    }

    public function setCustomSettings(Request $request)
    {
        $this->sheetName = $request->sheet_name;
        $this->startRow = $request->start_row;
        config([
            'excel.import.startRow' => $this->startRow,
        ]);
    }
    
    /* public function getFilters()
    {
        return [
            'chunk'
        ];
    } */
    
}