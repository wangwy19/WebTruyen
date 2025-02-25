@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Danh sách tác giả</h3>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div id="alert" class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">ID</th>
                                <th class="wd-20p border-bottom-0">Tên tác giả</th>
                                <th class="wd-25p border-bottom-0">Chức năng</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{ route('admin.edit_author_admin', $item->id) }}"
                                        class="btn btn-primary">Sửa</a>
                                    <form class="d-inline" method="POST"
                                        action="{{route('admin.delete_author_admin')}}">
                                        @csrf
                                        <button name="id" value="{{$item->id}}" type="submit"
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
    // Check if success message exists
    // Set timeout to hide the success message after 4 seconds (4000 milliseconds)
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 4000); // 4000ms = 4 seconds
</script>
@endpush