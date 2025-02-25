@extends('admin/master_admin')
@section('content')

<style>
    .description-cell {
        word-spacing: 5px;
        min-width: 500px;
        /* Giới hạn chiều rộng của cột */
        white-space: normal;
        /* Cho phép xuống dòng */
        word-wrap: break-word;
        /* Khi từ quá dài sẽ tự động xuống dòng */
        overflow-wrap: break-word;
        /* Hỗ trợ các trình duyệt cũ */
        word-break: break-word;
        /* Đảm bảo xuống dòng ngay cả với các từ dài */

    }

    .badge {
        background-color: #17a2b8;
        padding: 25px;
    }

    .genre-cell {
        display: flex;
        flex-wrap: wrap;
        min-width: 500px;
        gap: 10px;
    }
</style>

<!-- table comics -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Danh sách truyện tranh</h3>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">ID</th>
                                <th class="wd-15p border-bottom-0">Img</th>
                                <th class="wd-15p border-bottom-0">Tên truyện</th>
                                <th class="wd-15p border-bottom-0">Mô tả</th>
                                <th class="wd-20p border-bottom-0">Tên tác giả</th>
                                <th class="wd-20p border-bottom-0">Thể loại</th>
                                <th class="wd-15p border-bottom-0">Trạng thái truyện</th>
                                <th class="wd-10p border-bottom-0">Lượt xem</th>
                                <th class="wd-25p border-bottom-0">Ngày khởi tạo</th>
                                <th class="wd-25p border-bottom-0">Chức năng</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($comics as $item)
                            <tr class="col-12">
                                <td>{{$item->id}}</td>
                                <td>
                                    @if($item->img != null )
                                    <img style="height: 250px; min-width: 150px "
                                        src="{{asset('/imgs/comics/'.$item->img)}}" alt="" srcset="">
                                    @else
                                    <img style="height: 250px; min-width: 150px"
                                        src="{{asset('/imgs/comics/no_img.png')}}" alt="" srcset="">
                                    @endif
                                </td>
                                <td>{{$item->name}}</td>
                                <td class="description-cell">{{$item->description}}
                                </td>
                                <td>
                                    @if($item->author_id != NULL)

                                    {{$item->author->name}}

                                    @else

                                    Chưa cập nhật

                                    @endif
                                </td>
                                <td class="genre-cell">

                                    @foreach($item->genres as $genre)

                                    <span class=" text-dark badge badge-info">{{ $genre->name }}</span>
                                    @endforeach
                                </td>

                                </td>
                                <td>{{$item->status_comic->name}}</td>
                                <td>
                                    @if($item->chapters && $item->chapters->count() > 0)
                                    {{ $item->chapters->sum('view') }}
                                    @else
                                    0
                                    @endif
                                </td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <a href="{{ route('admin.edit_comic_admin', ['id' => $item->id]) }}"
                                        class="btn btn-primary">Sửa</a>
                                    <form class="d-inline" method="POST"
                                        action="{{ route('admin.delete_comic_admin') }}">
                                        @csrf
                                        <button name="id" value="{{$item->id}}" type="submit" class="btn btn-danger"
                                            onclick="return confirm('Chắc chắn muốn xoá?');">
                                            Xoá
                                        </button>
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
<!-- table comics -->

@endsection