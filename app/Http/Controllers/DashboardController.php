<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\PointManagement;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use App\Http\Controllers\ApiController;
use App\Repository\Task\EloquentTaskRepository;
Use DB;

class DashboardController extends Controller
{
  protected $eloquentTask;
  private $page_title         = "Dashboard";
  private $route              = "dashboard";
  private $permission         = "dashboard";
  private $pageConfigs        = ['pageHeader' => false];

  function __construct(EloquentTaskRepository $eloquentTask)
  {
      $this->eloquentTask = $eloquentTask;
      $this->middleware('auth');
      // $this->middleware('permission:'.$this->permission.'.index|'.$this->permission.'.create|'.$this->permission.'.edit|'.$this->permission.'.delete', ['only' => ['index','store']]);
      // $this->middleware('permission:'.$this->permission.'.create', ['only' => ['create','store']]);
      // $this->middleware('permission:'.$this->permission.'.edit', ['only' => ['edit','update']]);
      // $this->middleware('permission:'.$this->permission.'.delete', ['only' => ['destroy']]);
  }
  // Dashboard - Analytics
  public function index()
  {
    $pageConfigs = ['pageHeader' => false];
    return view('/content/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
  }
}
