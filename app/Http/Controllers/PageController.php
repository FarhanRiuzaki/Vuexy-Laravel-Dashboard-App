<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PageController extends Controller
{
    private $pageConfigs        = ['pageHeader' => false];

    function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:'.$this->permission.'.index|'.$this->permission.'.create|'.$this->permission.'.edit|'.$this->permission.'.delete', ['only' => ['index','store']]);
        // $this->middleware('permission:'.$this->permission.'.create', ['only' => ['create','store']]);
        // $this->middleware('permission:'.$this->permission.'.edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:'.$this->permission.'.delete', ['only' => ['destroy']]);
    }

    public function index(Request $req, $id, $url, $sequence)
    {
        // call api controller 
        $api        = new ApiController();
        $request    = new \Illuminate\Http\Request();

        // get role uuid
        $role_uuid  = auth()->user()->roles->first()->id;

        // sequence decode 
        try {
            $sequence   = decrypt($sequence);
        } catch (\Throwable $th) {
            return abort(404);
        }
        
        // Get template 
        $template   = Template::with(['templateDetail.page.component.componentParameterApi', 'templateDetail.page.component.componentHasPage.page.templateDetail'
        , 'templateDetail' => function($q) use($sequence)
        {
            $q->where('sequence', $sequence);
        },'templateDetail.page.component' => function($q)
        {
            $q->orderBy('sequence', 'ASC');
        }])->whereHas('roleHasTemplate', function($q) use($role_uuid)
        {
            $q->where('role_id', $role_uuid);
        })->where('name', $url)->find($id);
        // dd($template);

        // jika api type adalah PHP 
        // proses untuk stroe data 
        $data   = [];
        foreach ($template->templateDetail[0]->page->component as $key => $val) {
            if($val->api_type == 'php'){
                if($val->componentParameterApi){
                    $param_request = $val->componentParameterApi->pluck('value', 'name')->toArray();
                    $request->replace($param_request);
                }
                $api    = $api->getFromApi($val->api_name, $request);
            }
            $data[$val->sequence] = $api;
        }

        // page setting
        $page_title = '';
        $url_page   = '';
        try {
            $page_title     = $template->description . ' | ' . $template->templateDetail[0]->page->description;
            $url_page       =  'dashboard/'. $template->templateDetail[0]->template_id . '/' .  $template->name  .'/';
        } catch (\Throwable $th) {
            return abort(404);
        }
        // dd($data);

        // dd($template, $sequence);
        return view('page.index', [
            'pageConfigs'   => $this->pageConfigs,
            'page_title'    => $page_title,
            'template'      => $template,
            'sequence'      => $sequence,
            'url_page'      => $url_page,
            'data'          => $data
        ]);
    }
}
