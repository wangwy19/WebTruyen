<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/_layout.css')}}">
    <link rel="stylesheet" href="{{asset('css/slide_comic.css')}}">
    <link rel="stylesheet" href="{{asset('css/list_comic.css')}}">
    <link rel="stylesheet" href="{{asset('css/comic_horizontal.css')}}">
    <link rel="stylesheet" href="{{asset('css/filter_comic.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail_comic.css')}}">
    <link rel="stylesheet" href="{{asset('css/comment.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail_chapter.css')}}">
    <link rel="stylesheet" href="{{asset('css/notification.css')}}">
    <link rel="stylesheet" href="{{asset('css/manage_account.css')}}">

    <title>Góc Truyện Tranh</title>
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v21.0">
    </script>

    @if(session('note'))
    <div id='note' style="position: fixed; z-index:9999; top:10px; right:5px;" class="alert alert-info">
        {{session('note')}}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('note').style.display = 'none';
        }, 3000); // 4000ms = 4 giây
    </script>
    @endif


    <header class="">
        <div class="Nav position-relative">
            <div class="Logo">
                <img src="{{asset('imgs/logo.png')}}" alt="" srcset="">
            </div>

            <ul class="Nav-List">
                <li class="Nav-Item">
                    <a href="{{route('user.homepage')}}">
                        Trang Chủ
                    </a>
                </li>
                <li class="Nav-Item">
                    <a>
                        Thể Loại
                    </a>
                    <ul class="position-absolute list-unstyled m-0 Dropdown-Content">
                        @foreach(App\Http\Controllers\GenreController::GetGenres() as $item)
                        <li class="Dropdown-Item">
                            <a href="{{route('user.explorepage',['genres'=>[$item->id]])}}">{{$item->name}}</a>
                        </li>
                        @endforeach



                    </ul>
                </li>
                <li class="Nav-Item">
                    <a href="{{route('user.my_favorite')}}">
                        Yêu Thích
                    </a>
                </li>
            </ul>

            <form method="GET" action="{{route('user.explorepage')}}" class="Search">
                <a href="{{route('user.explorepage')}}" class="btn btn-warning Filter">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                        <path
                            d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z" />
                    </svg>
                </a>
                <input type="text" name="name" class="">
                <button type="submit" class="Search-Icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                        <path
                            d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                    </svg>
                </button>


            </form>

            <div class="Login">
                @if(session('user'))
                <div class="position-relative Avatar">
                    @if(session('user')->avatar)
                    <img width="50px" src="{{asset('imgs/'. session('user')->avatar)}}" alt="" srcset="">

                    @else
                    <img src="{{asset('imgs/avatar.jpg')}}" alt="" srcset="">

                    @endif
                    <span class="Note position-absolute translate-middle bg-danger border border-light rounded-circle">
                    </span>

                    <div class="Profile-Menu position-absolute " style="z-index: 99999;">
                        <ul class="Menu-List list-unstyled m-0">
                            <li class="Menu-Item">
                                <a href="{{route('user.account_manage')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#5f6368">
                                        <path
                                            d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z" />
                                    </svg>
                                    <span>Quản lí tài khoản</span>
                                </a>

                            </li>
                            <li class="Menu-Item position-relative">
                                <a href="{{route('user.notificationpage')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#5f6368">
                                        <path
                                            d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h404q-4 20-4 40t4 40H160l320 200 146-91q14 13 30.5 22.5T691-572L480-440 160-640v400h640v-324q23-5 43-14t37-22v360q0 33-23.5 56.5T800-160H160Zm0-560v480-480Zm600 80q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35Z" />
                                    </svg>
                                    <span>Thông báo</span>
                                    <span
                                        class="Note position-absolute translate-middle bg-danger border border-light rounded-circle">
                                    </span>
                                </a>

                            </li>
                            <li class="Menu-Item">
                                <a href="{{route('user.logout_user')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#5f6368">
                                        <path
                                            d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                                    </svg>

                                    <span>Đăng xuất</span>


                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" id="loggedOut">
                    <path
                        d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                </svg>
                @endif
                <!-- logged out -->


                <!-- logged in -->

            </div>

        </div>



    </header>

    @yield('content')


    <footer>
        <div class="Footer-Left">
            <img src="{{asset('imgs/logo.png')}}" alt="" srcset="" style="margin-bottom: 10px;">

            <p>Chào mừng đến với Góc Truyện Tranh!</p>
            <div class="Contact">
                <a href="" class="Contact-Link">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 48 48">
                        <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1" x1="9.993" x2="40.615" y1="9.993"
                            y2="40.615" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#2aa4f4"></stop>
                            <stop offset="1" stop-color="#007ad9"></stop>
                        </linearGradient>
                        <path fill="url(#Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1)"
                            d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"></path>
                        <path fill="#fff"
                            d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z">
                        </path>
                    </svg>
                </a>
                <a href="" class="Contact-Link">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 48 48">
                        <radialGradient id="yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1" cx="19.38" cy="42.035" r="44.899"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#fd5"></stop>
                            <stop offset=".328" stop-color="#ff543f"></stop>
                            <stop offset=".348" stop-color="#fc5245"></stop>
                            <stop offset=".504" stop-color="#e64771"></stop>
                            <stop offset=".643" stop-color="#d53e91"></stop>
                            <stop offset=".761" stop-color="#cc39a4"></stop>
                            <stop offset=".841" stop-color="#c837ab"></stop>
                        </radialGradient>
                        <path fill="url(#yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1)"
                            d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z">
                        </path>
                        <radialGradient id="yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2" cx="11.786" cy="5.54" r="29.813"
                            gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#4168c9"></stop>
                            <stop offset=".999" stop-color="#4168c9" stop-opacity="0"></stop>
                        </radialGradient>
                        <path fill="url(#yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2)"
                            d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z">
                        </path>
                        <path fill="#fff"
                            d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z">
                        </path>
                        <circle cx="31.5" cy="16.5" r="1.5" fill="#fff"></circle>
                        <path fill="#fff"
                            d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z">
                        </path>
                    </svg>
                </a>
                <a href="" class="Contact-Link">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 48 48">
                        <path fill="#FF3D00"
                            d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z">
                        </path>
                        <path fill="#FFF" d="M20 31L20 17 32 24z"></path>
                    </svg>
                </a>
                <a href="" class="Contact-Link">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 100 100">
                        <path fill="#c7ede6"
                            d="M87.215,56.71C88.35,54.555,89,52.105,89,49.5c0-6.621-4.159-12.257-10.001-14.478 C78.999,35.015,79,35.008,79,35c0-11.598-9.402-21-21-21c-9.784,0-17.981,6.701-20.313,15.757C36.211,29.272,34.638,29,33,29 c-7.692,0-14.023,5.793-14.89,13.252C12.906,43.353,9,47.969,9,53.5C9,59.851,14.149,65,20.5,65c0.177,0,0.352-0.012,0.526-0.022 C21.022,65.153,21,65.324,21,65.5C21,76.822,30.178,86,41.5,86c6.437,0,12.175-2.972,15.934-7.614C59.612,80.611,62.64,82,66,82 c4.65,0,8.674-2.65,10.666-6.518C77.718,75.817,78.837,76,80,76c6.075,0,11-4.925,11-11C91,61.689,89.53,58.727,87.215,56.71z">
                        </path>
                        <path fill="#fdfcef"
                            d="M34.5,40.5V41h3v-0.5c0,0,4.242,0,5.5,0c2.485,0,4.5-2.015,4.5-4.5 c0-2.333-1.782-4.229-4.055-4.455C43.467,31.364,43.5,31.187,43.5,31c0-2.485-2.015-4.5-4.5-4.5c-1.438,0-2.703,0.686-3.527,1.736 C35.333,25.6,33.171,23.5,30.5,23.5c-2.761,0-5,2.239-5,5c0,0.446,0.077,0.87,0.187,1.282C25.045,29.005,24.086,28.5,23,28.5 c-1.781,0-3.234,1.335-3.455,3.055C19.364,31.533,19.187,31.5,19,31.5c-2.485,0-4.5,2.015-4.5,4.5s2.015,4.5,4.5,4.5s9.5,0,9.5,0 H34.5z">
                        </path>
                        <path fill="#472b29"
                            d="M30.5,23c-3.033,0-5.5,2.467-5.5,5.5c0,0.016,0,0.031,0,0.047C24.398,28.192,23.71,28,23,28 c-1.831,0-3.411,1.261-3.858,3.005C19.095,31.002,19.048,31,19,31c-2.757,0-5,2.243-5,5s2.243,5,5,5h15.5 c0.276,0,0.5-0.224,0.5-0.5S34.776,40,34.5,40H19c-2.206,0-4-1.794-4-4s1.794-4,4-4c0.117,0,0.23,0.017,0.343,0.032l0.141,0.019 c0.021,0.003,0.041,0.004,0.062,0.004c0.246,0,0.462-0.185,0.495-0.437C20.232,30.125,21.504,29,23,29 c0.885,0,1.723,0.401,2.301,1.1c0.098,0.118,0.241,0.182,0.386,0.182c0.078,0,0.156-0.018,0.228-0.056 c0.209-0.107,0.314-0.346,0.254-0.573C26.054,29.218,26,28.852,26,28.5c0-2.481,2.019-4.5,4.5-4.5 c2.381,0,4.347,1.872,4.474,4.263c0.011,0.208,0.15,0.387,0.349,0.45c0.05,0.016,0.101,0.024,0.152,0.024 c0.15,0,0.296-0.069,0.392-0.192C36.638,27.563,37.779,27,39,27c2.206,0,4,1.794,4,4c0,0.117-0.017,0.23-0.032,0.343l-0.019,0.141 c-0.016,0.134,0.022,0.268,0.106,0.373c0.084,0.105,0.207,0.172,0.34,0.185C45.451,32.247,47,33.949,47,36c0,2.206-1.794,4-4,4 h-5.5c-0.276,0-0.5,0.224-0.5,0.5s0.224,0.5,0.5,0.5H43c2.757,0,5-2.243,5-5c0-2.397-1.689-4.413-4.003-4.877 C43.999,31.082,44,31.041,44,31c0-2.757-2.243-5-5-5c-1.176,0-2.293,0.416-3.183,1.164C35.219,24.76,33.055,23,30.5,23L30.5,23z">
                        </path>
                        <path fill="#472b29"
                            d="M29,30c-1.403,0-2.609,0.999-2.913,2.341C25.72,32.119,25.301,32,24.875,32 c-1.202,0-2.198,0.897-2.353,2.068C22.319,34.022,22.126,34,21.937,34c-1.529,0-2.811,1.2-2.918,2.732 C19.01,36.87,19.114,36.99,19.251,37c0.006,0,0.012,0,0.018,0c0.13,0,0.24-0.101,0.249-0.232c0.089-1.271,1.151-2.268,2.419-2.268 c0.229,0,0.47,0.042,0.738,0.127c0.022,0.007,0.045,0.01,0.067,0.01c0.055,0,0.11-0.02,0.156-0.054 C22.962,34.537,23,34.455,23,34.375c0-1.034,0.841-1.875,1.875-1.875c0.447,0,0.885,0.168,1.231,0.473 c0.047,0.041,0.106,0.063,0.165,0.063c0.032,0,0.063-0.006,0.093-0.019c0.088-0.035,0.148-0.117,0.155-0.212 C26.623,31.512,27.712,30.5,29,30.5c0.208,0,0.425,0.034,0.682,0.107c0.023,0.007,0.047,0.01,0.07,0.01 c0.109,0,0.207-0.073,0.239-0.182c0.038-0.133-0.039-0.271-0.172-0.309C29.517,30.04,29.256,30,29,30L29,30z">
                        </path>
                        <path fill="#472b29"
                            d="M42.883,31.5c-1.326,0-2.508,0.897-2.874,2.182c-0.038,0.133,0.039,0.271,0.172,0.309 C40.205,33.997,40.228,34,40.25,34c0.109,0,0.209-0.072,0.24-0.182C40.795,32.748,41.779,32,42.883,32 c0.117,0,0.23,0.014,0.342,0.029c0.012,0.002,0.023,0.003,0.035,0.003c0.121,0,0.229-0.092,0.246-0.217 c0.019-0.137-0.077-0.263-0.214-0.281C43.158,31.516,43.022,31.5,42.883,31.5L42.883,31.5z">
                        </path>
                        <path fill="#fff"
                            d="M25.5,71h-10c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h10c0.276,0,0.5,0.224,0.5,0.5 S25.777,71,25.5,71z">
                        </path>
                        <path fill="#fff"
                            d="M28.5,71h-1c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h1c0.276,0,0.5,0.224,0.5,0.5 S28.777,71,28.5,71z">
                        </path>
                        <path fill="#fff"
                            d="M33.491,73H24.5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h8.991c0.276,0,0.5,0.224,0.5,0.5 S33.767,73,33.491,73z">
                        </path>
                        <path fill="#fff"
                            d="M22.5,73h-1c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h1c0.276,0,0.5,0.224,0.5,0.5 S22.777,73,22.5,73z">
                        </path>
                        <path fill="#fff"
                            d="M19.5,73h-2c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h2c0.276,0,0.5,0.224,0.5,0.5 S19.777,73,19.5,73z">
                        </path>
                        <path fill="#fff"
                            d="M25.5,75h-2c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h2c0.276,0,0.5,0.224,0.5,0.5 S25.776,75,25.5,75z">
                        </path>
                        <path fill="#fff"
                            d="M28.5,66c-0.177,0-0.823,0-1,0c-0.276,0-0.5,0.224-0.5,0.5c0,0.276,0.224,0.5,0.5,0.5 c0.177,0,0.823,0,1,0c0.276,0,0.5-0.224,0.5-0.5C29,66.224,28.776,66,28.5,66z">
                        </path>
                        <path fill="#fff"
                            d="M28.5,68c-0.177,0-4.823,0-5,0c-0.276,0-0.5,0.224-0.5,0.5c0,0.276,0.224,0.5,0.5,0.5 c0.177,0,4.823,0,5,0c0.276,0,0.5-0.224,0.5-0.5C29,68.224,28.776,68,28.5,68z">
                        </path>
                        <path fill="#fff"
                            d="M33.5,70c-0.177,0-2.823,0-3,0c-0.276,0-0.5,0.224-0.5,0.5c0,0.276,0.224,0.5,0.5,0.5 c0.177,0,2.823,0,3,0c0.276,0,0.5-0.224,0.5-0.5C34,70.224,33.776,70,33.5,70z">
                        </path>
                        <g>
                            <path fill="#fff"
                                d="M86.5,45h-10c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h10c0.276,0,0.5,0.224,0.5,0.5 S86.776,45,86.5,45z">
                            </path>
                            <path fill="#fff"
                                d="M90.5,45h-2c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h2c0.276,0,0.5,0.224,0.5,0.5 S90.776,45,90.5,45z">
                            </path>
                            <path fill="#fff"
                                d="M95.5,47h-10c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h10c0.276,0,0.5,0.224,0.5,0.5 S95.777,47,95.5,47z">
                            </path>
                            <path fill="#fff"
                                d="M83.5,47h-1c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h1c0.276,0,0.5,0.224,0.5,0.5 S83.776,47,83.5,47z">
                            </path>
                            <path fill="#fff"
                                d="M80.47,47H78.5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h1.97c0.276,0,0.5,0.224,0.5,0.5 S80.746,47,80.47,47z">
                            </path>
                            <path fill="#fff"
                                d="M89.5,43h-5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h5c0.276,0,0.5,0.224,0.5,0.5 S89.777,43,89.5,43z">
                            </path>
                            <path fill="#fff"
                                d="M86.5,49h-2c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h2c0.276,0,0.5,0.224,0.5,0.5 S86.776,49,86.5,49z">
                            </path>
                        </g>
                        <g>
                            <path fill="#472b29"
                                d="M37.375,74.3c-3.681,0-6.675-2.994-6.675-6.675v-29.25c0-3.681,2.994-6.675,6.675-6.675h29.25 c3.681,0,6.675,2.994,6.675,6.675v29.25c0,3.681-2.994,6.675-6.675,6.675H37.375z">
                            </path>
                            <path fill="#472b29"
                                d="M66.625,32.4c3.295,0,5.975,2.68,5.975,5.975v29.25c0,3.295-2.68,5.975-5.975,5.975h-29.25 c-3.295,0-5.975-2.68-5.975-5.975v-29.25c0-3.295,2.68-5.975,5.975-5.975H66.625 M66.625,31h-29.25 C33.319,31,30,34.319,30,38.375v29.25C30,71.681,33.319,75,37.375,75h29.25C70.681,75,74,71.681,74,67.625v-29.25 C74,34.319,70.681,31,66.625,31L66.625,31z">
                            </path>
                        </g>
                        <g>
                            <path fill="#ee3e54"
                                d="M68,45c0,0-7,0-8-8h-6v14.024V58l-0.05,3c-0.252,2.247-2.136,4-4.45,4c-2.485,0-4.5-2.015-4.5-4.5 s2.015-4.5,4.5-4.5c0.171,0,0.334,0.032,0.5,0.05v-6.025C49.833,50.017,49.669,50,49.5,50C43.701,50,39,54.701,39,60.5 C39,66.299,43.701,71,49.5,71c5.63,0,10.212-4.435,10.475-10H60V48.24c1.98,1.623,4.584,2.76,8,2.76C68,49,68,45,68,45z">
                            </path>
                        </g>
                        <g>
                            <path fill="#472b29"
                                d="M60,59c-0.138,0-0.25-0.112-0.25-0.25v-8.625c0-0.138,0.112-0.25,0.25-0.25s0.25,0.112,0.25,0.25 v8.625C60.25,58.888,60.138,59,60,59z">
                            </path>
                        </g>
                        <g>
                            <path fill="#472b29"
                                d="M49.5,71.25c-0.799,0-1.595-0.088-2.366-0.261c-0.135-0.03-0.22-0.164-0.189-0.299 c0.03-0.134,0.158-0.221,0.299-0.189c1.468,0.33,3.038,0.33,4.5,0.002c0.324-0.071,0.647-0.16,0.963-0.265 c0.398-0.132,0.788-0.288,1.157-0.463c3.438-1.624,5.683-4.991,5.861-8.787c0.007-0.134,0.116-0.238,0.25-0.238 c0.138,0,0.263,0.112,0.263,0.25c0,0.034-0.006,0.066-0.018,0.097c-0.216,3.946-2.563,7.439-6.143,9.13 c-0.388,0.185-0.796,0.348-1.215,0.486c-0.331,0.109-0.671,0.203-1.011,0.278C51.087,71.163,50.296,71.25,49.5,71.25z">
                            </path>
                        </g>
                        <g>
                            <path fill="#472b29"
                                d="M45.354,58.998c-0.032,0-0.065-0.006-0.098-0.02c-0.127-0.054-0.187-0.201-0.133-0.328 c0.746-1.762,2.464-2.9,4.377-2.9c0.085,0,0.168,0.007,0.25,0.017v-5.741c0-0.138,0.112-0.25,0.25-0.25s0.25,0.112,0.25,0.25v6.025 c0,0.071-0.03,0.139-0.083,0.187c-0.054,0.047-0.124,0.067-0.194,0.062l-0.154-0.02c-0.104-0.014-0.21-0.029-0.318-0.029 c-1.712,0-3.249,1.019-3.916,2.596C45.543,58.94,45.451,58.998,45.354,58.998z">
                            </path>
                        </g>
                        <g>
                            <path fill="#472b29"
                                d="M68,51.25c-1.45,0-2.831-0.205-4.106-0.609c-0.132-0.042-0.205-0.183-0.163-0.313 c0.042-0.132,0.187-0.206,0.313-0.163c1.153,0.365,2.399,0.562,3.706,0.584V45.24c-0.66-0.044-2.505-0.277-4.288-1.503 c-0.114-0.078-0.143-0.234-0.064-0.348c0.079-0.113,0.235-0.141,0.348-0.064c2.048,1.408,4.233,1.425,4.255,1.425 c0.138,0,0.25,0.112,0.25,0.25v6C68.25,51.138,68.138,51.25,68,51.25z">
                            </path>
                        </g>
                        <g>
                            <path fill="#fff"
                                d="M47.5,69.5c-6.065,0-11-4.935-11-11s4.935-11,11-11c0.12,0,0.237,0.008,0.355,0.016l0.168,0.011 c0.267,0.012,0.477,0.232,0.477,0.499v6.025c0,0.143-0.061,0.277-0.167,0.373c-0.092,0.082-0.211,0.127-0.333,0.127 c-0.019,0-0.216-0.023-0.216-0.023C47.69,54.515,47.597,54.5,47.5,54.5c-2.206,0-4,1.794-4,4s1.794,4,4,4 c2.026,0,3.726-1.528,3.952-3.556l0.048-2.953V35c0-0.276,0.224-0.5,0.5-0.5h6c0.252,0,0.465,0.188,0.496,0.438 c0.932,7.45,7.237,7.562,7.505,7.563c0.275,0.001,0.499,0.225,0.499,0.5v6c0,0.276-0.224,0.5-0.5,0.5 c-2.828,0-5.346-0.758-7.5-2.255V59c0,0.064-0.013,0.126-0.034,0.184C58.109,64.981,53.323,69.5,47.5,69.5z">
                            </path>
                            <path fill="#472b29"
                                d="M58,35c1,8,8,8,8,8s0,4,0,6c-3.416,0-6.02-1.136-8-2.76V59h-0.025C57.712,64.565,53.13,69,47.5,69 C41.701,69,37,64.299,37,58.5C37,52.701,41.701,48,47.5,48c0.169,0,0.333,0.017,0.5,0.025v6.025C47.834,54.032,47.671,54,47.5,54 c-2.485,0-4.5,2.015-4.5,4.5s2.015,4.5,4.5,4.5c2.314,0,4.198-1.753,4.45-4L52,56v-6.976V35H58 M58,34h-6c-0.552,0-1,0.448-1,1 v14.024V56l-0.049,2.933C50.732,60.685,49.257,62,47.5,62c-1.93,0-3.5-1.57-3.5-3.5s1.57-3.5,3.5-3.5 c0.075,0,0.147,0.013,0.219,0.023l0.169,0.022c0.037,0.004,0.074,0.006,0.111,0.006c0.245,0,0.482-0.09,0.667-0.255 C48.879,54.606,49,54.335,49,54.05v-6.025c0-0.534-0.419-0.974-0.953-0.999l-0.156-0.01C47.761,47.008,47.632,47,47.5,47 C41.159,47,36,52.159,36,58.5S41.159,70,47.5,70c6.069,0,11.06-4.695,11.461-10.729C58.986,59.185,59,59.094,59,59V48.161 C61.057,49.382,63.403,50,66,50c0.552,0,1-0.448,1-1v-6c0-0.552-0.448-1-1-1c-0.246-0.002-6.134-0.131-7.008-7.124 C58.93,34.376,58.504,34,58,34L58,34z">
                            </path>
                        </g>
                        <g>
                            <path fill="#83ccb7"
                                d="M66,43.892C66,43.352,66,43,66,43s-2.649-0.007-4.921-1.871C62.687,43.039,64.78,43.683,66,43.892z">
                            </path>
                            <path fill="#83ccb7"
                                d="M44.866,62.134C45.684,63.26,47.002,64,48.5,64c2.314,0,4.198-1.753,4.45-4L53,57v-6.976V36h5.181 c-0.067-0.324-0.136-0.645-0.181-1h-6v14.024V56l-0.05,3c-0.252,2.247-2.136,4-4.45,4C46.513,63,45.608,62.673,44.866,62.134z">
                            </path>
                            <path fill="#83ccb7"
                                d="M38,59.5c0-5.63,4.435-10.212,10-10.475v-1C47.833,48.017,47.669,48,47.5,48 C41.701,48,37,52.701,37,58.5c0,3.154,1.398,5.976,3.599,7.901C38.985,64.555,38,62.145,38,59.5z">
                            </path>
                        </g>
                        <g>
                            <path fill="#472b29"
                                d="M53,48.25c-0.138,0-0.25-0.112-0.25-0.25V36c0-0.138,0.112-0.25,0.25-0.25h5.181 c0.138,0,0.25,0.112,0.25,0.25s-0.112,0.25-0.25,0.25H53.25V48C53.25,48.138,53.138,48.25,53,48.25z">
                            </path>
                            <path fill="#472b29"
                                d="M53,57.25c-0.138,0-0.25-0.112-0.25-0.25v-6.976c0-0.138,0.112-0.25,0.25-0.25 s0.25,0.112,0.25,0.25V57C53.25,57.138,53.138,57.25,53,57.25z">
                            </path>
                            <path fill="#472b29"
                                d="M48.5,64.25c-0.138,0-0.25-0.112-0.25-0.25s0.112-0.25,0.25-0.25c2.154,0,3.96-1.624,4.201-3.777 l0.022-1.436c0.002-0.137,0.114-0.246,0.25-0.246c0.001,0,0.003,0,0.004,0c0.139,0.002,0.248,0.116,0.246,0.254l-0.024,1.459 C52.929,62.435,50.909,64.25,48.5,64.25z">
                            </path>
                            <path fill="#472b29"
                                d="M44.367,50.107c-0.097,0-0.189-0.057-0.229-0.151c-0.055-0.127,0.004-0.274,0.131-0.328 c1.181-0.505,2.432-0.792,3.72-0.853c0.138,0,0.254,0.101,0.262,0.238c0.006,0.138-0.101,0.255-0.238,0.262 c-1.228,0.058-2.421,0.331-3.546,0.812C44.434,50.101,44.4,50.107,44.367,50.107z">
                            </path>
                            <path fill="#472b29"
                                d="M38,59.75c-0.138,0-0.25-0.112-0.25-0.25c0-3.713,1.881-7.112,5.03-9.093 c0.115-0.07,0.271-0.039,0.345,0.079c0.073,0.116,0.038,0.271-0.079,0.345c-3.003,1.888-4.796,5.129-4.796,8.669 C38.25,59.638,38.138,59.75,38,59.75z">
                            </path>
                        </g>
                        <g>
                            <path fill="#fdfcef"
                                d="M81.5,69.5c0,0,1.567,0,3.5,0s3.5-1.567,3.5-3.5c0-1.781-1.335-3.234-3.055-3.455 C85.473,62.366,85.5,62.187,85.5,62c0-1.933-1.567-3.5-3.5-3.5c-1.032,0-1.95,0.455-2.59,1.165 c-0.384-1.808-1.987-3.165-3.91-3.165c-2.209,0-4,1.791-4,4c0,0.191,0.03,0.374,0.056,0.558C71.128,60.714,70.592,60.5,70,60.5 c-1.228,0-2.245,0.887-2.455,2.055C67.366,62.527,67.187,62.5,67,62.5c-1.933,0-3.5,1.567-3.5,3.5s1.567,3.5,3.5,3.5s7.5,0,7.5,0 V70h7V69.5z">
                            </path>
                            <path fill="#472b29"
                                d="M83.25,65C83.112,65,83,64.888,83,64.75c0-1.223,0.995-2.218,2.218-2.218 c0.034,0.009,0.737-0.001,1.244,0.136c0.133,0.036,0.212,0.173,0.176,0.306c-0.036,0.134-0.173,0.213-0.306,0.176 c-0.444-0.12-1.1-0.12-1.113-0.118c-0.948,0-1.719,0.771-1.719,1.718C83.5,64.888,83.388,65,83.25,65z">
                            </path>
                            <circle cx="76.5" cy="69.5" r=".5" fill="#472b29"></circle>
                            <path fill="#472b29"
                                d="M85,70h-3.5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5H85c1.654,0,3-1.346,3-3 c0-1.496-1.125-2.768-2.618-2.959c-0.134-0.018-0.255-0.088-0.336-0.196s-0.115-0.244-0.094-0.377C84.975,62.314,85,62.16,85,62 c0-1.654-1.346-3-3-3c-0.85,0-1.638,0.355-2.219,1c-0.125,0.139-0.321,0.198-0.5,0.148c-0.182-0.049-0.321-0.195-0.36-0.379 C78.58,58.165,77.141,57,75.5,57c-1.93,0-3.5,1.57-3.5,3.5c0,0.143,0.021,0.28,0.041,0.418c0.029,0.203-0.063,0.438-0.242,0.54 c-0.179,0.102-0.396,0.118-0.556-0.01C70.878,61.155,70.449,61,70,61c-0.966,0-1.792,0.691-1.963,1.644 c-0.048,0.267-0.296,0.446-0.569,0.405C67.314,63.025,67.16,63,67,63c-1.654,0-3,1.346-3,3s1.346,3,3,3h7.5 c0.276,0,0.5,0.224,0.5,0.5S74.776,70,74.5,70H67c-2.206,0-4-1.794-4-4s1.794-4,4-4c0.059,0,0.116,0.002,0.174,0.006 C67.588,60.82,68.711,60,70,60c0.349,0,0.689,0.061,1.011,0.18C71.176,57.847,73.126,56,75.5,56c1.831,0,3.466,1.127,4.153,2.774 C80.333,58.276,81.155,58,82,58c2.206,0,4,1.794,4,4c0,0.048-0.001,0.095-0.004,0.142C87.739,62.59,89,64.169,89,66 C89,68.206,87.206,70,85,70z">
                            </path>
                            <path fill="#472b29"
                                d="M79.5,69c-0.159,0-0.841,0-1,0c-0.276,0-0.5,0.224-0.5,0.5c0,0.276,0.224,0.5,0.5,0.5 c0.159,0,0.841,0,1,0c0.276,0,0.5-0.224,0.5-0.5C80,69.224,79.776,69,79.5,69z">
                            </path>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
        <div class="Footer-Center">

        </div>
        <div class="Footer-Right" width="">
            <div class="fb-page" data-href="https://www.facebook.com/HonkaiStarRail.VN" data-tabs="timeline"
                data-width="500" data-height="70" data-small-header="false" data-adapt-container-width="false"
                data-hide-cover="false" data-show-facepile="false">
                <blockquote cite="https://www.facebook.com/HonkaiStarRail.VN" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/HonkaiStarRail.VN">Wellcome Goc Truyen Tranh</a>
                </blockquote>
            </div>
        </div>
    </footer>


    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('js/utils.js')}}">
    </script>
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/slide.js')}}"></script>
    <script src="{{asset('js/filter-comic.js')}}"></script>
    <script src="{{asset('js/detail_chapter.js')}}"></script>
    <script src="{{asset('js/account.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const openModalBtn = document.getElementById('loggedOut');

            let modalDiv;

            openModalBtn.addEventListener('click', function() {

                modalDiv = document.createElement('div');
                modalDiv.innerHTML = `
        <div class="modal fade " id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đăng Nhập</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="col-12 Form-Auth" method="post" action="/login-user" id="formAuth">
                            <input type="hidden" name="_token" value="${csrfToken}">

                            <div class="Login-Form">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control no-outline" style="border-color:black;" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword5" class="form-label">Password</label>
                                        <input type="password" name="password" id="inputPassword5" class="form-control no-outline" style="border-color:black;" aria-describedby="passwordHelpBlock">
                                        <div id="passwordHelpBlock" class="form-text">
                                            Mật khẩu của bạn phải có độ dài từ 8 đến 12 ký tự, bao gồm cả chữ cái và số, không được chứa khoảng trắng, ký tự đặc biệt hoặc biểu tượng cảm xúc.
                                    </div>
                                </div>
                                <div class="mb-3 d-flex">
                                    <button id="btnLogin" type="submit" class="col-8 btn btn-primary">Đăng nhập</button>
                                    <button id="btnChangeFormSignup" type="button" class="btn btn-light btn-gg" style="flex:1; margin-left:10px; ">Đăng ký</button>
                                </div>
                            </div>
                            <div class="Signup-Form">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control no-outline" style="border-color:black;" id="emailSignUp" placeholder="name@example.com">
                                </div>
                                
                                <div class="mb-3 d-flex flex-column">
                                    <button id="btnSignup111" type="button" class="btn btn-light btn-gg col-12" style="flex:1;  ">Đăng ký</button>

                                    <a id="btnChangeFormLogin" class="no-outline p-3 text-center" style="cursor:pointer;">Đã có tài khoản</a>
                                </div>
                            </div>
                        </form>                  
                    </div>
                </div>
            </div>
        </div>
        `;
                document.body.appendChild(modalDiv);

                const dynamicModal = new bootstrap.Modal(document.getElementById('loginModal'));
                dynamicModal.show();


                let form_auth = document.getElementById('formAuth');
                let btn_form_signup = document.getElementById('btnChangeFormSignup');
                let btn_form_login = document.getElementById('btnChangeFormLogin');

                btn_form_signup.addEventListener('click', function() {

                    smoothScrollBy(form_auth, form_auth.clientWidth, 0, 500)


                })
                btn_form_login.addEventListener('click', function() {
                    smoothScrollBy(form_auth, 0, 0, 500)


                })


                document.getElementById('loginModal').addEventListener('hidden.bs.modal', function() {
                    modalDiv.remove();
                });


                let btnSignup = document.getElementById('btnSignup111');


                btnSignup.addEventListener('click', function() {
                    let emailSignUp = document.getElementById('emailSignUp');

                    fetch('/refresh-password', {
                            method: 'POST', // Phương thức HTTP
                            headers: {
                                'Content-Type': 'application/json', // Định dạng gửi đi
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute(
                                    'content') // CSRF token
                            },
                            body: JSON.stringify({
                                'email': emailSignUp.value,
                            }) // Chuyển dữ liệu thành JSON
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }
                            return response.json(); // Chuyển phản hồi thành JSON
                        })
                        .then(data => {
                            console.log(data); // Xử lý phản hồi
                            alert('Đăng ký thành công!');
                            // Thực hiện thêm hành động nếu cần
                        })
                })
            });
            openModalBtn.click();
        });
    </script>
</body>

</html>