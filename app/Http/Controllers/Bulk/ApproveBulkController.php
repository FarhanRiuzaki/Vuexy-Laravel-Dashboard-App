<?php

namespace App\Http\Controllers\Bulk;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Jobs\UploadBulkJob;
use App\Models\UploadBulk;
use App\Models\UploadBulkDetail;
use App\Repository\Task\EloquentTaskRepository;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Yajra\DataTables\Facades\DataTables;

class ApproveBulkController extends Controller
{
    private $page_title         = "Approval Bulk";
    private $route              = "approve-bulks";
    private $permission         = "approve-bulk";
    private $pageConfigs        = ['pageHeader' => false];
    protected $eloquentTask;

    function __construct(EloquentTaskRepository $eloquentTask)
    {
        $this->eloquentTask = $eloquentTask;
        $this->middleware('auth');
        // $this->middleware('permission:'.$this->permission.'.index|'.$this->permission.'.create|'.$this->permission.'.edit|'.$this->permission.'.delete', ['only' => ['index','store']]);
        // $this->middleware('permission:'.$this->permission.'.create', ['only' => ['create','store']]);
        // $this->middleware('permission:'.$this->permission.'.edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:'.$this->permission.'.delete', ['only' => ['destroy']]);
    }

    public function index(Request $req)
    {
        
        if($req->ajax()){
            $model = UploadBulk::orderBy('created_at', 'DESC')->get();
            // dd($model);
            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('created_at', function($data)
            {
                return "<b>". date('Y-m-d H:i:s', strtotime($data->created_at)) . "</b><br> " . Carbon::parse($data->created_at)->diffForHumans() . " ";
            })
            ->addColumn('progres', function($data)
            {
                if($data->start_time){
                    $total_proses   = $data->success + $data->failed;
                    $persen         = (($total_proses / $data->total_trx) * 100);
                    
                    $dteStart = new DateTime($data->start_time);
                    $dteEnd   = new DateTime($data->end_time);
                    $dteDiff  = $dteStart->diff($dteEnd);

                    if($persen == 100){
                        return '<span class="badge bg-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star me-25"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <span>Success '. $dteDiff->format("%H:%I:%S") .'</span>
                      </span>';
                    }
                    return '<div class="progress progress-bar-primary">
                        <div
                        class="progress-bar progress-bar-striped progress-bar-animated"
                        role="progressbar"
                        aria-valuenow="20"
                        aria-valuemin="20"
                        aria-valuemax="100"
                        style="width: '.$persen.'%"
                        >'.number_format($persen, 2).'%</div>
                    </div>';
                }else{
                    return "-";
                }
            })
            ->addColumn('action', function($data){
                $button = ' <a class="btn btn-icon btn-light btn-sm btn-warning" href="'.  route($this->route.'.show', $data->id) .'" data-toggle="tooltip"  data-theme="dark" title="Show">
                    '. SVGI("bi-eye") .'
                    </a>';
                if(!$data->start_time){
                    $button .= ' <button class="btn btn-icon btn-sm btn-approve btn-success" data-remote="'. route($this->route.'.approve', $data->id) .'" data-toggle="tooltip" title="Approve">
                    '.SVGI('bi-check').'
                    </button>';
                    $button .= ' <button class="btn btn-icon btn-sm btn-reject btn-danger" data-remote="'. route($this->route.'.reject', $data->id) .'" data-toggle="tooltip" title="Reject">
                    '.SVGI('bi-x').'
                    </button>';
                }
                return $button;
            })
            ->rawColumns(['action','created_at','progres'])
            ->make(true);
        }
        
        return view('api.approve-bulk.index', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
        ]);
    }

    public function show($id, Request $req)
    {
        $record = UploadBulkDetail::query()->where('upload_bulk_id', $id);

        if($req->ajax()){
            $model = UploadBulkDetail::query()->where('upload_bulk_id', $id);
            // $model = UploadBulkDetail::where('upload_bulk_id', $id)->get();;
            // dd($model);
            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('created_at', function($data)
            {
                return "<b>". date('Y-m-d H:i:s', strtotime($data->created_at)) . "</b><br> " . Carbon::parse($data->created_at)->diffForHumans() . " ";
            })
            ->addColumn('response', function($data)
            {
                if($data->response){
                    $array = json_decode($data->response);
                    // dd($array->msg);
                    return "<p>" . json_encode($array->msg,JSON_PRETTY_PRINT) . "<p>";
                }else{
                    return '-';
                }
            })
            ->addColumn('status', function($data)
            {
                switch ($data->status) {
                    case 1:
                        return 'Success';
                      break;
                    case 2:
                        return 'Failed';
                      break;
                    default:
                        return 'Pending';
                  }
            })
            ->addColumn('action', function($data){
                $button = ' <a class="btn btn-icon btn-light btn-sm btn-warning" href="'.  route($this->route.'.show', $data->id) .'" data-toggle="tooltip"  data-theme="dark" title="Show">
                    '. SVGI("bi-eye") .'
                    </a>';
                $button .= ' <button class="btn btn-icon btn-sm btn-approve btn-success" data-remote="'. route($this->route.'.approve', $data->id) .'" data-toggle="tooltip" title="Approve">
                '.SVGI('bi-check').'
                </button>';
                $button .= ' <button class="btn btn-icon btn-sm btn-reject btn-danger" data-remote="'. route($this->route.'.reject', $data->id) .'" data-toggle="tooltip" title="Reject">
                '.SVGI('bi-x').'
                </button>';
                return $button;
            })
            ->addColumn('status_color', ' ')
            // We add "status_color" value but it won't be visible
            ->editColumn('status_color', function ($row) {
                return $row->status && UploadBulkDetail::STATUS_COLOR[$row->status] ? UploadBulkDetail::STATUS_COLOR[$row->status] : '-';
            })
            ->rawColumns(['action','created_at','response'])
            ->make(true);
        }

        return view('api.approve-bulk.show', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
            'record'        => $record,
            'id'            => $id
        ]);
    }
    public function approve($id)
    {
            //and now the interesting part
        // $process = Artisan::call('task:uploadBulk --id=' . $id);
        // $process = new Process(['php ../artisan list']);
        // // dd($process);
        // $process->setTimeout(0);
        // $process->run();

        // // executes after the command finishes
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }
        UploadBulkJob::dispatch($id);
        // echo $process->getOutput();
        // $process->start();
        // dd($process);
        return view('api.approve-bulk.ajax');
    }

    public function updateStatus($id, $tipe, $response){
        $dPM = UploadBulkDetail::find($id);
                                 
        $dPM->status        = $tipe;
        $dPM->response      = $response;
        $dPM->save();
    }

    public function updateParentStartTime($id)
    {
        $dPM = UploadBulk::find($id);
                                 
        $dPM->start_time    = now();
        $dPM->save();
    }
    public function updateParentSuccess($id)
    {
        $dPM = UploadBulk::find($id);
        $success        = ++$dPM->success;
        $dPM->success   = $success;
        $dPM->save();
    }

    public function updateParentFailed($id)
    {
        $dPM = UploadBulk::find($id);
                                 
        $failed         = ++$dPM->failed;
        $dPM->failed    = $failed;
        $dPM->save();
    }

    public function updateParentFinishTime($id)
    {
        $dPM = UploadBulk::find($id);
                                 
        $dPM->end_time    = now();
        $dPM->save();
    }

    public function reject()
    {
        # code...
    }
}
