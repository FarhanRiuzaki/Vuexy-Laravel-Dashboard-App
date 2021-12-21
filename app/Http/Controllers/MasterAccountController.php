<?php

namespace App\Http\Controllers;

use App\Models\masterAccount;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MasterAccountController extends Controller
{
    private $page_title         = "Rekening Management";
    private $route              = "master-accounts";
    private $permission         = "master-account";
    private $pageConfigs        = ['pageHeader' => false];

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:'.$this->permission.'.index|'.$this->permission.'.create|'.$this->permission.'.edit|'.$this->permission.'.delete', ['only' => ['index','store']]);
        $this->middleware('permission:'.$this->permission.'.create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->permission.'.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->permission.'.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $model = masterAccount::query();

            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                return ButtonSED($data, $this->route, $this->permission);
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        return view('master.rekening.index', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
        ]);
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
        $this->validate($request, [
            'code'      => 'required',
            'number'    => 'required',
            'currency'  => 'required',
            'desc'      => 'required',
        ]);

        masterAccount::create($request->All());


        return redirect()->route($this->route . '.index')
        ->with(toaster('Rekening created successfully', 'success', 'success'));
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
        $edit    = masterAccount::find($id);

        return view('master.rekening.index', [
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'edit'          => $edit,
        ]);
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
        $this->validate($request, [
            'code'      => 'required',
            'number'    => 'required',
            'currency'  => 'required',
            'desc'      => 'required',
        ]);

        $input = $request->all();

        $user = masterAccount::find($id);
        $user->update($input);

        return redirect()->route($this->route.'.index')
        ->with(toaster('User updated successfully', 'success', 'Success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = masterAccount::findOrFail($id);
        $delete->delete() == true
            ? $return = ['code' => 'success', 'msg' => 'data deleted successfully']
            : $return = ['code' => 'error', 'msg' => 'something went wrong!'];

        return response()->json($return);
    }

    public function datatable(Request $req)
    {
        if($req->ajax()){
            $this->type = $req['type'];
            $model      = masterAccount::query();

            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('group', function($data){
                $render = $data->name;
                $render = explode('.', $render);
                return $render[0];
            })
            ->addColumn('action', function($data){
                $button = '';
                if(auth()->user()->can('permission.edit')){
                    $button .= ' <a href="' . route($this->route.'.edit',$data->id) . '" class="btn btn-icon btn-primary btn-sm"  data-toggle="tooltip" title="Edit">
                    '.SVGI('bi-pencil-square').'
                    </a>';
                }
                if($this->type == 'create'){
                    if(auth()->user()->can('permission.delete')){
                        $button .= ' <button class="btn btn-icon btn-sm btn-delete btn-danger" data-remote="'. route($this->route . '.destroy', $data->id) .'" data-toggle="tooltip" title="Delete">
                            '.SVGI('bi-trash').'
                        </button>';
                    }
                }
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
}
