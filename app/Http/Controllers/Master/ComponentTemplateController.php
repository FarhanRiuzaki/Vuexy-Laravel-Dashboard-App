<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ComponentTemplateController extends Controller
{
    private $page_title         = "Component Template";
    private $route              = "components";
    private $permission         = "component-template";
    private $pageConfigs        = ['pageHeader' => false];

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:' . $this->permission . '.index|' . $this->permission . '.create|' . $this->permission . '.edit|' . $this->permission . '.delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:' . $this->permission . '.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $this->permission . '.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:' . $this->permission . '.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.component.index', [
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page           = Page::pluck('code', 'id');

        return view('master.component.create', [
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
            'page'          => $page
        ]);
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
            'page_id'       => 'required',
            'api_name'      => 'required',
            'api_type'      => 'required',
            'type'          => 'required',
            'type_desc'     => 'required',
            'header'        => 'required',
            'column_size'   => 'required',
            'action'        => 'required',
            'sequence'      => 'required'
        ]);

        // get semua data $request
        $requestData = $request->All();
        // assign 'component..' ke param_api
        $param_api   = $requestData['component_parameter_api'];
        // hapus value requestData[component...]
        unset($requestData['component_parameter_api']);
        
        DB::beginTransaction();
        try {
            // store ke component
            $component = Component::create($requestData);
            // store param_api ke child (componentParameterApi)
            $component->componentParameterApi()->createMany($param_api);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect()->back()
            ->with(toaster('ERROR: ' . $th, 'Oops!', 'error'));
        }

        return redirect()->route($this->route . '.index')
        ->with(toaster('Component created successfully', 'success', 'success'));
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
        $page           = Page::pluck('code', 'id');
        $component_edit = Component::find($id);
        // $comp_param_api = ComponentParameterApi::where('component_id', $id)->get();
        $comp_param_api = $component_edit->componentParameterApi()->where('component_id',$id)->get();

        return view('master.component.edit', [
            'pageConfigs'       => $this->pageConfigs,
            'page_title'        => $this->page_title,
            'permission'        => $this->permission,
            'route'             => $this->route,
            'page'              => $page,
            'component_edit'    => $component_edit,
            'comp_param_api'    => $comp_param_api
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
            'page_id'       => 'required',
            'api_name'      => 'required',
            'api_type'      => 'required',
            'type'          => 'required',
            'type_desc'     => 'required',
            'header'        => 'required',
            'column_size'   => 'required',
            'action'        => 'required',
            'sequence'      => 'required'
        ]);
        
        // get semua data $request
        $requestData = $request->All();
        // assign 'component..' ke param_api
        $param_api   = $requestData['component_parameter_api'];
        // hapus value requestData[component...]
        unset($requestData['component_parameter_api']);
        
        DB::beginTransaction();
        try {
            // update component data
            $updateData = Component::find($id);
            $updateData->update($requestData);
            // delete param_api
            $updateData->componentParameterApi()->delete();
            // store new param_api ke child (componentParameterApi)
            $updateData->componentParameterApi()->createMany($param_api);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect()->back()
            ->with(toaster('ERROR: ' . $th, 'Oops!', 'error'));
        }

        return redirect()->route($this->route . '.index')
        ->with(toaster('Component created successfully', 'success', 'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_page = Component::find($id);
        $delete_page->delete() == true ?
            $return =
            ['code' => 'success', 'msg' => 'Page deleted successfully']
            : $return = ['code' => 'error', 'msg' => 'Something went wrong!'];

        return response()->json($return);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $this->type = $request['type'];
            $model = Component::query()->orderBy('created_at', 'DESC')->get();

            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('created_at', function ($data) {
                return createdAt($data->created_at);
            })
            ->addColumn('action', function ($data) {
                $button = '';
                if (auth()->user()->can($this->permission . '.edit')) {
                    $button .= ' <a href="' . route($this->route . '.edit', $data->id) . '" class="btn btn-icon btn-primary btn-sm"  data-toggle="tooltip" title="Edit">
                    ' . SVGI('bi-pencil-square') . '
                    </a>';
                }
                
                if (auth()->user()->can($this->permission . '.delete')) {
                    $button .= ' <button class="btn btn-icon btn-sm btn-delete btn-danger" data-remote="' . route($this->route . '.destroy', $data->id) . '" data-toggle="tooltip" title="Delete">
                        ' . SVGI('bi-trash') . '
                    </button>';
                }
                return $button;
            })
            ->rawColumns(['created_at', 'action'])
            ->make(true);
        }
    }
}

