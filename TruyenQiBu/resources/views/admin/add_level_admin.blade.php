@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Thêm cấp bậc</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="wizard1">
                                <form>
                                    <div class="control-group form-group">

                                        <label class="form-label" for="name-wiz1">Tên cấp</label>
                                        <input type="text" id="name-wiz1" class="form-control" placeholder="Tên cấp"
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
        </div>
        <!--/Row -->
    </div>
</div>
@endsection