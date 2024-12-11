@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="main-container container-fluid">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Thêm tác giả</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="wizard1">
                                <form>
                                    <div class="control-group form-group">

                                        <label class="form-label" for="name-wiz1">Tên tác giả</label>
                                        <input type="text" id="name-wiz1" class="form-control" placeholder="Tên tác giả"
                                            required>
                                    </div>
                                    <div class="control-group form-group">
                                        <button class="btn btn-primary px-5">Thêm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Row -->
        </div>
    </div>
</div>
@endsection