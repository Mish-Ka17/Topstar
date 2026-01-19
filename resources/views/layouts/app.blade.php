<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/svg+xml" href="/storage/logo/favicon.svg">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Stars</title>
</head>
<body class="bg-gradient-to-br
            from-indigo-300
            via-gray-300
            to-indigo-300 text-center p-6">

<header class="sticky h-[120px] top-0 z-50 bg-gradient-to-t from-gray-300 to-indigo-300 text-gray-700">
    <div class="flex h-[120px] items-center justify-between">
          <div class="flex w-46 gap-4">
              <a href="{{route('home')}}">
                <div class="flex flex-col ml-7 mt-1">
                    <div>
                        <!-- <img src="/storage/logo/logo-new.webp" alt="logo.webp" class="w-full h-full rounded-2xl overflow-hidden shadow-sm object-cover" > -->
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 40 40"
                        class="w-10 h-10 text-red-800 hover:text-red-600"
                        aria-label="PERSONA logo"
                        role="img"
                        >
                        <!-- круг -->
                        <circle cx="25" cy="25" r="22"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"/>

                        <!-- точка -->
                        <circle cx="25" cy="25" r="2"
                                fill="currentColor"/>
                        </svg>
                    </div>

                    <div>
                        <span class="font-heading text-xs sm:text-sm tracking-wide text-gray-900 hover:text-red-600">
                        PERSONA
                        </span>
                    </div>
                </div>
              </a>
              @if(isset($user))
                <div class="self-end">
                  <x-AuthManager.status :$user/>
                </div>
              @endif

          </div>

          <div class="container relative w-auto">

            <nav>
                <!-- Кнопка для мобилки -->
                <button
                    id="menuBtn"
                    class="lg:hidden text-2xl p-2 focus:outline-none"
                >
                    ☰
                </button>

                <!-- Основное меню -->
                <ul
                    id="menu"
                    class="lg:flex justify-center
                        lg:h-[90px]
                        absolute lg:static top-12 left-0
                        w-full lg:w-auto
                        bg-gray-800 lg:bg-transparent
                        flex-col lg:flex-row
                        z-50
                        lg:gap-20"
                >
                    @foreach($menu as $chapter)
                        <li class="relative group border-b md:border-none">

                            <!-- Кнопка раздела -->
                            <button
                              class="w-[90px] h-[90px] rounded-2xl overflow-hidden shadow-sm"
                              >
                              @switch($loop->iteration)
                                @case (1)
                                <img src="/storage/menu/science.webp" alt="science.webp" class="w-full h-full object-cover">
                                @break
                                @case (2)
                                <img src="/storage/menu/art.webp" alt="art.webp" class="w-full h-full object-cover">
                                @break
                                @case (3)
                                <img src="/storage/menu/culture.webp" alt="culture.webp" class="w-full h-full object-cover">
                                @break
                                @case (4)
                                <img src="/storage/menu/sports.webp" alt="sports.webp" class="w-full h-full object-cover">
                                @break
                                @case (5)
                                <img src="/storage/menu/society.webp" alt="society.webp" class="w-full h-full object-cover">
                                @break
                              @endswitch
                                <!-- {{ $chapter->title }} -->
                            </button>

                            @if($chapter->category->count())
                            <!-- Подменю -->
                                <ul
                                  class="hidden group-hover:block
                                    md:absolute md:top-[90px] md:-right-[30px]
                                    md:bg-gray-100 md:shadow-lg
                                    md:min-w-[150px]"
                                >
                                        <!-- md:mt-2 -->
                                    @foreach($chapter->category as $category)
                                        <li class="border-b">
                                            <a
                                                href="{{ route('category.show', [$chapter, $category]) }}"
                                                class="block px-2 py-1 text-gray-700
                                                    hover:bg-indigo-200 hover:text-indigo-800"
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

          <div class="flex w-46">
              <x-search/>
          </div>
    </div>
</header>

<div class="min-h-[400px]">
  @yield('content')
</div>


<footer class="footer">
    <div class="container bg-indigo-200 text-center p-10">
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
