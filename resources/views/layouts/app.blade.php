<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Stars</title>
</head>
<body class="bg-gray-300 text-center p-10">

<header>
    <div class="bg-indigo-300 flex">
        <div class="container mx-auto px-4 relative w-auto h-25">
            <nav>
                <!-- Кнопка для мобилки -->
                <button
                    id="menuBtn"
                    class="md:hidden text-2xl p-2 focus:outline-none"
                >
                    ☰
                </button>

                <!-- Основное меню -->
                <ul
                    id="menu"
                    class="hidden md:flex md:space-x-2 justify-center
                        absolute md:static top-12 left-0
                        w-full md:w-auto
                        bg-gray-800 md:bg-transparent
                        flex-col md:flex-row
                        z-50"
                >
                    @foreach($menu as $chapter)
                        <li class="relative group border-b md:border-none">

                            <!-- Кнопка раздела -->
                            <button
                                class="w-full md:w-auto h-25
                                    bg-orange-100 p-4 md:p-3
                                    font-semibold text-2xl text-gray-600
                                    hover:text-indigo-600 hover:bg-gray-200"
                            >
                                {{ $chapter->title }}
                            </button>

                            @if($chapter->category->count())
                            <!-- Подменю -->
                                <ul
                                    class="hidden group-hover:block
                                        md:absolute md:left-0
                                        md:bg-white md:shadow-lg
                                        md:min-w-[200px]"
                                        >
                                        <!-- md:mt-2 -->
                                        <li class="h-2 bg-gray-300" ></li>
                                    @foreach($chapter->category as $category)
                                        <li>
                                            <a
                                                href="{{ route('category.show', [$chapter, $category]) }}"
                                                class="block px-4 py-2 text-gray-700
                                                    hover:bg-indigo-50 hover:text-indigo-800"
                                            >
                                                {{ $category->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>

        {{--
        @if(isset($user))
            <x-register :$user />
        @else
            <x-register />
        @endif
        --}}
        @if(isset($user))
            <x-AuthManager.status :$user/>
        @else
            <x-AuthManager.status/>
        @endif
    </div>
</header>

    @yield('content')

<footer class="footer">
    <div class="container bg-indigo-300 text-center p-10">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="footer__title">
                    <a href="#" class="footer-link">О проекте</a>
                </div>
                <div class="row white-link">
                    <div class="col-6">
                        <a href="#">Главная</a>
                        <br><a href="#">Статьи</a>
                        <br><a href="#">Обсуждения</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="footer__title"><a href="#" class="footer-link">Контакты</a></div>
                Написать нам
            </div>
        </div>
    </div>

    @stack('modals')
</footer>

<script>
    document.getElementById('menuBtn').addEventListener('click', () => {
        document.getElementById('menu').classList.toggle('hidden');
    });
</script>


</body>
</html>
