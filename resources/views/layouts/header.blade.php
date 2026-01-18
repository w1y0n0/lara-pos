 <header class="main-header">
     <!-- Logo -->
     <a href="/" class="logo">
         <!-- mini logo for sidebar mini 50x50 pixels -->
         @php
             $words = explode(' ', $setting->nama_perusahaan);
             $word = '';
             foreach ($words as $w) {
                 $word .= $w[0];
             }
         @endphp
         <span class="logo-mini"><b>{{ $word }}</b></span>
         <!-- logo for regular state and mobile devices -->
         <span class="logo-lg">{{ $setting->nama_perusahaan }}</span>
     </a>
     <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-static-top">
         <!-- Sidebar toggle button-->
         <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
             <span class="sr-only">Toggle navigation</span>
         </a>

         <div class="navbar-custom-menu">
             <ul class="nav navbar-nav">
                 <!-- User Account: style can be found in dropdown.less -->
                 <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         <img src="{{ Auth::user()->foto }}" class="user-image img-profil" 
                            alt="User Image">
                         <span class="hidden-xs name-profil">{{ Auth::user()->name }}</span>
                     </a>
                     <ul class="dropdown-menu">
                         <!-- User image -->
                         <li class="user-header">
                             <img src="{{ Auth::user()->foto }}" class="img-circle img-profil" 
                                alt="User Image">

                             <p>
                                 <span class="name-profil">{{ Auth::user()->name }}</span>
                                 <small class="email-profil">{{ Auth::user()->email }}</small>
                             </p>
                         </li>
                         <!-- Menu Footer-->
                         <li class="user-footer">
                             <div class="pull-left">
                                 <a href="{{ route('user.profil') }}" 
                                    class="btn btn-default btn-flat">Profil</a>
                             </div>
                             <div class="pull-right">
                                 <a href="{{ route('logout') }}" 
                                    class="btn btn-default btn-flat">Keluar</a>
                             </div>
                         </li>
                     </ul>
                 </li>
             </ul>
         </div>
     </nav>
 </header>
