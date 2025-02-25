@extends('admin/master_admin')

@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Chỉnh Sửa Tác Giả</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.update_author_admin', $authors->id) }}">
                                @csrf
                                <div class="control-group form-group">
                                    <label class="form-label" for="name-wiz1">Tên tác giả</label>
                                    <input type="text" id="name-wiz1" class="form-control" name="name"
                                        value="{{ old('name', $authors->name) }}" required>
                                    @if(session('fail_name'))
                                    <p class="p-3 text-danger">{{ session('fail_name') }}</p>
                                    @endif
                                </div>

                                <div class="control-group form-group">
                                    <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
                                    <a href="{{ route('admin.list_author_admin') }}" class="btn btn-secondary">Hủy</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection