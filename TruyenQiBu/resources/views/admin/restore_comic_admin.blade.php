@extends('admin/master_admin')
@section('content')

<!-- table comics -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Khôi phục truyện tranh</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">ID</th>
                                <th class="wd-15p border-bottom-0">Tên truyện</th>
                                <th class="wd-20p border-bottom-0">Tên tác giả</th>
                                <th class="wd-15p border-bottom-0">Trạng thái truyện</th>
                                <th class="wd-10p border-bottom-0">Lượt xem</th>
                                <th class="wd-25p border-bottom-0">Mô tả</th>
                                <th class="wd-25p border-bottom-0">Ngày khởi tạo</th>
                                <th class="wd-25p border-bottom-0">Chức năng</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bella</td>
                                <td>Chloe</td>
                                <td>System Developer</td>
                                <td>2018/03/12</td>
                                <td>$654,765</td>
                                <td>b.Chloe@datatables.net</td>
                                <td>19/11/2003</td>
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
<!-- table comics -->

@endsection