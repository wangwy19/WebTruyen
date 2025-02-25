@extends('user/_layout')
@section('content')

<!-- slide -->
<section class="Slide">
    <div class="Slide-Title p-2">
        <h2 class="m-0">Truyện Nổi Bật</h2>
    </div>

    <div class="Slide-Control">
        <button class="Slide-Button-Pre " id="btnPre">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z" />
            </svg>
        </button>
        <button class="Slide-Button-Next" id="btnNext">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z" />
            </svg>
        </button>
    </div>

    <div class="Slide-List">
        @foreach($popular as $item)
        <div class="Slide-Item">
            <div class="Comic">
                <a href="{{route('user.comicpage',['slug' => $item->slug])}}" class="Comic-Top">
                    @if($item->img != null )
                    <img src="{{asset('/imgs/comics/'.$item->img)}}" alt="" srcset="">
                    @else
                    <img src="{{asset('/imgs/comics/no_img.png')}}" alt="" srcset="">
                    @endif

                    <div class="Comic-Engagement">
                        <span class="Comic-View">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="white">
                                <path
                                    d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                            </svg>
                            @if($item->chapters && $item->chapters->count() > 0)
                            {{ $item->chapters->sum('view') }}
                            @else
                            0
                            @endif
                        </span>
                        <span class="Comic-Favorite">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="white">
                                <path
                                    d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
                            </svg>
                            @if($item->favorites && $item->favorites->count() > 0)
                            {{ $item->favorites->count('*') }}
                            @else
                            0
                            @endif
                        </span>
                    </div>
                </a>
                <div class="Comic-Bot">
                    <p class="Comic-Name truncate">{{$item->name}}</p>
                    <div class="Chapters">
                        @foreach($item->chapters->take(2) as $chapter)
                        <a class="Chapter">

                            <span>Chapter {{$chapter->chapter_number}}</span>
                            <span>{{$chapter->created_at->format('d/m/Y')}}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        @endforeach




    </div>
</section>


<!-- Danh sach truyen moi -->
<section class="List-Comic">
    <div class="List-Title p-2">
        <h2 class="m-0">Mới Cập Nhật</h2>
    </div>

    <div class="List-Content">
        @foreach($new as $item)

        <div class="List-Item">
            <div class="Comic">
                <a href="{{route('user.comicpage',['slug' => $item->slug])}}" class="Comic-Top">
                    @if($item->img != null )
                    <img style="height:272px" src="{{asset('/imgs/comics/'.$item->img)}}" alt="" srcset="">
                    @else
                    <img style="height:272px" src="{{asset('/imgs/comics/no_img.png')}}" alt="" srcset="">
                    @endif
                    <div class="Comic-Engagement">
                        <span class="Comic-View">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="white">
                                <path
                                    d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                            </svg>
                            @if($item->chapters && $item->chapters->count() > 0)
                            {{ $item->chapters->sum('view') }}
                            @else
                            0
                            @endif
                        </span>
                        <span class="Comic-Favorite">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="white">
                                <path
                                    d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
                            </svg>
                            @if($item->favorites && $item->favorites->count() > 0)
                            {{ $item->favorites->count('*') }}
                            @else
                            0
                            @endif
                        </span>
                    </div>
                </a>
                <div class="Comic-Bot">
                    <p class="Comic-Name truncate">{{$item->name}}</p>
                    <div class="Chapters">
                        @foreach($item->chapters->take(2) as $chapter)
                        <a class="Chapter">

                            <span>Chapter {{$chapter->chapter_number}}</span>
                            <span>{{$chapter->created_at->format('d/m/Y')}}</span>
                        </a>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
        @endforeach


    </div>

    <div class="List-Footer">
        <a href="{{route('user.explorepage')}}" class="Load-More btn btn-warning">Xem thêm</a>
    </div>
</section>


<!-- Truyen de xuat -->
<section class="List-Recomment">
    <div class="List-Title p-2">
        <h2 class="m-0">Truyện Đề Xuất</h2>
    </div>

    <div class="Comic-Recomment">
        @foreach($suggestion as $item)
        <div class="Recomment-Item">
            <div class="Comic-Horizontal">
                <a href="{{route('user.comicpage',['slug' => $item->slug])}}" class="Comic-Left">
                    @if($item->img != null )
                    <img src="{{asset('/imgs/comics/'.$item->img)}}" alt="" srcset="">
                    @else
                    <img src="{{asset('/imgs/comics/no_img.png')}}" alt="" srcset="">
                    @endif
                </a>
                <div class="Comic-Right">
                    <div class="Info-Top">
                        <span>{{ optional($item->chapters->first())->chapter_number ? "Chapter " . optional($item->chapters->first())->chapter_number : "Đang cập nhật" }}</span>
                        <div class="Engagement">
                            <span class="Comic-View">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="black">
                                    <path
                                        d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                </svg>
                                @if($item->chapters && $item->chapters->count() > 0)
                                {{ $item->chapters->sum('view') }}
                                @else
                                0
                                @endif
                            </span>
                            <span class="Comic-Favorite" style="text-align: right;">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="black">
                                    <path
                                        d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
                                </svg>
                                @if($item->favorites && $item->favorites->count() > 0)
                                {{ $item->favorites->count('*') }}
                                @else
                                0
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="Info-Main">
                        <h3 class="">{{$item->name}}</h3>
                        <div class="Categories">
                            @foreach($item->genres as $genre)
                            <a href="" class="Category">
                                <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960"
                                    width="15px" fill="#5f6368">
                                    <path
                                        d="M856-390 570-104q-12 12-27 18t-30 6q-15 0-30-6t-27-18L103-457q-11-11-17-25.5T80-513v-287q0-33 23.5-56.5T160-880h287q16 0 31 6.5t26 17.5l352 353q12 12 17.5 27t5.5 30q0 15-5.5 29.5T856-390ZM513-160l286-286-353-354H160v286l353 354ZM260-640q25 0 42.5-17.5T320-700q0-25-17.5-42.5T260-760q-25 0-42.5 17.5T200-700q0 25 17.5 42.5T260-640Zm220 160Z" />
                                </svg>
                                {{$genre->name}}
                            </a>
                            @endforeach


                        </div>

                        <div class="Description">
                            {{$item->description}}
                        </div>
                    </div>
                    <div class="Info-Bot">
                        <a href="{{route('user.comicpage',['slug' => $item->slug])}}" class="btn btn-primary">Đọc
                            truyện</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</section>

@endsection