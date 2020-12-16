<div class="right-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label"></li>
                <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i>
                    <span
                            class="hide-menu">پیشخوان
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="index.html">آمار </a></li>
                        <li><a href="index1.html">وضعیت </a></li>
                    </ul>
                </li>
                <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span
                        class="hide-menu">کاربران</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.users') }}">لیست کاربران</a></li>
                        <li><a href="{{ route('admin.users.create') }}">کاربر جدید</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span
                        class="hide-menu">نوشته ها
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.posts') }}">لیست نوشته ها</a></li>
                        <li><a href="{{ route('admin.posts.create') }}">نوشته جدید</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tags"></i><span
                        class="hide-menu">دسته بندی ها
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.categories') }}">لیست دسته بندی ها</a></li>
                        <li><a href="{{ route('admin.categories.create') }}">دسته بندی جدید</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cog"></i><span
                        class="hide-menu">تنظیمات</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="table-bootstrap.html">عمومی</a></li>
                        <li><a href="table-datatable.html">نوشتن</a></li>
                        <li><a href="table-datatable.html">خواندن</a></li>
                        <li><a href="table-datatable.html">کاربران</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>