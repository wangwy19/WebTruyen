@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="main-container container-fluid">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Thêm Cấp Bậc</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="wizard1">
                                <form method="POST" action="{{route('admin.store_level_admin')}}">
                                    @csrf
                                    <div class="control-group form-group">

                                        <label class="form-label" for="name-wiz1">Tên Cấp Bậc</label>
                                        <input type="text" id="name-wiz1" name="name" class="form-control"
                                            placeholder="Tên cấp bậc" reequired>
                                        @if(session('fail_name'))
                                        <p class="p-3 text-danger">{{ session('fail_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="control-group form-group">

                                        <label class="form-label" for="name-wiz1">Tổng lượt đọc</label>
                                        <input type="numberic" id="name-wiz1" name="max_read" class="form-control"
                                            placeholder="Tổng lượt đọc" reequired>
                                        @if(session('fail_max_read'))
                                        <p class="p-3 text-danger">{{ session('fail_max_read') }}</p>
                                        @endif
                                    </div>
                                    <div class="control-group form-group">
                                        <button class="btn btn-primary px-5">Thêm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Row -->
        </div>
    </div>
</div>
@endsection