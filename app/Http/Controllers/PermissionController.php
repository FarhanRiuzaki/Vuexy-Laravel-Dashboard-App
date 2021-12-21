<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Permission;
use App\Models\Permission as ModelsPermission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    private $page_title         = "Permission Management";
    private $route              = "permissions";
    private $permission         = "permission";
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
    public function index(Request $req)
    {
        $permission     = DB::table('permissions')->orderBy('name', 'DESC')->get();
        // Format bentuk data untuk autocomplete.
        $output = [];
        foreach ($permission as $data) {
            $output[] = [
                'value'     => $data->name,
                'data'      => $data->name
            ];
        }
        $autocomplete       = json_encode($output);

        return view('auth-app.permission.index', [
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'permission'    => $permission,
            'autocomplete'  => $autocomplete
        ]);
    }

    public function store(Request $request)
    {
        $requestData    = $request->all();
        ModelsPermission::findOrCreate($requestData['permission']);

        $role = Role::where('name', 'super-admin')->first();
        $role->syncPermissions(ModelsPermission::all());

        return redirect()->route('permissions.index')
            ->with(toaster('Permissions created successfully', 'success', 'Success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $req)
    {
        $permission_edit    = ModelsPermission::find($id);

        $permission         = DB::table('permissions')->orderBy('name', 'DESC')->get();
        // Format bentuk data untuk autocomplete.
        $output = [];
        foreach ($permission as $data) {
            $output[] = [
                'value'     => $data->name,
                'data'      => $data->name
            ];
        }
        $autocomplete       = json_encode($output);

        return view('auth-app.permission.index', [
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'permission_edit' => $permission_edit,
            'autocomplete'  => $autocomplete
        ]);
    }

    public function update(Request $request, $id)
    {
        $input  = $request->all();

        $Permission   = ModelsPermission::find($id);
        // dd($id);
        $Permission->update($input);

        return redirect()->route('permissions.index')
            ->with(toaster('Permission updated successfully', 'success', 'Success'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ModelsPermission::find($id);
        $delete->delete() == true
            ? $return = ['code' => 'success', 'msg' => 'data deleted successfully']
            : $return = ['code' => 'error', 'msg' => 'something went wrong!'];

        return response()->json($return);
    }

    public function datatable(Request $req)
    {
        if ($req->ajax()) {
            $this->type = $req['type'];
            $model      = DB::table('permissions')->orderBy('name', 'DESC');

            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('group', function ($data) {
                    $render = $data->name;
                    $render = explode('.', $render);
                    return $render[0];
                })
                ->addColumn('action', function ($data) {
                    $button = '';
                    if (auth()->user()->can('permission.edit')) {
                        $button .= ' <a href="' . route($this->route . '.edit', $data->id) . '" class="btn btn-icon btn-primary btn-sm"  data-toggle="tooltip" title="Edit">
                    ' . SVGI('bi-pencil-square') . '
                    </a>';
                    }
                    if ($this->type == 'create') {
                        if (auth()->user()->can('permission.delete')) {
                            $button .= ' <button class="btn btn-icon btn-sm btn-delete btn-danger" data-remote="' . route($this->route . '.destroy', $data->id) . '" data-toggle="tooltip" title="Delete">
                            ' . SVGI('bi-trash') . '
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
