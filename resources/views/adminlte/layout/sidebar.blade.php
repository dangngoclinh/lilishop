<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->avatar }}" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul id="sidebar-menu" class="sidebar-menu" data-widget="tree">
            <li class="header">Danh mục</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Lilishop</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.option') }}"><i class="fa fa-cog"></i> Option Setting</a></li>
                    <li><a href="{{ route('admin.option.add') }}"><i class="fa fa-plus"></i> Add Option</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>News</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.news') }}"><i class="fa fa-newspaper-o"></i> News</a></li>
                    <li><a href="{{ route('admin.news.add') }}"><i class="fa fa-plus"></i> Add News</a></li>
                    <li class="treeview"><a href="{{ route('admin.news.category') }}"><i class="fa fa-folder"></i>
                            Category
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.news.category') }}">
                                    <i class="fa fa-list-alt"></i> List</a>
                            </li>
                            <li><a href="{{ route('admin.news.category.add') }}">
                                    <i class="fa fa-plus"></i> Add Category</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.news.tags') }}"><i class="fa fa-tags"></i> Tags
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.news.tags') }}"><i class="fa fa-list-alt"></i> List</a></li>
                            <li><a href="{{ route('admin.news.tags.add') }}"><i class="fa fa-plus"></i> Add Tag</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.product') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i>
                            List
                            Products</a></li>
                    <li><a href="{{ route('admin.product.create') }}"><i class="fa fa-plus"></i> Add Products</a></li>
                    <li class="treeview"><a href="{{ route('admin.product.category') }}"><i class="fa fa-folder"></i>
                            Category
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.product.category') }}">
                                    <i class="fa fa-list-alt"></i> List</a>
                            </li>
                            <li><a href="{{ route('admin.product.category.create') }}">
                                    <i class="fa fa-plus"></i> Add Category</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.product.tag') }}"><i class="fa fa-tags"></i> Tags
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.product.tag') }}"><i class="fa fa-list-alt"></i> List</a></li>
                            <li><a href="{{ route('admin.product.tag.create') }}"><i class="fa fa-plus"></i> Add Tag</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.size') }}"><i class="fa fa-th-large"></i> Size</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-picture-o"></i>
                    <span>Media</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.media') }}"><i class="fa fa-cog"></i> All</a></li>
                    <li><a href="{{ route('admin.media.add') }}"><i class="fa fa-plus"></i> Add Media</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.user') }}"><i class="fa fa-cog"></i> All user</a></li>
                    <li><a href="{{ route('admin.user.create') }}"><i class="fa fa-plus"></i> Add user</a></li>
                    <li><a href="{{ route('admin.role') }}"><i class="fa fa-shield"></i> Role</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>