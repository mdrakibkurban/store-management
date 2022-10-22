  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">
            <i class="nav-icon fas fa-user "></i>
            {{ strtoUpper(auth()->user()->name ?? '') }}
          </a>
        </div>
      </div>


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menus
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
                  <li class="nav-item">
                    <a href="{{ route('dashboard')}}" class="nav-link {{ (request()->is('dashboard*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-home"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li> 
                  
                  <li class="nav-item">
                    <a href="{{ route('users.index')}}" class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        User 
                      </p>
                    </a>
                  </li>

                <li class="nav-item">
                  <a href="{{ route('categories.index')}}" class="nav-link {{ (request()->is('categories*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Category 
                    </p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('brands.index')}}" class="nav-link {{ (request()->is('brands*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Brand
                    </p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('sizes.index')}}" class="nav-link {{ (request()->is('sizes*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Size
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('products.index')}}" class="nav-link {{ (request()->is('products*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Product
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('stocks')}}" class="nav-link {{ (request()->is('stocks')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cart-plus"></i>
                    <p>
                      Stock
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('/stocks/history')}}" class="nav-link {{ (request()->is('stocks/history')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                      Stock History
                    </p>
                  </a>
                </li>



                <li class="nav-item">
                  <a href="{{ url('/return-product')}}" class="nav-link {{ (request()->is('return-product')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Return Product
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('/return-product-list')}}" class="nav-link {{ (request()->is('return-product-list')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                      Return Product Hisory
                    </p>
                  </a>
                </li>


                <li class="nav-item">
                  <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf  
                    <button class="btn text-white"
                            @click.prevent="$root.submit();"  class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </button>
                    
                  </form>
                </li>
            </ul>
          </li>
        </ul>
      </nav>

    </div>
    <!-- /.sidebar -->
  </aside>