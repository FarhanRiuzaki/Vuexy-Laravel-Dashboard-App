<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    private $page_title         = "Role Management";
    private $route              = "roles";
    private $permission         = "role";
    private $pageConfigs        = ['pageHeader' => false];

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:'.$this->permission.'.index|'.$this->permission.'.create|'.$this->permission.'.edit|'.$this->permission.'.delete', ['only' => ['index','store']]);
        $this->middleware('permission:'.$this->permission.'.create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->permission.'.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->permission.'.delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // dd(svg('bi-app-indicator')->contents);
        if($request->ajax()){
            $model = Role::query()->orderBy('created_at', 'ASC');

            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button ='<a href="' . route('roles.show',$data->id) . '" class="btn btn-icon btn-warning btn-sm"  data-toggle="tooltip" title="Show">
                    '.SVGI('bi-eye').'
                </a>';
                if(auth()->user()->can('role.edit')){
                    $button .= ' <a href="' . route('roles.edit',$data->id) . '" class="btn btn-icon btn-primary btn-sm"  data-toggle="tooltip" title="Edit & Permission">
                    '.SVGI('bi-diagram-3').'
                    </a>';
                }
                if($data->name != 'super-admin'){
                    if(auth()->user()->can('role.delete')){
                        $button .= ' <button class="btn btn-icon btn-sm btn-delete btn-danger" data-remote="'. route('roles.destroy', $data->id) .'" data-toggle="tooltip" title="Delete">
                            '.SVGI('bi-trash').'
                        </button>';
                    }
                }
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $permission = Permission::orderBy('name', 'DESC')->get();
        return view('auth-app.role.index', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'permission'    => $permission,
            'permission_type' => $this->permission
        ]);
    }

    public function create()
    {
        $permission = Permission::orderBy('name', 'DESC')->get();
        return view('auth-app.role.create', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'permission'    => $permission
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:roles,name',
            'permission'    => 'required',
            'merchant_id'   => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name'),'merchant_id' => $request->input('merchant_id')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
        ->with(toaster('Role created successfully', 'success', 'Success'));
    }

    public function show($id)
    {
        $role   = Role::find($id);
        $rolePermissions    = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        ->where("role_has_permissions.role_id",$id)
        ->get();

        return view('auth-app.role.show', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'rolePermissions'    => $rolePermissions,
            'role'          => $role
        ]);
    }

    public function edit($id)
    {
        $role               = Role::find($id);
        $permission         = Permission::orderBy('name', 'DESC')->get();
        $rolePermissions    = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();

        return view('auth-app.role.edit', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'rolePermissions'    => $rolePermissions,
            'permission'    => $permission,
            'role'          => $role
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'permission'    => 'required',
        ]);

        $role       = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
        ->with(toaster('Role updated successfully', 'success', 'Success'));
    }

    public function destroy($id)
    {
        $delete = Role::findOrFail($id);
        $delete->delete() == true
            ? $return = ['code' => 'success', 'msg' => 'data deleted successfully']
            : $return = ['code' => 'error', 'msg' => 'something went wrong!'];

        return response()->json($return);
    }
}