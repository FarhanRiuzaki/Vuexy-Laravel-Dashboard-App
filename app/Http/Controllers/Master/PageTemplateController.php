<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class PageTemplateController extends Controller
{
    private $page_title         = "Page Template";
    private $route              = "pages";
    private $permission         = "page-template";
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
        return view('master.page.index', [
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
            'code'          => 'required',
            'url'           => 'required',
            'description'   => 'required'
        ]);
        // dd($request->All());

        $page = Page::create($request->All());


        return redirect()->route($this->route . '.index')
        ->with(toaster('Page created successfully', 'success', 'success'));
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
        $page_edit    = Page::find($id);

        return view('master.page.index', [
            // 'breadcrumbs' => $breadcrumbs
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $this->page_title,
            'route'         => $this->route,
            'page_edit'     => $page_edit
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
            'code'          => 'required',
            'url'           => 'required',
            'description'   => 'required'
        ]);

        $input = $request->all();

        $page = Page::find($id);
        $page->update($input);

        return redirect()->route($this->route . '.index')
        ->with(toaster('Page updated successfully', 'success', 'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_page = Page::find($id);
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
            $model = Page::query()->orderBy('created_at', 'DESC')->get();

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
