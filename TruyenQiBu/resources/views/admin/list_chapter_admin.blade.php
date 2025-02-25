@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Danh sách chapter</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">ID</th>
                                <th class="wd-20p border-bottom-0">Chương</th>
                                <th class="wd-20p border-bottom-0">Tên truyện</th>
                                <th class="wd-20p border-bottom-0">Lượt xem</th>
                                <th class="wd-25p border-bottom-0">Chức năng</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chapters as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->chapter_number}}</td>
                                <td>{{$item->comic->name}}</td>
                                <td>{{$item->view}}</td>
                                <td>
                                    <a href="{{route('admin.edit_chapter_admin',$item->id)}}"
                                        class="btn btn-primary">Sửa</a>
                                    <form class="d-inline" method="post"
                                        action="{{route('admin.delete_chapter_admin')}}">
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