@extends('admin.master_admin')

@section('content')
<div class="row row-sm">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Thêm quản trị viên</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">



                        <form method="POST" action="{{ route('admin.store_user_admin') }}" class="card-body">
                            @csrf

                            <div>

                                <div class="control-group form-group">
                                    <label class="form-label" for="name">Họ và tên</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Họ và tên" required>
                                    @if(session('fail_name'))
                                    <p class="p-3 text-danger">{{session('fail_name')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div>

                                <div class="control-group form-group">
                                    <label class="form-label" for="name">Email</label>
                                    <input type="email" id="name" name="email" class="form-control" placeholder="Email"
                                        required>
                                    @if(session('fail_email'))
                                    <p class="p-3 text-danger">{{session('fail_email')}}</p>
                                    @endif
                                </div>
                            </div>


                            <div class="control-group form-group">
                                <button type="submit" class="btn btn-primary px-5">Thêm</button>
                                <a href="{{ route('admin.list_user_admin') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection