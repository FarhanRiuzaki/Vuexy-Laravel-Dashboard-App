<?php

namespace App\Http\Controllers\Bulk;

use App\Imports\UploadBulkaImport;
use App\Models\UploadBulk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class UploadBulkController extends Controller
{
    private $page_title         = "Upload Bulk";
    private $route              = "upload-bulks";
    private $permission         = "upload-bulk";
    private $pageConfigs        = ['pageHeader' => false];

    function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:'.$this->permission.'.index|'.$this->permission.'.create|'.$this->permission.'.edit|'.$this->permission.'.delete', ['only' => ['index','store']]);
        // $this->middleware('permission:'.$this->permission.'.create', ['only' => ['create','store']]);
        // $this->middleware('permission:'.$this->permission.'.edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:'.$this->permission.'.delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('api.upload-bulk.index', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
        ]);
    }

    public function store(Request $req)
    {
        
		$this->validate($req, [
			'upload_bulk' => 'required|mimes:xls,xlsx'
		]);
        
		// menangkap file excel
		$file = $req->file('upload_bulk');
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
		// upload ke folder file_siswa di dalam folder public
		$file->move('upload_bulk',$nama_file);

		// import data
        try {
            DB::beginTransaction();
            $reqData                = $req->all();
            $reqData['filename']    =  $nama_file;
            unset($reqData['upload_bulk']);

            // insert to upload bulk  
            $parent = UploadBulk::create($reqData);
            $import = new UploadBulkaImport($parent->id);
            
            // upload exce 
            Excel::import($import, public_path('/upload_bulk/'.$nama_file));

            // update total trx 
            $updateData['total_trx']    = $import->getRowCount();
            $update = UploadBulk::find($parent->id);
            $update->update($updateData);
            
            DB::commit();
            // dd($parent);
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th);
            //throw $th;
            return redirect()->route($this->route . '.index')
            ->with(toaster('Terjadi kesalahan: ', 'error', 'error'));
        }

        
        return redirect()->route($this->route . '.index')
        ->with(toaster('Upload Bulk successfully', 'success', 'success'));
    }
}
