@extends('user/_layout')
@section('content')

<!-- Quan li tai khoan -->
<section class="Manage-Account">
    <div class="List-Title p-2">
        <h2 class="">Quản Lí Tài Khoản</h2>
    </div>

    <div class="Manage-Form">
        <form class="Form-Left" method="post" action="{{route('user.update_avatar')}}" enctype="multipart/form-data">
            @csrf
            <img src="{{asset('imgs/'.session('user')->avatar)}}" alt="" srcset="" id="avatar">

            <input style="display: none;" name="avatar" type="file" id="inputAvatar">

            <button id="submitAvatar" type="submit" class="btn btn-primary">Thay đổi</button>

        </form>
        <div class="Form-Right">
            <div class="mb-3">
                <strong class="gradient-text-1">Cấp độ hiện tại: Cấp 1 - 90%</strong>

            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên hiển thị</label>

                <form class="Row" method="post" action="{{route('user.update_fullname')}}">
                    @csrf

                    <input type="text" name="fullname" class="form-control no-outline" id="exampleFormControlInput1"
                        placeholder="Ex: Sam">
                    <button id="" type="submit" class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="M686-132 444-376q-20 8-40.5 12t-43.5 4q-100 0-170-70t-70-170q0-36 10-68.5t28-61.5l146 146 72-72-146-146q29-18 61.5-28t68.5-10q100 0 170 70t70 170q0 23-4 43.5T584-516l244 242q12 12 12 29t-12 29l-84 84q-12 12-29 12t-29-12Zm29-85 27-27-256-256q18-20 26-46.5t8-53.5q0-60-38.5-104.5T386-758l74 74q12 12 12 28t-12 28L332-500q-12 12-28 12t-28-12l-74-74q9 57 53.5 95.5T360-440q26 0 52-8t47-25l256 256ZM472-488Z" />
                        </svg>
                    </button>

                </form>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Đổi mật khẩu</label>

                <form class="Row" method="post" action="{{route('user.update_password')}}">
                    @csrf

                    <input type="password" name="password" class="form-control no-outline" id="exampleFormControlInput2"
                        placeholder="">
                    <button id="" type="submit" class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="M686-132 444-376q-20 8-40.5 12t-43.5 4q-100 0-170-70t-70-170q0-36 10-68.5t28-61.5l146 146 72-72-146-146q29-18 61.5-28t68.5-10q100 0 170 70t70 170q0 23-4 43.5T584-516l244 242q12 12 12 29t-12 29l-84 84q-12 12-29 12t-29-12Zm29-85 27-27-256-256q18-20 26-46.5t8-53.5q0-60-38.5-104.5T386-758l74 74q12 12 12 28t-12 28L332-500q-12 12-28 12t-28-12l-74-74q9 57 53.5 95.5T360-440q26 0 52-8t47-25l256 256ZM472-488Z" />
                        </svg>
                    </button>

                </form>
            </div>

        </div>
    </div>


</section>


@endsection