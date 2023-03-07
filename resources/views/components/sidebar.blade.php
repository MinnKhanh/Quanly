<nav class="sidebar sidebar-offcanvas" id="sidebar">
    @if (auth()->user()->hasRole(2))
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#type" role="button" aria-expanded="false"
                    aria-controls="type">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <span class="menu-title ml-2">Nhân viên</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="type">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.employee.index') }}">Danh sách
                                loại
                                nhân viên</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    @else
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#type" role="button" aria-expanded="false"
                    aria-controls="type">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <span class="menu-title ml-2">Nhân viên</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="type">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.employee.index') }}">Danh sách
                                loại
                                nhân viên</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.employee.create') }}">Thêm nhân
                                viên</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#product" role="button" aria-expanded="false"
                    aria-controls="product">
                    <i class="fa-solid fa-building"></i>
                    <span class="menu-title ml-2">Phòng ban</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="product">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.department.index') }}">Danh sách
                                phòng ban</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.department.create') }}">Thêm
                                phòng
                                ban</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#user" role="button" aria-expanded="false"
                    aria-controls="user">
                    <i class="fa-solid fa-user"></i>
                    <span class="menu-title ml-2">Tài khoản</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="user">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.user.index') }}">Danh sách
                                tài khoản</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    @endif
</nav>


<script type="text/javascript">
    // const currentUrl = window.location.href;
    // const nav_items = document.getElementsByClassName("nav-item");
    // for (let i = 0; i < nav_items.length; i++) {
    //     let nav_links = nav_items[i].getElementsByClassName("nav-link");
    //     for (let j = 0; j < nav_links.length; j++) {
    //         if (nav_links[j].href == currentUrl) {
    //             nav_items[i].classList.add("active");
    //         }
    //     }
    // }
</script>
