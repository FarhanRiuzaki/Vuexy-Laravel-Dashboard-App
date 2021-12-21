<?php

namespace App\Imports;

use App\Models\UploadBulkDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UploadBulkaImport implements ToModel, WithStartRow
{
    protected $parent_id;
    private $rows = 0;


    public function __construct($parent_id)
    {
        $this->parent_id    = $parent_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->rows;
        // dd($this->parent_id);
        return new UploadBulkDetail([
            'upload_bulk_id'    => $this->parent_id,
            'phone_number'      => $row[0],
            'type'              => $row[1],
            'adjust_point'      => $row[2],
            'remark'            => $row[3],
            'status'            => 0,
            'seq'               => $this->rows
        ]);
    }
    
    public function startRow(): int
    {
        return 5;
    }
    
    public function getRowCount(): int
    {
        return $this->rows;
    }
}
