@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Profile</h1>
                </div>

            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row ">
                <div class="col-md-12">
                    <div class="px-3 card">

                        <form class="card-body" method="POST" action="{{route('admin.edit_account_admin')}}"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="control-group form-group">
                                <label for="name">Họ tên</label>
                                <input type="text" class="form-control" id="name" name="name" value="" require>
                            </div>
                            <div class="control-group form-group">
                                <label for="name">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" value="" require>
                            </div>

                            <div class="" style="margin-bottom: 10px;">
                                <label class="form-label" for="name-wiz1">Thay đổi ảnh đại diện</label>
                                <input type="file" name="img" class="dropify" data-height="200" />
                            </div>
                            <div class="control-group form-group">
                                <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
                                <a href="{{ route('admin.list_comic_admin') }}" class="btn btn-secondary">Hủy</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!--/Row -->



        </div>
    </div>
</div>
@endsection