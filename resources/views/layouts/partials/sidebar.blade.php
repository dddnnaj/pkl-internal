<!-- Sidebar Start -->
<aside class="left-sidebar shadow-sm">
  <!-- Sidebar scroll-->
  <div>

    <!-- LOGO -->

    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar mt-3" data-simplebar="">
      <ul id="sidebarnav" class="px-2">
      
        <!-- Dashboard -->
        <li class="sidebar-item mb-1">
          <a class="sidebar-link d-flex align-items-center gap-2 rounded"
             href="{{ route('admin.dashboard') }}">
            <i class="ti ti-layout-dashboard fs-5"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <!-- Categories -->
        <li class="sidebar-item mb-1">
          <a class="sidebar-link d-flex align-items-center gap-2 rounded"
             href="{{ route('admin.categories.index') }}">
            <i class="ti ti-category fs-5"></i>
            <span class="hide-menu">Kategori</span>
          </a>
        </li>

        <!-- Products -->
        <li class="sidebar-item mb-1">
          <a class="sidebar-link d-flex align-items-center gap-2 rounded"
             href="{{ route('admin.products.index') }}">
            <i class="ti ti-package fs-5"></i>
            <span class="hide-menu">Produk</span>
          </a>
        </li>

        <!-- Orders -->
        <li class="sidebar-item mb-1">
          <a class="sidebar-link d-flex align-items-center gap-2 rounded"
             href="/admin/orders">
            <i class="ti ti-shopping-cart fs-5"></i>
            <span class="hide-menu">Pesanan</span>
          </a>
        </li>

        <!-- Reports -->
        <li class="sidebar-item mb-1">
          <a class="sidebar-link d-flex align-items-center gap-2 rounded"
             href="/admin/reports/sales">
            <i class="ti ti-chart-bar fs-5"></i>
            <span class="hide-menu">Laporan</span>
          </a>
        </li>

      </ul>
    </nav>
    <!-- End Sidebar navigation -->

  </div>
  <!-- End Sidebar scroll-->
</aside>
<!-- Sidebar End -->
