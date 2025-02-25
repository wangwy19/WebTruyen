@extends('user/_layout')
@section('content')

<!-- Chi tiet truyen -->
<section class="Detail-Comic">

    <div class="Detail-Info">
        <div class="Content-Left">
            @if($comic->img != null )
            <img src="{{asset('/imgs/comics/'.$comic->img)}}" alt="" srcset="">
            @else
            <img src="{{asset('/imgs/comics/no_img.png')}}" alt="" srcset="">
            @endif
            <div class="Detail-Engagement">
                <span class="Detail-View">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                        fill="white">
                        <path
                            d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                    </svg>
                    @if($comic->chapters && $comic->chapters->count() > 0)
                    {{ $comic->chapters->sum('view') }}
                    @else
                    0
                    @endif
                </span>
                <span class="Detail-Favorite">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                        fill="white">
                        <path
                            d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
                    </svg>
                    @if($comic->favorites && $comic->favorites->count() > 0)
                    {{ $comic->favorites->count('*') }}
                    @else
                    0
                    @endif
                </span>
            </div>
        </div>
        <div class="Content-Right">
            <h2>{{$comic->name}}</h2>
            <div class="Categories">
                @foreach($comic->genres as $genre)
                <a href="" class="Category">
                    <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px"
                        fill="#5f6368">
                        <path
                            d="M856-390 570-104q-12 12-27 18t-30 6q-15 0-30-6t-27-18L103-457q-11-11-17-25.5T80-513v-287q0-33 23.5-56.5T160-880h287q16 0 31 6.5t26 17.5l352 353q12 12 17.5 27t5.5 30q0 15-5.5 29.5T856-390ZM513-160l286-286-353-354H160v286l353 354ZM260-640q25 0 42.5-17.5T320-700q0-25-17.5-42.5T260-760q-25 0-42.5 17.5T200-700q0 25 17.5 42.5T260-640Zm220 160Z" />
                    </svg>
                    {{$genre->name}}
                </a>
                @endforeach


            </div>
            <h5>Tác giả : {{isset($comic->author)?$comic->author->name:"Đang cập nhật"}}</h5>
            <h5>Tình Trạng : {{$comic->status_comic->name}}</h5>
            <p class="Detail-Sumary">
                {{$comic->description}}
            </p>

            <div class="Btn-Read">
                <a class="btn btn-light no-outline" href="" class="Read-First">Đọc từ đầu</a>
                <a class="btn btn-light no-outline"
                    href="{{route('user.add_favorite', ['comic_id' => $comic->id, 'slug' => $comic->slug])}}"
                    class="Read-New"
                    @if(App\Http\Controllers\UserController::checkFavorite($comic->id,session('user')->id))
                    style="background-color:pink; color:white;"
                    @endif
                    >Yêu thích
                </a>
            </div>
        </div>
    </div>
    <div class="Detail-Chapters">
        <div class="List-Title py-3">
            <h2 class="m-0">Danh Sách Chương</h2>
        </div>

        <div class="List-Chapters">
            @foreach($comic->chapters as $item)
            <a href="{{route('user.chapterpage',['slug' => $comic->slug, 'chapter_number'=>$item->chapter_number])}}"
                class="Chapter-Item">
                <div class="Item-Left">
                    <svg xmlns="http://www.w3.org/2000/svg" height="" viewBox="0 -960 960 960" width="" fill="">
                        <defs>
                            <!-- Định nghĩa gradient -->
                            <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#2A0845" />
                                <stop offset="33%" stop-color="#6441A5" />
                                <stop offset="66%" stop-color="#2A86E2" />
                                <stop offset="100%" stop-color="#36D1DC" />
                            </linearGradient>
                        </defs>
                        <path
                            d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm263-80h377v-309l-27-37-93 30-92-30-58 79-93 30v98l-57 79 43 60Zm-99 0-43-60 76-105v-130l123-40 77-105 123 40 120-39v-41H160v480h164Zm113-237Z"
                            fill="url(#gradient1)" />
                    </svg>
                </div>
                <div class="Item-Right">
                    <h5 class="Chapter-Title m-0">Chương {{$item->chapter_number}}</h5>
                    <div class="Chapter-Summary">
                        <span class="Date">
                            {{$item->created_at->format('d/m/Y')}}
                        </span>
                        <span class="View">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="black">
                                <path
                                    d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                            </svg>
                            {{$item->view}}
                        </span>
                    </div>
                </div>
            </a>
            @endforeach




        </div>
    </div>
    <div class="Comment">
        <div class="List-Title py-3">
            <h2 class="m-0">Bình Luận</h2>
        </div>
        <form id="formComment" class="Send-Comment" method="post"
            action="{{route('user.comment', ['comic_id' => $comic->id, 'slug' => $comic->slug])}}">
            @csrf
            <input require type="text" name='text' class="form-control no-outline"
                style="border-color:black; font-size: 20px; padding: 10px; padding-right: 50px;" maxlength="100"
                id="sendComment" placeholder="Người vô ý thả tơ vào gió, Tôi đa tình tưởng đó là tơ duyên...">


            <svg id='commentComic' xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960"
                width="30px" fill="">
                <path d="M120-160v-640l760 320-760 320Zm80-120 474-200-474-200v140l240 60-240 60v140Zm0 0v-400 400Z" />
            </svg>


        </form>
        <div class="Comment-List">

            @foreach($comic->comments as $item)
            <div class="Comment-Item">
                <div class="Comment-Info">
                    <img src="{{asset('imgs/avatar.jpg')}}" alt="" class="Avatar">
                    <div class="Info-User">
                        <div class="User-Top">
                            <strong>{{$item->user->fullname}}</strong>

                        </div>
                        <div class="User-Bot">
                            <span>Độc giả</span>
                            <span class="gradient-text-1">Cấp 1 - 90%</span>

                        </div>
                    </div>
                </div>

                <div class="Comment-Content">
                    <div class="Main-Content">{{$item->text}}</div>
                    <div class="Content-Func">
                        <div class="Function">
                            <div class="Reply">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="">
                                    <path
                                        d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                </svg>
                                trả lời
                            </div>
                            <div class="Report">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="">
                                    <path
                                        d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Zm34-80h232l164-164v-232L596-760H364L200-596v232l164 164Zm116-280Z" />
                                </svg>
                                báo cáo
                            </div>
                            <div class="Banned Disable">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="">
                                    <path
                                        d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                </svg>
                                xóa bỏ
                            </div>
                        </div>
                        <div class="Whereabouts">
                            <span>{{$item->created_at->format('d/m/Y')}}</span>
                            @if($item->chapter_id != null)
                            <span>Chương {{$item->chapter->chapter_number}}</span>
                            @endif
                        </div>
                    </div>

                    <!-- <div class="Replies-List">
                        <div class="Reply-Item">
                            <div class="Comment-Info">
                                <img src="{{asset('imgs/avatar2.jpg')}}" alt="" class="Avatar">
                                <div class="Info-User">
                                    <div class="User-Top">
                                        <strong>Shenhe</strong>
                                        <strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                <path
                                                    d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                            </svg>
                                        </strong>
                                        <strong>Yelan</strong>
                                    </div>
                                    <div class="User-Bot">
                                        <span>Độc giả</span>
                                        <span class="gradient-text-2">Cấp 2 - 14%</span>

                                    </div>
                                </div>
                            </div>

                            <div class="Comment-Content">
                                <div class="Main-Content">Cánh hoa tàn, vẫn in dấu một thời vắng, Dẫu ngàn năm, tình
                                    vẫn mãi chưa quên.</div>
                                <div class="Content-Func">
                                    <div class="Function">
                                        <div class="Reply">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                            </svg>
                                            trả lời
                                        </div>
                                        <div class="Report">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Zm34-80h232l164-164v-232L596-760H364L200-596v232l164 164Zm116-280Z" />
                                            </svg>
                                            báo cáo
                                        </div>
                                        <div class="Banned Disable">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                            </svg>
                                            xóa bỏ
                                        </div>
                                    </div>
                                    <div class="Whereabouts">
                                        <span>Chương 1</span>
                                        <span>5 giờ trước</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="Reply-Item">
                            <div class="Comment-Info">
                                <img src="{{asset('imgs/avatar.jpg')}}" alt="" class="Avatar">
                                <div class="Info-User">
                                    <div class="User-Top">
                                        <strong>Yelan</strong>
                                        <strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                <path
                                                    d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                            </svg>
                                        </strong>
                                        <strong>Shenhe</strong>
                                    </div>
                                    <div class="User-Bot">
                                        <span>Độc giả</span>
                                        <span class="gradient-text-1">Cấp 1 - 90%</span>

                                    </div>
                                </div>
                            </div>

                            <div class="Comment-Content">
                                <div class="Main-Content">Em như cánh hoa giữa vườn đời, dịu dàng tỏa ngát, khiến
                                    trái tim tôi luôn mong chờ từng khoảnh khắc bên em.</div>
                                <div class="Content-Func">
                                    <div class="Function">
                                        <div class="Reply">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                            </svg>
                                            trả lời
                                        </div>
                                        <div class="Report">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Zm34-80h232l164-164v-232L596-760H364L200-596v232l164 164Zm116-280Z" />
                                            </svg>
                                            báo cáo
                                        </div>
                                        <div class="Banned Disable">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                            </svg>
                                            xóa bỏ
                                        </div>
                                    </div>
                                    <div class="Whereabouts">
                                        <span>Chương 1</span>
                                        <span>6 giờ trước</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            @endforeach
            <!-- <div class="Comment-Item">
                <div class="Comment-Info">
                    <img src="{{asset('imgs/avatar.jpg')}}" alt="" class="Avatar">
                    <div class="Info-User">
                        <div class="User-Top">
                            <strong>Yelan</strong>

                        </div>
                        <div class="User-Bot">
                            <span>Độc giả</span>
                            <span class="gradient-text-1">Cấp 1 - 90%</span>

                        </div>
                    </div>
                </div>

                <div class="Comment-Content">
                    <div class="Main-Content">Người dửng dưng để lại cánh hoa rơi, Tôi mộng tưởng là dấu yêu gửi
                        gắm.</div>
                    <div class="Content-Func">
                        <div class="Function">
                            <div class="Reply">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="">
                                    <path
                                        d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                </svg>
                                trả lời
                            </div>
                            <div class="Report">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="">
                                    <path
                                        d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Zm34-80h232l164-164v-232L596-760H364L200-596v232l164 164Zm116-280Z" />
                                </svg>
                                báo cáo
                            </div>
                            <div class="Banned Disable">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="">
                                    <path
                                        d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                </svg>
                                xóa bỏ
                            </div>
                        </div>
                        <div class="Whereabouts">
                            <span>Chương 1</span>
                            <span>4 giờ trước</span>
                        </div>
                    </div>

                    <div class="Replies-List">




                        <div class="Reply-Item">
                            <div class="Comment-Info">
                                <img src="{{asset('imgs/avatar2.jpg')}}" alt="" class="Avatar">
                                <div class="Info-User">
                                    <div class="User-Top">
                                        <strong>Shenhe</strong>
                                        <strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                <path
                                                    d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                            </svg>
                                        </strong>
                                        <strong>Yelan</strong>
                                    </div>
                                    <div class="User-Bot">
                                        <span>Độc giả</span>
                                        <span class="gradient-text-2">Cấp 2 - 14%</span>

                                    </div>
                                </div>
                            </div>

                            <div class="Comment-Content">
                                <div class="Main-Content">Cánh hoa tàn, vẫn in dấu một thời vắng, Dẫu ngàn năm, tình
                                    vẫn mãi chưa quên.</div>
                                <div class="Content-Func">
                                    <div class="Function">
                                        <div class="Reply">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                            </svg>
                                            trả lời
                                        </div>
                                        <div class="Report">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Zm34-80h232l164-164v-232L596-760H364L200-596v232l164 164Zm116-280Z" />
                                            </svg>
                                            báo cáo
                                        </div>
                                        <div class="Banned Disable">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                            </svg>
                                            xóa bỏ
                                        </div>
                                    </div>
                                    <div class="Whereabouts">
                                        <span>Chương 1</span>
                                        <span>5 giờ trước</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="Reply-Item">
                            <div class="Comment-Info">
                                <img src="{{asset('imgs/avatar.jpg')}}" alt="" class="Avatar">
                                <div class="Info-User">
                                    <div class="User-Top">
                                        <strong>Yelan</strong>
                                        <strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                <path
                                                    d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                            </svg>
                                        </strong>
                                        <strong>Shenhe</strong>
                                    </div>
                                    <div class="User-Bot">
                                        <span>Độc giả</span>
                                        <span class="gradient-text-1">Cấp 1 - 90%</span>

                                    </div>
                                </div>
                            </div>

                            <div class="Comment-Content">
                                <div class="Main-Content">Em như cánh hoa giữa vườn đời, dịu dàng tỏa ngát, khiến
                                    trái tim tôi luôn mong chờ từng khoảnh khắc bên em.</div>
                                <div class="Content-Func">
                                    <div class="Function">
                                        <div class="Reply">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z" />
                                            </svg>
                                            trả lời
                                        </div>
                                        <div class="Report">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Zm34-80h232l164-164v-232L596-760H364L200-596v232l164 164Zm116-280Z" />
                                            </svg>
                                            báo cáo
                                        </div>
                                        <div class="Banned Disable">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                viewBox="0 -960 960 960" width="24px" fill="">
                                                <path
                                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                            </svg>
                                            xóa bỏ
                                        </div>
                                    </div>
                                    <div class="Whereabouts">
                                        <span>Chương 1</span>
                                        <span>6 giờ trước</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


        </div>

        <div class="List-Footer mt-3">
            <nav aria-label="Page navigation example col-12">
                <ul class="pagination col-12">
                    <li class="page-item">
                        <button type="button" class="page-link no-outline" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </button>
                    </li>
                    <li class="page-item"><button type="button" class="page-link no-outline">1</button></li>
                    <li class="page-item"><button type="button" class="page-link no-outline">2</button></li>
                    <li class="page-item"><button class="page-link no-outline">3</button></li>
                    <li class="page-item">
                        <button class="page-link no-outline" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<script>
    document.getElementById('commentComic').addEventListener('click', function() {
        const textField = document.getElementById('sendComment');
        if (textField.value.trim() !== '') {
            document.getElementById('formComment').submit();
        } else {
            alert("Please enter some text.");
        }
    });
</script>
@endsection