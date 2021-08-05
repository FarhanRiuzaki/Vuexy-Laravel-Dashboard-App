<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MerchantController extends Controller
{
    private $page_title         = "Merchant Management";
    private $route              = "merchants";
    private $permission         = "merchant";
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
        // mengambil data field name, id dari table 'channel'
        $channel = Channel::pluck('name', 'id');
        
        return view('master.merchant.index', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
            'channel'       => $channel
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
            'channel_id'    => 'required',
            'code'          => 'required',
            'name'          => 'required',
            'description'   => 'required'
        ]);

        $channel = Merchant::create($request->All());

        return redirect()->route($this->route . '.index')
        ->with(toaster('Merchant created successfully', 'success', 'success'));
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
        $channel        = Channel::pluck('name', 'id');
        $merchant_edit  = Merchant::find($id);

        return view('master.merchant.index', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'permission'    => $this->permission,
            'route'         => $this->route,
            'channel'       => $channel,
            'merchant_edit' => $merchant_edit
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
            'channel_id'    => 'required',
            'code'          => 'required',
            'name'          => 'required',
            'description'   => 'required'
        ]);

        $input = $request->all();

        $channel = Merchant::find($id);
        $channel->update($input);

        return redirect()->route($this->route . '.index')
        ->with(toaster('Merchant updated successfully', 'success', 'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_merchant = Merchant::find($id);
        $delete_merchant->delete() == true ?
            $return =
        ['code' => 'success', 'msg' => 'Merchant deleted successfully']
        : $return = ['code' => 'error', 'msg' => 'Something went wrong!'];

        return response()->json($return);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $this->type = $request['type'];
            $model = Merchant::query()->orderBy('created_at', 'DESC')->get();

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
                    if ($this->type == 'create') {
                        if (auth()->user()->can($this->permission . '.delete')) {
                            $button .= ' <button class="btn btn-icon btn-sm btn-delete btn-danger" data-remote="' . route($this->route . '.destroy', $data->id) . '" data-toggle="tooltip" title="Delete">
                                    ' . SVGI('bi-trash') . '
                                </button>';
                        }
                    }
                    return $button;
                })
                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }
    }
}
