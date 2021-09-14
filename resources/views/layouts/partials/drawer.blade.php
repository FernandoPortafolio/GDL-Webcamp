 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a
         href="{{ route('dashboard.index') }}"
         class="brand-link"
     >
         <img
             src="{{ asset('/img/AdminLTELogo.png') }}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8"
         >
         <span class="brand-text font-weight-light">GDLWebcamp</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img
                     src="/storage/{{ Auth::user()->image }}"
                     class="img-circle elevation-2"
                     alt="User Image"
                 >
             </div>
             <div class="info">
                 <a
                     href="#"
                     class="d-block"
                 > {{ Auth::user()->name }}</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul
                 class="nav nav-pills nav-sidebar flex-column"
                 data-widget="treeview"
                 role="menu"
                 data-accordion="false"
             >
                 <li class="nav-item has-treeview">
                     <a
                         href="#"
                         class="nav-link"
                     >
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a
                                 href="{{ route('dashboard.index') }}"
                                 class="nav-link"
                             >
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Dashboard</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a
                         href="#"
                         class="nav-link"
                     >
                         <i class="nav-icon fa fa-calendar"></i>
                         <p>
                             Eventos
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a
                                 href="{{ route('evento.index') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-list nav-icon"></i>
                                 <p>Ver Todos</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a
                                 href="{{ route('evento.create') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-plus-circle nav-icon"></i>
                                 <p>Agregar</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a
                         href="#"
                         class="nav-link"
                     >
                         <i
                             class="nav-icon fas fa-book"
                             aria-hidden="true"
                         ></i>
                         <p>
                             Categorias
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a
                                 href="{{ route('categorias.index') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-list nav-icon"></i>
                                 <p>Ver Todos</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a
                                 href="{{ route('categorias.create') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-plus-circle nav-icon"></i>
                                 <p>Agregar</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a
                         href="#"
                         class="nav-link"
                     >
                         <i
                             class="nav-icon fa fa-user-circle"
                             aria-hidden="true"
                         ></i>
                         <p>
                             Invitados
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a
                                 href="{{ route('invitados.index') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-list nav-icon"></i>
                                 <p>Ver Todos</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a
                                 href="{{ route('invitados.create') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-plus-circle nav-icon"></i>
                                 <p>Agregar</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a
                         href="#"
                         class="nav-link"
                     >
                         <i
                             class="nav-icon fa fa-address-card"
                             aria-hidden="true"
                         ></i>
                         <p>
                             Registrados
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a
                                 href="{{ route('registrados.index') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-list nav-icon"></i>
                                 <p>Ver Todos</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a
                                 href="{{ route('registrados.create') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-plus-circle nav-icon"></i>
                                 <p>Agregar</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item has-treeview">
                     <a
                         href="#"
                         class="nav-link"
                     >
                         <i
                             class="nav-icon fa fa-user"
                             aria-hidden="true"
                         ></i>
                         <p>
                             Administradores
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a
                                 href="{{ route('administradores.index') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-list nav-icon"></i>
                                 <p>Ver Todos</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a
                                 href="{{ route('administradores.create') }}"
                                 class="nav-link"
                             >
                                 <i class="fa fa-plus-circle nav-icon"></i>
                                 <p>Agregar</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
