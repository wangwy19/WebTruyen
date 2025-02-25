@extends('admin.master_admin')

@section('content')
<div class="row row-sm">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Chỉnh sửa thể loại</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- Form to update genre -->
                        <form class="card-body" method="POST"
                            action="{{ route('admin.update_genre_admin', $genres->id) }}">
                            @csrf

                            <!-- Genre Name -->
                            <div class="form-group">
                                <label for="name">Tên thể loại</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name', $genres->name) }}" placeholder="Nhập tên thể loại" required>
                                @if(session('fail_name'))
                                <p class="p-3 text-danger">{{ session('fail_name') }}</p>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('admin.list_genre_admin') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection