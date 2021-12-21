<?php

use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Str;

function welcome_word() {

    $return = '';
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        $return =  "Good Morning, and have a nice day 🤗";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "15") {
        $return =  "Good Afternoon, and have a nice day 😇";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "15" && $time < "19") {
        $return = "Good Afternoon. Hope you have an afternoon as lovely as you are 🥰";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "19") {
        $return =  "Good Evening, and keep spirit! 😆";
    }

    return ($return);
}

// Toaster
function toaster($msg, $type, $title)
{
    return array(
        'title'         => $title,
        'message'       => $msg,
        'alert-type'    => $type
    );
}

function SVGI($name)
{
    return svg($name)->contents;
}

function ButtonSED($data, $route_type, $permission_type, $show = true)
{
    $button = '';
    if($show){
        $button .= '<a href="' . route( $route_type. '.show',$data->id) . '" class="btn btn-icon btn-warning btn-sm"  data-toggle="tooltip" title="Show">
            '.SVGI('bi-eye').'
        </a>';
    }
    if(auth()->user()->can($permission_type.'.edit')){
        $button .= ' <a href="' . route($route_type. '.edit',$data->id) . '" class="btn btn-icon btn-primary btn-sm"  data-toggle="tooltip" title="Edit">
        '.SVGI('bi-pencil-square').'
        </a>';
    }
    if(auth()->user()->can($permission_type.'.delete')){
        $button .= ' <button class="btn btn-icon btn-sm btn-delete btn-danger" data-remote="'. route($route_type.'.destroy', $data->id) .'" data-toggle="tooltip" title="Delete">
        '.SVGI('bi-trash').'
        </button>';
    }

    return $button;
}

function CreateButton($route, $permission_type)
{
    $button = '';
    // dd($permission_type);
    if(auth()->user()->can($permission_type.'.create')){
        $button = '<div class="dt-action-buttons text-right">
            <div class="dt-buttons">
                <a href="'. route($route.'.create') .'" class="dt-button create-new btn btn-primary">
                    <i data-feather="plus"></i>
                    Add New Record
                </a>
            </div>
        </div>';
    }
    echo $button;
}

function BackButton($route, $submit = false, $back = true){
    $button = '<div class="dt-action-buttons text-right">
            <div class="dt-buttons">';
                if ($submit) {
                    # code...
                    $button .= '<button class="btn btn-primary data-submit mr-1">Submit</button>';
                }
                if ($back) {
                    # code...
                    $button .= '<a href="'. route($route.'.index')  .'" class="dt-button btn btn-primary btn-warning">
                        <i data-feather="chevrons-left"></i>
                        Back
                    </a>';
                }
                
                $button .=  '</div>
        </div>';
    echo $button;
}

//function SAVE Permission
function savePermission($argv)
{
    // dd($argv);
    if($argv[0] == 'make:controller'){
        $type = explode('\\', $argv[1]);
        $type = end($type);
        $type = str_replace('Master', '', $type);
        $type = str_replace('Controller', '', $type);
        $type = Str::of($type)->kebab();
        $type = Str::lower($type);
        // dd($type);
        if(isset($argv[2])){
            // if($argv[2] == '-r'){
                $permissions = [
                    $type . '.index',
                    $type . '.create',
                    $type . '.edit',
                    $type . '.delete',
                ];
                foreach ($permissions as $permission) {
                    Permission::findOrCreate($permission);
                }
                // default role
                $role = Role::where('name', 'super-admin')->first();

                // sync permissions to role
                $role->syncPermissions(Permission::all());
            // }
        }
    }
}

// function membuat nested array 
function makeNested($source) {
	$nested = array();

	foreach ( $source as &$s ) {
		if ( is_null($s['parent_id'])) {
			$nested[] = &$s;
		}
		else {
			$pid = $s['parent_id'];
			if ( isset($source[$pid]) ) {

				if ( !isset($source[$pid]['submenu']) ) {
					$source[$pid]['submenu'] = array();
				}

				$source[$pid]['submenu'][] = &$s;
			}
		}
	}
	return $nested;
}

// fungsi membuat avatar 
function get_avatar($str){
    $acronym    = '';
    $word       = '';
    $words      = preg_split("/(\s|\-|\.)/", $str);
    foreach($words as $w) {
        $acronym .= substr($w,0,1);
    }
    $word = $word . $acronym ;
    return $word;
}

