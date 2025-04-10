@extends('admin/master_admin')
@section('content')
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Khôi phục tác giả</h3>
            </div>
            <div class="card-body">
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
                            <tr>
                                <td>19/11/2003</td>
                                <td>Bella</td>
                                <td>
                                    <form class="d-inline" method="post" action="">
                                        <button type="submit" class="btn btn-primary">Khôi phục</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection