@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Chỉnh cấp bậc</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="wizard1">
                                <form method="POST" action="{{ route('admin.update_level_admin', $levels->id) }}">
                                    @csrf
                                    <div class="control-group form-group">
                                        <label class="form-label" for="name-wiz1">Tên cấp bậc</label>
                                        <input type="text" id="name-wiz1" class="form-control" name="name"
                                            value="{{ old('name', $levels->name) }}" required>
                                        @if(session('fail_name'))
                                        <p class="p-3 text-danger">{{ session('fail_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="form-label" for="name-wiz1">Tổng lượt đọc
                                        </label>
                                        <input type="text" id="name-wiz1" class="form-control" name="max_read"
                                            value="{{ old('max_read', $levels->max_read) }}" required>
                                        @if(session('fail_max_read'))
                                        <p class="p-3 text-danger">{{ session('fail_max_read') }}</p>
                                        @endif
                                    </div>

                                    <div class="control-group form-group">
                                        <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
                                        <a href="{{ route('admin.list_level_admin') }}"
                                            class="btn btn-secondary">Hủy</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Row -->
    </div>
</div>
@endsection