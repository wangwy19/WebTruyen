@extends('admin.master_admin')

@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Danh sách quản trị viên</h3>
            </div>
            <div class="card-body">
                <!-- Hiển thị thông báo thành công -->
                @if(session('success'))
                <div id="alert" class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role->name }}</td>
                                <td>@if($item->status == 0)
                                    Ngừng hoạt động
                                    @else
                                    Đang hoạt động

                                    @endif
                                </td>
                                <td>
                                    <!-- Nút chỉnh sửa -->
                                    <form method="POST" action="{{route('admin.reset_pass_admin')}}" class="d-inline"
                                        onsubmit="return confirm('Chắc chắn muốn reset?');">
                                        @csrf

                                        <button type="submit" name="id" value="{{$item->id}}"
                                            class="btn btn-green">Reset Pass</button>
                                    </form>
                                    <!-- Form xoá -->
                                    <form method="POST" action="{{ route('admin.delete_user_admin') }}" class="d-inline"
                                        onsubmit="return confirm('Chắc chắn muốn xoá?');">
                                        @csrf
                                        <button type="submit" name="id" value="{{$item->id}}"
                                            class="btn btn-danger">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 4000); // 4000ms = 4 giây
</script>
@endpush