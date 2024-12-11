@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Chỉnh sửa tác giả</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <form class="card-body">
                            <div id="wizard1">
                                <div>
                                    <div class="control-group form-group">
                                        <label class="form-label" for="name-wiz1">Tên truyện</label>
                                        <input type="text" id="name-wiz1" class="form-control" placeholder="Tên truyện"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <button class="btn btn-primary px-5">Sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/Row -->
    </div>
</div>
@endsection