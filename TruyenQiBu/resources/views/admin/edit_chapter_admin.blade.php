@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Chỉnh Sửa Chương Truyện</h1>
                </div>

            </div>
            <!-- PAGE-HEADER END -->


            <!-- Row -->
            <div class="row ">
                <div class="col-md-12">
                    <div class="px-3 card">
                        <div class="card-body"></div>
                        <form method="POST" action="{{ route('admin.update_chapter_admin', $chapters->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="control-group form-group">
                                <h4>{{$chapters->comic->name}}</h1>

                            </div>
                            <div class="control-group form-group">
                                <label for="name">Chương số</label>
                                <input type="text" class="form-control" id="name" name="chapter_number"
                                    value="{{($chapters->chapter_number) }}">
                                @if(session('fail_chapter_number'))
                                <p class="p-3 text-danger">{{ session('fail_chapter_number') }}</p>
                                @endif
                                <input type="hidden" name="comic_id" value="{{($chapters->comic_id) }}">

                            </div>

                            <div class="form-group">
                                <input class="form-control file-input" name="chapters[]" type="file"
                                    id="formFileMultiple" multiple>

                            </div>
                            <div class="control-group form-group">
                                <button class="btn btn-primary px-5">Sửa</button>
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