function topThree($item, $merchant)
{
    // dd($item);
    $html = '';
    if ($item->seq == '1'){
        $position   = '1st';
        $class      = 'bg-light-success';
    }
    if ($item->seq == '2'){
        $position   = '2nd';
        $class      = 'bg-light-warning';
    }
    if ($item->seq == '3'){
        $position   = '3rd';
        $class      = 'bg-light-danger';
    }
    if($merchant == 'MERCHANT'){
        $svg = 'bi-cart3';
    }else{
        $svg = 'bi-cash-stack';
    }

    if ($item->groups == $merchant){
        $html = '<div class="col-4">
            <div class="media">
                <div class="avatar '. $class .' mr-2">
                    <div class="avatar-content">
                        '.SVGI($svg).'
                    </div>
                </div>
                <div class="media-body my-auto">
                    <p class="card-text font-small-3 mb-0">'. $position . ' ' . ucfirst(strtolower($merchant)) .' </p>
                    <h4 data-toggle="tooltip" data-original-title="Total Amount Rp 0" class="font-weight-bolder mb-0">
                        '. $item->totalTransaction .' TRX</h4>
                    <p class="card-text font-small-3 mb-0">
                        '. Str::upper($item->detailGroup ) .'</p>
                    <br>
                </div>
            </div>
        </div>';
    }
    return $html;
}

function topThreeAmt($item, $merchant)
{
    // dd($item);
    $html = '';
    if ($item->seq == '1'){
        $position   = '1st';
        $class      = 'bg-light-success';
    }
    if ($item->seq == '2'){
        $position   = '2nd';
        $class      = 'bg-light-warning';
    }
    if ($item->seq == '3'){
        $position   = '3rd';
        $class      = 'bg-light-danger';
    }
    if($merchant == 'MERCHANT'){
        $svg = 'bi-cart3';
    }else{
        $svg = 'bi-cash-stack';
    }

    if ($item->groups == $merchant){
        $html = '<div class="col-4">
            <div class="media">
                <div class="avatar '. $class .' mr-2">
                    <div class="avatar-content">
                        '.SVGI($svg).'
                    </div>
                </div>
                <div class="media-body my-auto">
                    <p class="card-text font-small-3 mb-0">'. $position . ' ' . ucfirst(strtolower($merchant)) .' </p>
                    <h4 data-toggle="tooltip" data-original-title="Total Amount Rp 0" class="font-weight-bolder mb-0">
                       Rp.  '. number_format($item->totalTransaction) .' </h4>
                    <p class="card-text font-small-3 mb-0">
                        '. Str::upper($item->detailGroup ) .'</p>
                    <br>
                </div>
            </div>
        </div>';
    }
    return $html;
}

function createdAt($created)
{
    return date('Y-m-d', strtotime($created)) . '<br>' . date('H:i:s', strtotime($created)) ;
}

function componentHasPage($data, $seq, $url_page)
{
    $html = '<div
                class="modal fade text-left"
                id="componentHasPage-'.$seq.'"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel20"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="componentHasPageLabel-'.$seq.'"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">';
                                // proses generate url  
                                foreach ($data as $key => $value) {
                                    $templateDetail = $value->page->templateDetail;
                                    foreach ($templateDetail as $k => $v) {

                                        // sequence component has page disamakan dengan yg ada di template details 
                                        // dump($value->sequence, $v->sequence);
                                        if($value->sequence == $v->sequence){
                                            $url_page   =  'dashboard/'. $v->template_id. '/' .  $v->template->name  .'/'. encrypt($v->sequence);
                                        }
                                    }
                                    $html .= '<div class="col-md-12"><a href="'. url($url_page).'"  class="btn mb-50 btn-block btn-primary">'.$value->page->description.'</a></div>';
                                }
                $html .= '</div>
                        </div>
                    </div>
                </div>
            </div>';
    echo $html;
//  dd($data);   
}

// ENCRYPT ANTON 
function encrypt_decrypt($action, $string) {
    $output             = false;
    $encrypt_method     = "AES-128-CBC";
    $secret_key         = 'Random1234567890';
    $secret_iv          = 'RandomInitVector';
    // hash
    $key    = $secret_key;
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv     = $secret_iv;
    
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt($string, $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

// CEK SESSION API 
function cekSession($phone)
{
    //dd(session('accessToken'));
    $code = '00';
    if(session('accessToken')){
        if(session('expiredToken') <= date('Y-m-d H:i:s')){
            $code = '99';
        }
        if(session('phoneToken') != $phone){
            $code = '99';
        }
    }else{
        $code = '99';
    }

    $return = [
        'code' => $code,
    ];

    return $return;
}

function encryptor($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'tibs-point';
    $secret_iv = 'Kimid2988!';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        //decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function eventType($type)
{
    $return = "";
    switch ($type) {
    case 'created':
        $return = '<span class="badge rounded-pill badge-light-success">'.$type.'</span>';
        break;

    case 'updated':
        $return = '<span class="badge rounded-pill badge-light-warning">'.$type.'</span>';
        break;

    case 'deleted':
        $return = '<span class="badge rounded-pill badge-light-danger">'.$type.'</span>';
        break;
    default:
        # code...
        break;
    }

    return $return;
}

// Cek Valid
function isValid($cek)
{
    $isValid = '';
    if($cek){
        $isValid = ' is-invalid';
    }
    return $isValid;
}

function convertNumber($number){
    return str_replace(',', '', $number);
}