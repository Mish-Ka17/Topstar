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
<body class="min-h-screen flex flex-col
            bg-gray-200
            text-center p-2">

<header class="sticky h-[120px] border-b border-gray-400 top-0 z-50 bg-gray-200 text-gray-700">

  <div class="flex flex-wrap gap-1 justify-center">
      @php
          $letters = ['А','Б','В','Г','Д','Е','Ж','З','И','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Э','Ю','Я'];
      @endphp
      @foreach($letters as $char)
          <a href="{{route('alphabet.index',['letter'=>$char])}}"
            class="px-1 text-xs text-gray-900 bg-gray-300
            hover:bg-gray-500 hover:text-white transition
            {{ request('letter') == $char ? 'bg-gray-500 text-white' : 'bg-gray-200' }}">
              {{ $char }}
          </a>
      @endforeach
  </div>

  <div class="flex h-[100px] sm:h-[110px] items-center justify-between">
    <div class="flex w-auto gap-4">
      <a href="{{route('home')}}">
        <div class="flex flex-col ml-7 mb-3 lg:mt-1">
          <div>
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
    </div>
    <div class="absolute left-25 lg:left-30 xl:left-45 top-12">
          @if(isset($user))
            <x-user :$user/>
          @else
            <x-user/>
          @endif
    </div>

    <div class="container relative w-auto mt-1">
      <nav class="ml-25">
          <!-- Кнопка для мобилки -->
        <button
            id="menuBtn"
            class="lg:hidden text-2xl focus:outline-none"
        >
            ☰
        </button>
          <!-- Основное меню -->
        <ul id="menu"
            class="hidden bg-gray-200 lg:flex justify-center h-screen lg:h-auto
                fixed lg:static top-33 right-8 w-[280px] py-2 px-2  md:top-30 md:right-60 sm:right-35 lg:py-0
                flex-col lg:flex-row z-50
                lg:gap-5 xl:gap-20"
        >
            @foreach($menu as $chapter)
                <li class="relative group text-left lg:text-center">
                  <!-- Кнопка раздела -->
                  <button
                    class="menuBtn lg:w-[90px] lg:h-[90px] text-xl py-1"
                    >
                  @switch($loop->iteration)
                    @case (1)
                    <img id="1" src="/storage/menu/science.webp" alt="science.webp" class="hidden lg:block w-full h-full object-cover">
                    <p class="lg:hidden">{{$chapter->title}}</p>
                    @break
                    @case (2)
                    <img id="2" src="/storage/menu/art.webp" alt="art.webp" class="hidden lg:block w-full h-full object-cover">
                    <p class="lg:hidden">{{$chapter->title}}</p>
                    @break
                    @case (3)
                    <img id='3' src="/storage/menu/culture.webp" alt="culture.webp" class="hidden lg:block w-full h-full object-cover">
                    <p class="lg:hidden">{{$chapter->title}}</p>
                    @break
                    @case (4)
                    <img src="/storage/menu/sports.webp" alt="sports.webp" class="hidden lg:block w-full h-full rounded-lg object-cover">
                    <p class="lg:hidden">{{$chapter->title}}</p>
                    @break
                    @case (5)
                    <img src="/storage/menu/society.webp" alt="society.webp" class="hidden lg:block w-full h-full object-cover">
                    <p class="lg:hidden">{{$chapter->title}}</p>
                    @break
                  @endswitch
                      <!-- {{ $chapter->title }} -->
                  </button>

                  @if($chapter->category->count())
                  <!-- Подменю -->
                  <ul
                    class="submenu hidden text-xl lg:text-lg lg:text-left group-hover:block
                    lg:absolute md:top-[90px] md:-right-[45px]
                    lg:shadow-lg
                    lg:min-w-[180px] rounded-sm"
                  >
                      @foreach($chapter->category as $category)
                        <li class="lg:border-b hover:bg-gray-100 leading-normal">
                          <a
                              href="{{ route('category.show', [$chapter, $category]) }}"
                              class="block mx-7 px-2 lg:mx-2 text-gray-800
                                  hover:text-gray-900"
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

    <!--модальное окно для требования авторизации (при добавлении персоны, например) -->
<div id="authModal"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">

        <h2 class="text-xl font-semibold text-gray-800">
            Требуется авторизация
        </h2>

        <p class="text-gray-600 mt-2">
            Для предложения персоны необходимо войти или зарегистрироваться
        </p>

        <div class="flex justify-center gap-1 mt-6">
            <button id="closeModal"
                    class="h-[23px] lg:h-[28px] mt-9 lg:mt-1 rounded-md px-2 text-xs lg:text-sm font-semibold text-gray-500 bg-indigo-100 hover:bg-indigo-300 hover:text-white cursor-pointer">
                Отмена
            </button>
            <div class="mt-1">
              <x-AuthManager.status/>
            </div>
            <!-- <a href="{{ route('login') }}"
               class="px-4 py-2 bg-indigo-700 text-white rounded-lg hover:bg-indigo-600">
                Войти
            </a> -->
        </div>
    </div>
</div>      <!--end модальное окно для требования авторизации (при добавлении персоны, например) -->

<main class="flex-grow">
  @yield('content')
</main>

