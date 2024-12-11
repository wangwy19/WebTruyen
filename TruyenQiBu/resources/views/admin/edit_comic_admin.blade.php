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
                            <div class="row">
                                <div class="col-md-12 my-1">
                                    <label class="form-label">Thể loại</label>
                                    <div class="example">

                                        <div class="form-group ">
                                            <div class="selectgroup selectgroup-pills">
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="value" value="HTML"
                                                        class="selectgroup-input" checked>
                                                    <span class="selectgroup-button">Ecchi</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="value" value="CSS"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Hành động</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="value" value="PHP"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Viễn tưởng</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="value" value="JavaScript"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Hài hước</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="value" value="Angular"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Isekai</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="value" value="Java"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Học đường</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="value" value="C++"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Hệ thống</span>
                                                </label> <label class="selectgroup-item">
                                                    <input type="checkbox" name="value" value="C++"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Lãng mạn</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6 my-1">
                                    <label class="form-label">Tác giả</label>
                                    <select class="form-control select2-show-search form-select"
                                        data-placeholder="Choose one">
                                        <option label="Choose one"></option>
                                        <option value="1">Chuck Testa</option>
                                        <option value="2">Sage Cattabriga-Alosa</option>
                                        <option value="3">Nikola Tesla</option>
                                        <option value="4">Cattabriga-Alosa</option>
                                        <option value="5">Nikola Alosa</option>
                                        <option value="6">Chuck Testa</option>
                                        <option value="7">Sage Cattabriga-Alosa</option>
                                        <option value="8">Nikola Tesla</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6 my-1">
                                    <label class="form-label">Trạng thái</label>
                                    <select class="form-control select2-show-search form-select"
                                        data-placeholder="Choose one">
                                        <option label="Choose one"></option>
                                        <option value="1">Chuck Testa</option>
                                        <option value="2">Sage Cattabriga-Alosa</option>
                                        <option value="3">Nikola Tesla</option>
                                    </select>
                                </div>
                            </div>
                            <div id="wizard1">
                                <div>
                                    <div class="control-group form-group">
                                        <label class="form-label" for="name-wiz1">Mô tả</label>
                                        <input type="text" id="name-wiz1" class="form-control"
                                            placeholder="Mô tả truyện" required>
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
            <!--/Row -->



        </div>
    </div>
</div>
@endsection