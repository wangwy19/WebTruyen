@extends('user/_layout')
@section('content')

<!-- Chi tiet chapter -->
<section class="Detail-Chapter">
    <div class="Title-Chapter">
        <h3 class="">{{$comic->name}}</h3>
    </div>
    <nav class="position-relative" id="stickySection">
        <div class="Control-Chapter" id="controlChapter">
            <div class="Control">


                <div class="Chapter-Number" id="chapterNumber">
                    <strong>#{{$chapters->chapter_number}}</strong>
                </div>

            </div>

            <div class="Select-Chapters position-absolute top-100" id="selectChapters">


                <div class="Select-Options" id="selectOptions">
                    <div class="List-Options">
                        @foreach($comic->chapters as $chapter)
                        <a href="{{route('user.chapterpage',['slug' => $comic->slug, 'chapter_number'=>$chapter->chapter_number])}}"
                            class="Option-Item">
                            <div class="">
                                @if($comic->img != null )
                                <img src="{{asset('/imgs/comics/'.$comic->img)}}" alt="" srcset="">
                                @else
                                <img src="{{asset('/imgs/comics/no_img.png')}}" alt="" srcset="">
                                @endif
                                <strong>#{{$chapter->chapter_number}}</strong>
                            </div>
                        </a>
                        @endforeach



                    </div>

                </div>

                <div class="Control-Left">
                    <svg id="scrollByLeft2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#000000">
                        <path
                            d="M383-480 200-664l56-56 240 240-240 240-56-56 183-184Zm264 0L464-664l56-56 240 240-240 240-56-56 183-184Z" />
                    </svg>
                    <svg id="scrollByLeft" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#000000">
                        <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                    </svg>
                </div>
                <div class="Control-Right">
                    <svg id="scrollByRight" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#000000">
                        <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                    </svg>
                    <svg id="scrollByRight2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                        width="24px" fill="#000000">
                        <path
                            d="M383-480 200-664l56-56 240 240-240 240-56-56 183-184Zm264 0L464-664l56-56 240 240-240 240-56-56 183-184Z" />
                    </svg>
                </div>

            </div>
        </div>


    </nav>

    <div class="Main-Chapter">
        @foreach($chapters->images as $item)
        <img src="{{asset('imgs/chapters/'.$comic->id.'/'.$chapters->chapter_number.'/'.$item->name)}}" alt="">
        @endforeach

    </div>


    <div class="Comment">
        <div class="List-Title py-3">
            <h2 class="m-0">Bình Luận</h2>
        </div>
        <form id="formComment" class="Send-Comment" method="post"
            action="{{route('user.comment', ['comic_id' => $comic->id, 'slug' => $comic->slug, 'chapter_id' => $chapter->id])}}">
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
            @if($item->chapter_id == $chapters->id)
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
            @endif
            @endforeach


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