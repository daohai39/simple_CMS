<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Dashboard</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>Danh Mục</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-list-ol"></i>Danh sách</a></li>
                    <li><a href="{{ route('admin.category.create') }}"><i class="fa fa-plus-circle"></i>Tạo</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Sản Phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.product.index') }}"><i class="fa fa-list-ol"></i>Danh sách</a></li>
                    <li><a href="{{ route('admin.product.create') }}"><i class="fa fa-plus-circle"></i>Tạo</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Thẻ</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.tag.index') }}"><i class="fa fa-list-ol"></i>Danh sách</a></li>
                </ul>
            </li>

               <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Cài Đặt</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.setting.index') }}"><i class="fa fa-list-ol"></i>Danh sách</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
