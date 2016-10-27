<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Dashboard</li>

            <li class="treeview">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-list"></i>
                    <span>Category</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('admin.product.index') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Product</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('admin.tag.index') }}">
                    <i class="fa fa-tags"></i>
                    <span>Tag</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('admin.post.index') }}">
                    <i class="fa fa-book"></i>
                    <span>Post</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('admin.setting.index') }}">
                    <i class="fa fa-cog"></i>
                    <span>Setting</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('admin.designer.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Designer</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
