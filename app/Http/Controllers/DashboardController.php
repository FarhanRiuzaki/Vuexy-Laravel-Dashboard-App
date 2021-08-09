<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  // Dashboard - Analytics
  public function dashboardAnalytics()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
  }

  // Dashboard - Ecommerce
  public function dashboardEcommerce()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
  }

  // Dashboard - Ecommerce
  public function search()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/search', ['pageConfigs' => $pageConfigs]);
  }

  public function scrollspy()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('scrollspy.index', ['pageConfigs' => $pageConfigs]);
  }
}
