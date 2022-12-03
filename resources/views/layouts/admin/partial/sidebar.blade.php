<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info">
          <a href="{{ route('admin.dashboard') }}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li><!--dasboard end -->

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Category
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="@route('admin.category.index')" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Categorie's</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Products
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="@route('admin.product.index')" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="@route('admin.product.create')" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create Product</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Orders
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/order/index') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Order List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Contact
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/contact/index') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Contact List</p>
                </a>
              </li>
            </ul>
          </li>





          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                Logout
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/logout') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Logout</p>
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
