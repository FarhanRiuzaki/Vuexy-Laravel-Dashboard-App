<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class UserController extends Controller
{
    private $page_title         = "User Management";
    private $route              = "users";
    private $permission         = "user";
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
        if($request->ajax()){
            $model = User::query();

            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('roles', function($data){
                $label = '';
                if(!empty($data->getRoleNames())){
                    foreach($data->getRoleNames() as $v){
                        $label .=  " <label class='badge badge-success'> ". $v ." </label> ";
                    }
                }
                return $label;
            })
            ->addColumn('status', function($data){
                if($data->status == 1){
                    $label =  " <label class='badge badge-success'> Active </label> ";
                }else{
                    $label =  " <label class='badge badge-warning'> Non-Active </label> ";
                }

                return $label;
            })
            ->addColumn('action', function($data){
                // dd($data);
                $button = ButtonSED($data, 'users', 'user');
                if ($data->status == 0) {
                    // $button .= ' <button class="btn btn-icon btn-light btn-sm btn-activated btn-hover-success" data-remote="'. route('users.updateStatus', $data->id) .'" data-toggle="tooltip"  data-theme="dark" title="Activate User">
                    //     '. Metronic::getSVGController("media/svg/icons/Navigation/Double-check.svg", "svg-icon-md svg-icon-success") .'
                    // </button>';
                    $button .= ' <button class="btn btn-icon btn-sm btn-activated btn-success" data-remote="'. route($this->route.'.updateStatus', $data->id) .'" data-toggle="tooltip" title="Activate User">
                    '.SVGI('bi-check').'
                    </button>';
                }
                // dd($button); 
                return $button;
            })
            ->rawColumns(['roles','action','status'])
            ->make(true);
        }
        
        return view('auth-app.users.index', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
        ]);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        return view('auth-app.users.create', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'roles'         => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|same:confirm-password',
            'roles'     => 'required'
        ]);

        $request['password']= Hash::make($request['password']);
        // $username           = Str::slug($request['name'], '');
        // $request['username']  = $username;
        $request['status']  = '0';
        $user               = User::create($request->All());

        $user->assignRole($request->input('roles'));

        return redirect()->route($this->route . '.index')
        ->with(toaster('User created successfully', 'success', 'success'));
    }

    public function edit($id)
    {
        $user       = User::find($id);
        $roles      = Role::pluck('name','name')->all();
        $userRole   = $user->roles->pluck('name','name')->all();

        return view('auth-app.users.edit', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'roles'         => $roles,
            'userRole'      => $userRole,
            'user'          => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,'.$id,
            'password'  => 'same:confirm-password',
            'roles'     => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            unset($input['password']);
        }
        // dd($request->All());

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
        ->with(toaster('User updated successfully', 'success', 'Success'));
    }

    public function show($id)
    {
        $user   = User::find($id);

        return view('auth-app.users.show', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'user'          => $user
        ]);
    }

    public function destroy($id)
    {
        $delete = User::findOrFail($id);
        $delete->delete() == true
            ? $return = ['code' => 'success', 'msg' => 'data deleted successfully']
            : $return = ['code' => 'error', 'msg' => 'something went wrong!'];

        return response()->json($return);
    }

    public function updateStatus($id)
    {
        $user   = User::find($id);
        $user->update(['status' => 1 ]) == true
        ? $return = ['code' => 'success', 'msg' => 'User updated successfully']
        : $return = ['code' => 'error', 'msg' => 'something went wrong!'];

        return response()->json($return);
    }
}
