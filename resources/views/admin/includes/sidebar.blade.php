<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">John Doe</p>
      <p class="app-sidebar__user-designation">Frontend Developer</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item @if(request()->path() == 'dashboard') active @endif" href="{{route('admin.home')}}"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>


    <li class="treeview 
    @if(request()->path() == 'logo-icon') is-expanded 
    @elseif(request()->path() == 'general-information') is-expanded
    @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-cogs"></i><span class="app-menu__label">General Setting</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item @if(request()->path() == 'logo-icon') active @endif " href="{{route('logo.icon')}}"><i class="icon fas fa-images"></i> Logo Icon</a></li>
        <li><a class="treeview-item @if(request()->path() == 'general-information') active @endif" href="{{route('general.information')}}"><i class="icon fas fa-info"></i> General Information</a></li>
        <li><a class="treeview-item @if(request()->path() == 'slider') active @endif" href="{{route('slider')}}"><i class="icon fas fa-info"></i> Slider </a></li>

      </ul>
    </li>

    <li><a class="app-menu__item @if(request()->path() == 'category') active @endif" href="{{route('category')}}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Category</span></a></li>
    <li><a class="app-menu__item @if(request()->path() == 'brand') active @endif" href="{{route('brand')}}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Brand</span></a></li>
    <li><a class="app-menu__item @if(request()->path() == 'product') active @endif" href="{{route('product')}}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Product</span></a></li>

  </ul>
</aside>