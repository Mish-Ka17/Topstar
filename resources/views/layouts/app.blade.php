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
<body class="bg-linear-to-br
            from-indigo-300
            via-gray-300
            to-indigo-300
            text-center p-2">

<header class="sticky h-[120px] top-0 z-50 bg-linear-to-t from-gray-300 to-indigo-300 text-gray-700">

  <div class="flex flex-wrap gap-1 justify-center">
      @php
          $letters = ['А','Б','В','Г','Д','Е','Ж','З','И','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Э','Ю','Я'];
      @endphp
      @foreach($letters as $char)
          <a href="{{route('alphabet.index',['letter'=>$char])}}"
            class="px-1 text-xs
            hover:bg-indigo-400 hover:text-white transition
            {{ request('letter') == $char ? 'bg-indigo-600 text-white' : 'bg-indigo-200' }}">
              {{ $char }}
          </a>
      @endforeach
  </div>

  <div class="flex h-[100px] sm:h-[110px] items-center justify-between">
    <div class="flex w-auto gap-4">
      <a href="{{route('home')}}">
        <div class="flex flex-col ml-7 mb-3 lg:mt-1">
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
            class="hidden lg:flex justify-center h-screen lg:h-auto
                fixed lg:static top-33 right-8 w-[280px] py-2 px-2  md:top-30 md:right-60 sm:right-35 lg:py-0
                bg-gray-300 lg:bg-linear-to-t from-gray-300 to-indigo-300
                flex-col lg:flex-row
                z-50
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
                        <li class="lg:border-b hover:bg-indigo-100 leading-normal">
                          <a
                              href="{{ route('category.show', [$chapter, $category]) }}"
                              class="block mx-7 px-2 lg:mx-2 text-gray-900
                                  hover:text-indigo-800"
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
    <div class="bg-indigo-200 text-center p-10">
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
                <div class="footer__title"><a href="#" class=" bg-footer-link">Контакты</a></div>
                Написать нам
            </div>
        </div>
    </div>

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
</script>

</body>
</html>
