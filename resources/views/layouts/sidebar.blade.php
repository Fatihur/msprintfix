<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://vemto.app/favicon.png" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">MS Print</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon  ion-md-folder-open"></i>
                        <p>
                            Data Master
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\Kategori::class)
                            <li class="nav-item">
                                <a href="{{ route('kategoris.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Produk::class)
                            <li class="nav-item">
                                <a href="{{ route('produks.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Produk</p>
                                </a>
                            </li>
                            @endcan

                            @can('view-any', App\Models\Supplier::class)
                            <li class="nav-item">
                                <a href="{{ route('suppliers.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Supplier</p>
                                </a>
                            </li>
                            @endcan
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon  ion-md-list-box"></i>
                        <p>
                            Transaksi
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @can('view-any', App\Models\Barangmasuk::class)
                        <li class="nav-item">
                            <a href="{{ route('barangmasuks.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Barang Masuk</p>
                            </a>
                        </li>
                        @endcan
                            @can('view-any', App\Models\Penjualan::class)
                            <li class="nav-item">
                                <a href="{{ route('penjualans.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Penjualan</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Penjualandetail::class)
                            <li class="nav-item">
                                <a href="{{ route('penjualandetails.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Penjualan Detail</p>
                                </a>
                            </li>
                            @endcan

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon  ion-md-settings"></i>
                        <p>
                            Setting
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\Wa::class)
                            <li class="nav-item">
                                <a href="{{ route('was.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Wa</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\User::class)
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            @endcan
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-list-box"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                @endauth



                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
