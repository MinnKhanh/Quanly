@php
    use App\Enums\RoleEnum;
@endphp
<nav class="container-fluid navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-center align-items-center w-100">
            <a class="navbar-brand brand-logo d-flex justify-content-start align-items-center"
                href="{{ asset('admin/dashboard') }}"><span style="font-size: large; font-weight: 900; margin-left: 1px;">
                    @if (auth()->user()->hasRole(RoleEnum::USER))
                        User
                    @else
                        Admin
                    @endif
                </span></a>
            <a class="navbar-brand brand-logo-mini" href="{{ asset('admin/dashboard') }}">
                <img src="{{ asset('admin/images/logo.svg') }}" alt="logo" />
            </a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <div class="input-group">
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            @if (auth()->check())
                <li class="nav-item nav-search d-flex pt-2 pb-2">
                    @if (auth()->user()->hasRole(1))
                        <a class="btn" style="font-size: .7rem;" href="{{ route('admin.auth.logout') }}">Đăng
                            xuất</a>
                    @else
                        <a class="btn btn-info mr-2" href="{{ route('user.edit') }}" style="font-size: .7rem;"
                            role="button">
                            <span class="menu-title">Thông tin cá nhân</span>
                        </a>
                        <a class="btn btn-primary" style="font-size: .7rem;" href="{{ route('user.auth.logout') }}">Đăng
                            xuất</a>
                    @endif

                </li>
            @else
            @endif

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
