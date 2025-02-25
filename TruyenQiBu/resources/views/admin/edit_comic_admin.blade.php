@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Chỉnh Sửa Truyện</h1>
                </div>

            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row ">
                <div class="col-md-12">
                    <div class="px-3 card">
                        <div class="card-body"></div>
                        <form method="POST" action="{{ route('admin.update_comic_admin', $comic->id) }}"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="control-group form-group">
                                <label for="name">Tên truyện</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $comic->name) }}">
                                @if(session('fail_name'))
                                <p class="p-3 text-danger">{{ session('fail_name') }}</p>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12 my-1">
                                    <label class="form-label">Thể loại</label>
                                    <div class="example">
                                        <div class="form-group">
                                            <div class="selectgroup selectgroup-pills">
                                                @foreach($genres as $genre)
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                                        class="selectgroup-input" @if(in_array($genre->id, old('genres',
                                                    $comic->genres->pluck('id')->toArray())))
                                                    checked
                                                    @endif
                                                    />

                                                    <span class="selectgroup-button">{{ $genre->name }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @if(session('fail_genres'))
                                    <p class="p-3 text-danger">{{ session('fail_genres') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6 my-1">
                                    <label class="form-label">Tác giả</label>
                                    <select class="form-control select2-show-search form-select" id="author_id"
                                        name="author_id">
                                        <option value="">Chọn tác giả</option>
                                        @foreach($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ $author->id == old('author_id', $comic->author_id) ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6 my-1">
                                    <label class="form-label">Trạng thái</label>
                                    <select class="form-control select2-show-search form-select id=" status_comic_id"
                                        name="status_comic_id""
                                        data-placeholder=" Choose one">
                                        @foreach($statusComics as $status)
                                        <option value="{{ $status->id }}"
                                            {{ $status->id == old('status_comic_id', $comic->status_comic_id) ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="wizard1">
                                <div>
                                    <div class="control-group form-group">
                                        <label class="form-label" for="name-wiz1">Mô tả</label>
                                        <textarea id="name-wiz1" class="form-control" name="description"
                                            placeholder="Mô tả truyện"
                                            required>{{ old('description', $comic->description) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="" style="margin-bottom: 10px;">
                                <label class="form-label" for="name-wiz1">Chọn ảnh bìa cho truyện</label>
                                <input type="file" name="img" class="dropify" data-height="200" />
                            </div>
                            <div class="control-group form-group">
                                <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
                                <a href="{{ route('admin.list_comic_admin') }}" class="btn btn-secondary">Hủy</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!--/Row -->



        </div>
    </div>
</div>
@endsection