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
                    <span>@lang('Bài viết')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.news') }}"><i class="fa fa-newspaper-o"></i> @lang('Danh sách')</a>
                    </li>
                    <li><a href="{{ route('admin.news.create') }}"><i class="fa fa-plus"></i> @lang('Thêm bài viết')</a>
                    </li>
                    <li class="treeview"><a href="{{ route('admin.news.category') }}"><i class="fa fa-folder"></i>
                            @lang('Dang mục')
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.news.category') }}">
                                    <i class="fa fa-list-alt"></i> @lang('Danh sách')</a>
                            </li>
                            <li><a href="{{ route('admin.news.category.create') }}">
                                    <i class="fa fa-plus"></i> @lang('Thêm danh mục')</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-tags"></i> Tags
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.tags') }}"><i class="fa fa-list-alt"></i> @lang('Danh sách')
                                </a></li>
                            <li><a href="{{ route('admin.tags.create') }}"><i class="fa fa-plus"></i> @lang('Thêm tag')
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>@lang('Sản phẩm')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.product') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i>
                            @lang('Danh sách sản phẩm')</a></li>
                    <li><a href="{{ route('admin.product.create') }}"><i class="fa fa-plus"></i>
                            @lang('Thêm sản phẩm')</a></li>
                    <li class="treeview"><a href="{{ route('admin.product.category') }}"><i class="fa fa-folder"></i>
                            @lang('Danh mục')
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.product.category') }}">
                                    <i class="fa fa-list-alt"></i> @lang('Danh sách')</a>
                            </li>
                            <li><a href="{{ route('admin.product.category.create') }}">
                                    <i class="fa fa-plus"></i> @lang('Thêm danh mục')</a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="{{ route('admin.size') }}"><i class="fa fa-th-large"></i> @lang('Kích thước')</a></li>
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
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>@lang('Liên hệ')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.contact') }}"><i class="fa fa-envelope"
                                                                  aria-hidden="true"></i> @lang('Liên hệ')</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>