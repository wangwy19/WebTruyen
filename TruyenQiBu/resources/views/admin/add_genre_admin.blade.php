@extends('admin.master_admin')

@section('content')
<div class="row row-sm">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Thêm thể loại</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">


                        <!-- Form thêm thể loại -->
                        <form method="POST" action="{{ route('admin.store_genre_admin') }}" class="card-body">
                            @csrf

                            <div>
                                <!-- Tên thể loại -->
                                <div class="control-group form-group">
                                    <label class="form-label" for="name">Tên thể loại</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Tên thể loại" required>
                                    @if(session('fail_name'))
                                    <p class="p-3 text-danger">{{session('fail_name')}}</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Nút thêm thể loại -->
                            <div class="control-group form-group">
                                <button type="submit" class="btn btn-primary px-5">Thêm</button>
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