
<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <ul class="nav nav-secondary">
            <li class="nav-item active">
                <a
                    data-bs-toggle="collapse"
                    href="#dashboard"
                    class="collapsed"
                    aria-expanded="false"
                >
                    <i class="fas fa-home"></i>
                    <p>Quản lý Khách hàng</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse show" id="dashboard">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('user.showIndex') }}">
                                <span class="sub-item">Danh sách khách hàng</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.showCreate') }}">
                                <span class="sub-item">Thêm mới khách hàng</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item active">
                <a
                    data-bs-toggle="collapse"
                    href="#dashboard"
                    class="collapsed"
                    aria-expanded="false"
                >
                    <i class="fas fa-home"></i>
                    <p>Quản lý Loại Phòng</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse show" id="dashboard">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('room_type.showIndex') }}">
                                <span class="sub-item">Danh sách Loại Phòng</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('room_type.showCreate') }}">
                                <span class="sub-item">Thêm mới Loại Phòng</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item active">
                <a
                    data-bs-toggle="collapse"
                    href="#dashboard"
                    class="collapsed"
                    aria-expanded="false"
                >
                    <i class="fas fa-home"></i>
                    <p>Quản lý Phòng</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse show" id="dashboard">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('room.showIndex') }}">
                                <span class="sub-item">Danh sách Phòng</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('room.showCreate') }}">
                                <span class="sub-item">Thêm mới Phòng</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item active">
                <a
                    data-bs-toggle="collapse"
                    href="#dashboard"
                    class="collapsed"
                    aria-expanded="false"
                >
                    <i class="fas fa-home"></i>
                    <p>Quản lý Đơn đặt phòng</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse show" id="dashboard">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('booking.showIndex') }}">
                                <span class="sub-item">Danh sách Đơn đặt phòng</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('booking.showCreate') }}">
                                <span class="sub-item">Thêm mới Đơn đặt phòng</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item active">
                <a
                    data-bs-toggle="collapse"
                    href="#dashboard"
                    class="collapsed"
                    aria-expanded="false"
                >
                    <i class="fas fa-home"></i>
                    <p>Quản lý hóa đơn</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse show" id="dashboard">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('transaction.showIndex') }}">
                                <span class="sub-item">Danh sách hóa đơn</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
