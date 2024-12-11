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
                        <form class="card-body">
                            <div id="wizard1">
                                <div>
                                    <div class="control-group form-group">
                                        <label class="form-label" for="name-wiz1">Chương số</label>
                                        <input type="text" id="name-wiz1" class="form-control" placeholder="Chương số"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control file-input" type="file" id="formFileMultiple" multiple>

                            </div>
                            <div class="control-group form-group">
                                <button class="btn btn-primary px-5">Thêm</button>
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