<footer class="h-[110px] sm:h-[140px] text-gray-700 border-t border-gray-400 top-0 bg-gray-200">
  <div class="flex flex-col">

    <div class="w-auto hidden sm:flex justify-between"> <!--desktop footer -->
      <div class="flex">

        <div class="flex flex-col">
              <div>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 68 68"
                  class="w-25 h-25 text-red-800 hover:text-red-600"
                  aria-label="PERSONA logo"
                  role="img"
                  >
                  <!-- круг -->
                  <circle cx="45" cy="45" r="33"
                          fill="none"
                          stroke="currentColor"
                          stroke-width="2"/>

                  <!-- точка -->
                  <circle cx="45" cy="45" r="2"
                          fill="currentColor"/>
                </svg>
              </div>
              <div class="ml-6">
                  <span class="font-heading sm:text-xl tracking-wide text-gray-900 hover:text-red-600">
                  PERSONA
                  </span>
              </div>
            </div>
            <div class="w-[150px] mt-4 ml-2 px-2 text-left leading-none border-l">
                <span class="font-heading text-md tracking-wide">
                    Личности, изменившие время,
                    и лица среди нас
                </span>
            </div>
      </div>

        <div class="w-[250px] text-md lg:text-xl leading-[20px] justify-center mt-4 ml-10">
          <a href="#" class="hover:bg-indigo-400 hover:text-white">&nbsp;О проекте&nbsp;</a>

          <div>
            @if(isset($user))
            <div class="px-2 py-2 rounded">
              <a href="{{route('form.suggestion')}}" class="hover:text-white">Написать нам</a>
            </div>
            @else
            <button
              data-requires-auth
              class="px-2 py-2 rounded cursor-pointer hover:text-white">
              Предложить персону
            </button>       <!--<a href="{{route('form.suggestion')}}">Написать нам</a>-->
            @endif
          </div>
          <div>
            <a href="#" class="hover:text-white">Контакты</a>
          </div>
        </div>
        <div class="w-[300px] text-md lg:text-xl justify-center mt-4 ml-8">
            <a href="#">Главная</a>
            <br><a href="#">Последние публикации</a>
            <br><a href="#">Лауреаты 2025 г.</a>
        </div>
    </div>

    <div class="text-left text-xs ml-10 hidden sm:flex">
      &copy;2026
    </div>    <!--end of desktop footer -->

    <div class="flex w-auto sm:hidden">    <!--mobile footer -->

        <div class="flex flex-col ml-6 mt-4">
          <div>
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
        <div class="w-[100px] mt-4 ml-1 px-1 text-xs text-left leading-none border-l">
            <span class="font-heading text-md tracking-wide">
                Личности, изменившие время,
                и лица среди нас
            </span>
        </div>

        <div class="w-[250px] sm:w-[350px] leading-[20px] sm:leading-[25px] text-md lg:text-xl justify-center mt-2 sm:mt-4 sm:ml-0">
          <a href="#">О проекте</a>
          <div>
              @if(isset($user))
                <a href="{{route('form.suggestion')}}">Написать нам</a>
              @else
              <button
                      data-requires-auth
                      class="px-2 rounded cursor-pointer">
                      Предложить персону
              </button>       <!--<a href="{{route('form.suggestion')}}">Написать нам</a>-->
              @endif
          </div>
          <div>
            <a href="#">Контакты</a>
          </div>
        </div>
    </div>
    <div class="text-left text-xs ml-7 sm:hidden">
      &copy;2026
    </div>      <!--end of mobile footer -->

    @stack('modals')
</footer>

<script>
    menu=document.getElementById('menu');

    document.getElementById('menuBtn').addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });

    //  Закрытие главного меню по клику вне пунктов меню
        document.addEventListener('click', (e) => {
        if (menu.contains(e.target)) {
            menu.classList.add('hidden');

         }
        });

    const buttons = document.querySelectorAll('.menuBtn');

    buttons.forEach(button => {
      button.addEventListener('click', (e) => {
        e.stopPropagation();

        const submenu = button.nextElementSibling;

        // закрываем все остальные подменю
        document.querySelectorAll('.submenu').forEach(menu => {
          if (menu !== submenu) {
            menu.classList.add('hidden');
          }

        });
        // прокрутка к открытому пункту (не работает пока)
        submenu.scrollIntoView({ behavior: 'smooth', block: 'start' });

        // переключаем текущее
        submenu.classList.toggle('hidden');
        submenu.classList.remove('absolute');

        // Закрытие по клику вне
        document.addEventListener('click', (e) => {
        if (!submenu.contains(e.target)) {
            submenu.classList.add('hidden');

         }
        });


      });
    });

    buttons.forEach(button => {
        const imgPath = button.querySelector('img').getAttribute('src');
        const ul = button.nextElementSibling;

        switch(imgPath) {
           case '/storage/menu/science.webp':
              ul.classList.add('md:bg-linear-to-br','from-rose-400','via-rose-200','to-rose-100');//'bg-[length:200%_200%]','animate-pulse'
              break;
           case '/storage/menu/art.webp':
              ul.classList.add('md:bg-linear-to-br','from-blue-400','via-blue-200','to-blue-100');
              break;
           case '/storage/menu/culture.webp':
              ul.classList.add('md:bg-linear-to-br','from-violet-400','via-violet-200','to-violet-100');
              break;
           case '/storage/menu/sports.webp':
              ul.classList.add('md:bg-linear-to-br','from-blue-300','via-blue-200','to-blue-100')
              break;
            case '/storage/menu/society.webp':
              ul.classList.add('md:bg-linear-to-br','from-green-400','via-green-200','to-green-100')
              break;
          }
    });

/** работа с  модальным окном для требования авторизации (при добавлении персоны, например) */
document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('authModal');
    const closeBtn = document.getElementById('closeModal');

    document.querySelectorAll('[data-requires-auth]').forEach(btn => {
        btn.addEventListener('click', function (e) {

            if (!window.isAuthenticated) {
                e.preventDefault();
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });

});

</script>

</body>
</html>
