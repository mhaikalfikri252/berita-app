<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

   <!-- Sidebar Toggle (Topbar) -->
   <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
     <i class="fa fa-bars"></i>
   </button>


   <!-- Topbar Navbar -->
   <ul class="navbar-nav ml-auto">

     <!-- Nav Item - Search Dropdown (Visible Only XS) -->
     <li class="nav-item dropdown no-arrow d-sm-none">
       <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-search fa-fw"></i>
       </a>
       <!-- Dropdown - Messages -->
       <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
         <form class="form-inline mr-auto w-100 navbar-search">
           <div class="input-group">
             <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
             <div class="input-group-append">
               <button class="btn btn-primary" type="button">
                 <i class="fas fa-search fa-sm"></i>
               </button>
             </div>
           </div>
         </form>
       </div>
     </li>

     <div class="topbar-divider d-none d-sm-block"></div>

     <!-- Nav Item - User Information -->
     @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        @else
     <li class="nav-item dropdown no-arrow">
       <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
         <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
       </a>
       <!-- Dropdown - User Information -->
       <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
         <a class="dropdown-item" href="{{route('editc.index')}}">
           <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
           Profile
         </a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="/edit">
          <i class="fa fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
          Ubah Password
        </a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#exampleModal">
           <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
           {{ __('Logout') }}
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
       </div>
     </li>
     @endguest

   </ul>

 </nav>

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin keluar ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" href="/" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#exampleModal">
           {{ __('Logout') }}
         </a>
      </div>
    </div>
  </div>
</div>