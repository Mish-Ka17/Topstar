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
<body class="min-h-screen flex flex-col bg-gray-200 text-center p-2">

  @if(isset($user))
    <x-header :$user/>
  @else
    <x-header/>
  @endif

  @if(session('error'))
  <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded mb-4">
      {{ session('error') }}
  </div>
  @endif

  <main class="flex-grow">
    @yield('content')
  </main>

  @if(isset($user))
    <x-footer :$user/>
  @else
    <x-footer/>
  @endif

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
