@extends('user/_layout')
@section('content')

<!-- Bo loc tim kiem -->
<section class="List-Comic">

    <form method="GET" action="{{route('user.explorepage')}}">

        <div class="List-Title p-2">
            <h2 class="m-0">Bộ Lọc Tìm Kiếm</h2>
        </div>

        <div class="Filter-Comic">
            <div class="Filter-Item accordion Accordion-Genre">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button style="background-color: transparent;" class="no-outline accordion-button" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            Thể loại
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($genres as $item)
                            <div class="Accordion-Item">
                                <input class="form-check-input no-outline" name="genres[]" type="checkbox"
                                    value="{{$item->id}}" id="{{$item->id}}" @if(in_array($item->id, $sortGenres))
                                checked
                                @endif
                                >
                                <label class="form-check-label" for="{{$item->id}}">
                                    {{$item->name}}
                                </label>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <div class="Filter-Item accordion Accordion-Sort">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="no-outline accordion-button" style="background-color: transparent;" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true"
                            aria-controls="collapseTwo">
                            Sắp xếp
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="Accordion-Item">
                                <input class="form-check-input no-outline" type="radio" name="sortBy" value="0"
                                    id="newComics" @if($sortBy=="0" ) checked @endif>
                                <label class="form-check-label" for="newComics">
                                    Ngày cập nhật
                                </label>
                            </div>
                            <div class="Accordion-Item">
                                <input class="form-check-input no-outline" type="radio" name="sortBy"
                                    id="flexRadioDefault2" value="1" @if($sortBy=="1" ) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Lượt xem giảm dần
                                </label>
                            </div>
                            <div class="Accordion-Item">
                                <input class="form-check-input no-outline" type="radio" value="2" name="sortBy"
                                    id="flexRadioDefault4" @if($sortBy=="2" ) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault4">
                                    Lượt xem tăng dần
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="Filter-Item form-floating">
                <input id="comicName" type="text" name="name" value="{{$sortComic}}" class="form-control no-outline"
                    style="border-color: #dee2e6;" placeholder="" maxlength="100">
                <label for="comicName">Tên truyện</label>
            </div>
            <div class="Filter-Item d-flex">
                <button type="submit" class="btn btn-success p-2 ">Tìm kiếm</button>
                <button type="button" class="btn btn-danger col-2 p-2 Btn-Reset">Làm mới</button>
            </div>
        </div>

        <div class="List-Title p-2">
            <h2 class="m-0">Kết Quả Tìm Kiếm</h2>
        </div>

        <div class="List-Content">
            @foreach($comics as $item)
            <div class="List-Item">
                <div class="Comic">
                    <a href="{{route('user.comicpage',['slug' => $item->slug])}}" class="Comic-Top">
                        @if($item->img != null )
                        <img style="height: 272px;" src="{{asset('/imgs/comics/'.$item->img)}}" alt="" srcset="">
                        @else
                        <img style="height: 272px;" src="{{asset('/imgs/comics/no_img.png')}}" alt="" srcset="">
                        @endif
                        <div class="Comic-Engagement">
                            <span class="Comic-View">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="white">
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
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="white">
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

    </form>
</section>

@endsection