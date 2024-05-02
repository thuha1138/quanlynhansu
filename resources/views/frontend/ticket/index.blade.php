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
                <button type="button" class="btn btn-outline-primary d-none d-md-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tạo Ticket mới
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tạo Ticket mới</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('createticket') }}">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                              <input type="hidden" name="id" value="{{ $id }}" id="">
                              <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                             
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                               <textarea name="des" id="" cols="30" rows="10" class="form-control"></textarea>
                                
                              </div>
                            <button type="submit" class="btn btn-primary">Tạo</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
                <div>
                    <table id="example"
                        class="table text-nowrap table-centered mt-0 dataTable no-footer dtr-inline collapsed"
                        style="width: 100%;" role="grid" aria-describedby="example_info">
                        <thead class="table-light">
                            <tr role="row">
                               <th>STT</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 271px;" aria-label="Category: activate to sort column ascending">Họ Và Tên
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 0px;" aria-label="Added Date: activate to sort column ascending">Tiêu đề</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" style="width: 539px;"
                                    aria-label="Product: activate to sort column descending" aria-sort="ascending">Nội dung
                                </th>
                                {{-- <th>Thao tác</th> --}}
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ticket as $key=>$item)
                                <tr role="row" class="odd">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $name }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->des }}</td>
                                    {{-- <td class="" style="">
                                        <button class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="editOne" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->MaTicket }}">
                                            
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </button>

                                        <div class="modal fade" id="exampleModal{{ $item->MaTicket }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Sửa Ticket {{ $item->title }}</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <form action="{{ route('updateticket') }}">
                                                    <div class="mb-3">
                                                      <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                                                      <input type="hidden" name="id" value="{{ $id }}" id="">
                                                      <input type="hidden" name="maticket" value="{{ $item->MaTicket }}" id="">
                                                      <input type="text" name="title" value="{{ $item->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                     
                                                    </div>
                        
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                                                       <textarea name="des" id="" cols="30" rows="10" class="form-control">
                                                        {{ $item->des }}
                                                       </textarea>
                                                        
                                                      </div>
                                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                        <a href="{{ route('deleteticket',['id'=>$id , 'maticket' => $item->MaTicket]) }}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trashOne" >
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                      </td> --}}
                                      <td>
                                        @if($item->TrangThai == 1)
                                            Done
                                        @else
                                        Waiting
                                        @endif
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
