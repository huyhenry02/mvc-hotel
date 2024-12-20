
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{ route('customer.showIndex') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0">info@example.com</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0">+012 345 6789</p>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        @if( auth()->user())
                            <a class="me-3" href="{{ route('customer.showYourBooking') }}">{{ auth()->user()->full_name ?? '' }} </a>
                        @else
                            <a class="me-3" href="{{ route('customer.showLogin') }}">Đăng nhập</a>
                        @endif /
                        @if( auth()->user() )
                            <a class="ms-3" href="{{ route('customer.postLogout') }}"> Đăng xuất</a>
                            @else
                            <a class="ms-3" href="{{ route('customer.showRegister') }}"> Đăng ký</a>
                        @endif
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="#" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('customer.showIndex')}}" class="nav-item nav-link">Trang chủ</a>
                        <a href="{{route('customer.showAbout')}}" class="nav-item nav-link">Về chúng tôi</a>
                        <a href="{{route('customer.showService')}}" class="nav-item nav-link">Dịch vụ</a>
                        <a href="{{route('customer.showRoom')}}" class="nav-item nav-link">Phòng</a>
                        <a href="{{route('customer.showBooking')}}" class="nav-item nav-link">Đặt phòng</a>
                        <a href="{{route('customer.showContact')}}" class="nav-item nav-link">Liên lạc</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

