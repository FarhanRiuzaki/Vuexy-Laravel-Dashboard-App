@php
// dari helper kirim kemari 
$configData   = Helper::applClasses();
// dd($test);
@endphp
<div
  class="main-menu menu-fixed {{($configData['theme'] === 'dark') ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow"
  data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto">
        <a class="navbar-brand" href="{{url('/')}}">
          <span class="brand-logo">
            <img src="{{ asset('images/logo/logo.png') }}" alt="" style="max-height: 80px">
          </span>
          <h2 class="brand-text">BASE APP</h2>
        </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
            data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

      {{-- Foreach menu item starts --}}
      @if(isset($menuData[0]))
        @php
            $generateMenu = $menuData[0]->menu;
        @endphp

        @foreach($generateMenu as $menu)
          @if(isset($menu->navheader))
            @php
                $permission = false;
                $role       = false;
                if(@$menu->permission){
                    $permission = Auth::user()->hasAnyPermission(@$menu->permission);
                }else{
                    $permission = true;
                }
            @endphp
            @if ($permission)
              <li class="navigation-header">
                <span>{{ __($menu->navheader) }}</span>
                <i data-feather="more-horizontal"></i>
              </li>
            @endif
          @else
            {{-- PERMISSION BY FARHAN  --}}
            @php
                $permission = false;
                $role       = false;
                if(@$menu->permission){
                    $permission = Auth::user()->hasAnyPermission(@$menu->permission);
                }else{
                    $permission = true;
                }
            @endphp
            {{-- Add Custom Class with nav-item --}}
            @php
              $custom_classes = "";
              if(isset($menu->classlist)) {
                $custom_classes = $menu->classlist;
              }
            @endphp
            
            {{-- config untuk class active  --}}
            @php
              $arr    = explode(".", Route::currentRouteName(), 2);
              $first  = $arr[0];

              if(!$first){
                $url_asli = (Request::url());
                $url      = substr($url_asli, strpos($url_asli, "/dashboard") + 1);     
                $url      = explode('/', $url);
                $first    = $url[0] . '-'. str_replace('%20', ' ', $url[2]);
                // dump($url[2]);
              }
              // dump($menu->slug)
            @endphp   
            {{-- <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }} {{ $custom_classes }}">
            --}}
            
            @if ($permission)
              <li class="nav-item {{ $first === $menu->slug ? 'active' : '' }} {{ $custom_classes }}">
                <a href="{{isset($menu->url)? url($menu->url):'javascript:void(0)'}}" class="d-flex align-items-center"
                  target="{{isset($menu->newTab) ? '_blank':'_self'}}">
                  <i data-feather="{{ $menu->icon }}"></i>
                  <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                  @if (isset($menu->badge))
                    <?php $badgeClasses = "badge badge-pill badge-light-primary ml-auto mr-1" ?>
                    <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }} ">{{$menu->badge}}</span>
                  @endif
                </a>

                @if(isset($menu->submenu))
                  @include('panels/submenu', ['menu' => $menu->submenu])
                @endif
              </li>
            @endif
          @endif
        @endforeach
      @endif
      {{-- Foreach menu item ends --}}
    </ul>
  </div>
</div>
<!-- END: Main Menu-->
