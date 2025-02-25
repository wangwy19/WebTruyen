@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Thêm Chương Truyện</h1>
                </div>

            </div>
            <!-- PAGE-HEADER END -->


            <!-- Row -->
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <form class="card-body" method="POST" action="{{ route('admin.store_chapter_admin') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="control-group form-group">
                                <label for="name">Chương số</label>
                                <input type="numberic" class="form-control" id="name" name="chapter_number" value=""
                                    require>
                                @if(session('fail_chapter_number'))
                                <p class="p-3 text-danger">{{ session('fail_chapter_number') }}</p>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6 my-1">
                                    <label class="form-label">Tên truyện</label>
                                    <select class="form-control select2-show-search form-select" id="author_id"
                                        name="comic_id">
                                        @foreach($comics as $comic)
                                        <option value="{{ $comic->id }}">
                                            {{ $comic->name. " | Chapter mới nhất "  .(isset($comic->chapters[0])?$comic->chapters[0]->chapter_number:"0")}}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control file-input" name="chapters[]" type="file"
                                    id="formFileMultiple" multiple>

                            </div>
                            <div class="control-group form-group">
                                <button type="submit" class="btn btn-primary px-5">Thêm</button>
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