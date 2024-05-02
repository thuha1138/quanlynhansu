<!-- page content -->
@extends('welcome')
@section('content')
    <div id="app-content">

        <!-- Container fluid -->
        <div class="app-content-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Bg -->
                        <div class="pt-20 rounded-top"
                            style="
            background: url(../assets/images/background/profile-cover.jpg)
              no-repeat;
            background-size: cover;
          ">
                        </div>
                        <div class="card rounded-bottom rounded-0 smooth-shadow-sm mb-5">
                            <div class="d-flex align-items-center justify-content-between pt-4 pb-6 px-4">
                                <div class="d-flex align-items-center">
                                    <!-- avatar -->
                                    <div
                                        class="avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                                        <img src="../assets/images/avatar/avatar-11.jpg"
                                            class="avatar-xxl
              rounded-circle border border-2 " alt="Image">
                                        <a href="#!" class="position-absolute top-0 right-0 me-2">
                                            <img src="../assets/images/svg/checked-mark.svg" alt="Image" class="icon-sm">
                                        </a>
                                    </div>
                                    <!-- text -->
                                    <div class="lh-1">
                                        <h2 class="mb-0">
                                            Nguyễn Thu Hà
                                            <a href="#!" class="text-decoration-none">
                                            </a>
                                        </h2>
                                        <p class="mb-0 d-block">hatmu@gmail.com</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('dangxuat') }}" class="btn btn-outline-primary d-none d-md-block">Đăng xuất</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content -->
                <div>
                    @php
                        use Carbon\Carbon;
                    @endphp
                    <h3 class="fw-bold">Chấm công ngày hôm nay {{ Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y') }}</h3>
                    <div class="d-flex">
                        @if (!empty($chamcong[0]))
                            @php
                                $ngayHienTai = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                            @endphp

                            @if ($chamcong[0]->ngaychamcong == $ngayHienTai)
                                <a class="btn btn-outline-info  d-md-block mb-3 me-3">Bạn đã chấm công vào</a>
                            @else
                                <a href="{{ route('check.chamCongVao', ['id' => $id]) }}"
                                    class="btn btn-outline-primary  d-md-block mb-3 me-3">Chấm công vào</a>
                            @endif
                        @else
                        <a href="{{ route('check.chamCongVao', ['id' => $id]) }}"
                            class="btn btn-outline-primary  d-md-block mb-3 me-3">Chấm công vào</a>

                        @endif
                        @if (!empty($chamcong[0]))
                            @if ($chamcong[0]->Checkout != null)
                                <a class="btn btn-outline-info  d-md-block mb-3 me-3">Bạn đã chấm công ra</a>
                            @else
                                <a href="{{ route('check.chamCongRa', ['id' => $id]) }}"
                                    class="btn btn-outline-primary  d-md-block mb-3 me-3">Chấm công ra</a>
                            @endif
                        @else
                        <a href="{{ route('check.chamCongRa', ['id' => $id]) }}"
                            class="btn btn-outline-primary  d-md-block mb-3 me-3">Chấm công ra</a>

                        @endif
                    </div>
                </div>
                <div>
                    <table id="example"
                        class="table text-nowrap table-centered mt-0 dataTable no-footer dtr-inline collapsed"
                        style="width: 100%;" role="grid" aria-describedby="example_info">
                        <thead class="table-light">
                            <tr role="row">
                                <th>ID Người dùng</th>
                                <th class="ps-1 sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 539px;"
                                    aria-label="Product: activate to sort column descending" aria-sort="ascending">Họ Và Tên
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 271px;" aria-label="Category: activate to sort column ascending">Ngày chấm
                                    công
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 0px;" aria-label="Added Date: activate to sort column ascending">Giờ vào
                                    Date</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 0px;" aria-label="Price: activate to sort column ascending">Giờ ra</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 0px;" aria-label="Quantity: activate to sort column ascending">Chấm công
                                    vào
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 0px;" aria-label="Status: activate to sort column ascending">Chấm công ra
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chamcong as $key=>$item)
                                <tr role="row" class="odd">
                                    <td>{{ $key + 1 }}</td>
                                    <td class="ps-0 sorting_1">
                                        <div class="d-flex align-items-center">
                                            {{ $name }}
                                        </div>
                                    </td>
                                    <td class="">{{ date('d-m-Y H:i:s', strtotime($item->ngaychamcong)) }}
                                    </td>
                                    <td class="" style=""> @if ($item->Checkin)
                                        {{ date('d-m-Y H:i:s', strtotime($item->Checkout)) }}
                                    @else
                                        Chưa chấm
                                    @endif
                                    </td>
                                    <td class="" style="">
                                        @if ($item->Checkout)
                                            {{ date('d-m-Y H:i:s', strtotime($item->Checkout)) }}
                                        @else
                                            Chưa chấm
                                        @endif
                                    </td>

                                    <td class="" style=""><button
                                            class="btn btn-outline-primary d-none d-md-block">
                                        @if ($item->Checkin)
                                        Đã chấm
                                        @else
                                        Chưa chấm
                                        @endif
                                        </button></td>
                                    <td class="" style="">
                                        <button class="btn btn-outline-primary d-none d-md-block">
                                            @if ($item->Checkout)
                                            Đã chấm
                                            @else
                                            Chưa chấm
                                            @endif</button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
