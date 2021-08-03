{{-- For submenu --}}
<ul class="menu-content">
  @if(isset($menu))
  @foreach($menu as $submenu)
    {{-- config untuk class active  --}}
    @php
      $arr    = explode(".", Route::currentRouteName(), 2);
      $first  = $arr[0];

      if(!$first){
        $url_asli = (Request::url());
        $url      = substr($url_asli, strpos($url_asli, "/dashboard") + 1);     
        $url      = explode('/', $url);
        $first    = $url[0] . '-'. str_replace('%20', ' ', $url[2]);
      }
      // dump($menu->slug)
    @endphp   

  <li class="{{ $submenu->slug === $first  ? 'active' : '' }}">
    <a href="{{isset($submenu->url) ? url($submenu->url):'javascript:void(0)'}}" class="d-flex align-items-center" target="{{isset($submenu->newTab) && $submenu->newTab === true  ? '_blank':'_self'}}">
      @if(isset($submenu->icon))
      <i data-feather="{{$submenu->icon}}"></i>
      @endif
      <span class="menu-item text-truncate">{{ __($submenu->name) }}</span>
    </a>
    @if (isset($submenu->submenu))
    @include('panels/submenu', ['menu' => $submenu->submenu])
    @endif
  </li>
  @endforeach
  @endif
</ul>
