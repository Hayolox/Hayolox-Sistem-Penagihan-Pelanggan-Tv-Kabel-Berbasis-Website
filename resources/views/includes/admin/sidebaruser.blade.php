@auth
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{ asset('/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('bill-user') }}">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Tagihan</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('Admin/Tahun*')) ? 'active' : '' }} {{ (request()->is('Admin/Tagihan*')) ? 'active' : '' }}" href="{{ route('Tagihan.index') }}">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Riwayat Pembayaran</span>
            </a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </div>
</nav>
@endauth