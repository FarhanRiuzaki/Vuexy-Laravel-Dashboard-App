<?php

namespace App\Http\Controllers;

// use App\Models\PointManagement;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    private $page_title         = "Laporan Management";
    private $route              = "reports";
    private $permission         = "report";
    private $pageConfigs        = ['pageHeader' => false];

    function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:'.$this->permission.'.index|'.$this->permission.'.create|'.$this->permission.'.edit|'.$this->permission.'.delete', ['only' => ['index','store']]);
        // $this->middleware('permission:'.$this->permission.'.create', ['only' => ['create','store']]);
        // $this->middleware('permission:'.$this->permission.'.edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:'.$this->permission.'.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->ajax()){
        //     $start_date = $request['start_date'];
        //     $end_date   = $request['end_date'];
        //     // dd($end_date);
        //     $model      = PointManagement::whereBetween(DB::raw('DATE(created_at)'), [$start_date, $end_date])->get();
        //     // dump($start_date, $end_date);

        //     return DataTables::of($model)
        //     ->addIndexColumn()
        //     ->addColumn('created_at', function($data){
        //         return createdAt($data->created_at);
        //     })
        //     ->rawColumns(['created_at'])
        //     ->make(true);
        // }
        // return view('report.index', [
        //     'pageConfigs'   => $this->pageConfigs,
        //     'page_title'    => $this->page_title,
        //     'permission'    => $this->permission,
        //     'route'         => $this->route
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Generate PDF
    public function createPDF(Request $req) {
        // retreive all records from db
        $start_date = date('Y M d', strtotime($req['start_date']));
        $end_date   = date('Y M d', strtotime($req['end_date']));
        $data       = PointManagement::whereBetween(DB::raw('DATE(created_at)'), [$req['start_date'], $req['end_date']])->orderBy('created_at', 'DESC')->get();
        // share data to view
        view()->share('data',$data);
        $pdf = PDF::loadView('report.pdf', compact('data', 'start_date', 'end_date'));
  
        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
      }
}
