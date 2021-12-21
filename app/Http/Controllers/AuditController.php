<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class AuditController extends Controller
{
    private $page_title         = "Audit Trails";
    private $route              = "audits";
    private $permission         = "audit";
    private $pageConfigs        = ['pageHeader' => false];

    function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:'.$this->permission.'.index|'.$this->permission.'.create|'.$this->permission.'.edit|'.$this->permission.'.delete', ['only' => ['index','store']]);
        // $this->middleware('permission:'.$this->permission.'.create', ['only' => ['create','store']]);
        // $this->middleware('permission:'.$this->permission.'.edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:'.$this->permission.'.delete', ['only' => ['destroy']]);
    }

    public function index(Request $req)
    {
        if($req->ajax()){
            $model = Audit::with('user','auditable')->orderBy('id', 'DESC')->get();

            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('created_at', function($data)
            {
                return "<b>". date('Y-m-d H:i:s', strtotime($data->created_at)) . "</b><br> " . Carbon::parse($data->created_at)->diffForHumans() . " ";
            })
            ->addColumn('user', function($data){
                if(isset($data->user->name)){
                    return "<p>". $data->user->name ."<br>". $data->user->email . "<p>";
                }else{
                    return "-";
                }
            })
            ->addColumn('auditable_type', function($data)
            {
                return $data->auditable_id;
            })
            ->addColumn('record', function($data){
                return $data->auditable_id;
            })
            ->addColumn('event', function($data)
            {
                return eventType($data->event);
            })
            ->addColumn('action', function($data){
                $button = ' <a class="btn btn-icon btn-light btn-sm btn-warning" href="'.  route('audits.show', encrypt($data->id)) .'" data-toggle="tooltip"  data-theme="dark" title="Show">
                    '. SVGI("bi-eye") .'
                    </a>';
                return $button;
            })
            ->rawColumns(['action','user','record','event','created_at','auditable_type'])
            ->make(true);
        }
        
        return view('api.audits.index', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
        ]);
    }

    public function show($id)
    {
        $id             = decrypt($id);
        $record         = Audit::with('user','auditable')->find($id);
        $old_values     = $record->old_values;
        $new_values     = $record->new_values;

        return view('api.audits.show', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
            'record'        => $record,
            'new_values'    => $new_values,
            'old_values'    => $old_values,
        ]);
    }

}
