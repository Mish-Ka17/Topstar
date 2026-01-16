{{-- <div>
  <form action="{{route('search')}}" method="GET" class="flex flex-row">
    @csrf
    <input type="text" name="search" value="" placeholder="Поиск" class="w-full p-2 border">

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      Найти
    </button>
  </form>
</div> --}}

{{--
<form action="{{ route('search') }}
  method="GET" class="relative w-full max-w-xs sm:max-w-[200px] mt-2 mr-10">

  <div>
  <!-- Иконка -->
      <span class="pointer-events-none absolute flex items-center text-gray-400">
        <!-- Heroicons: magnifying-glass -->
        <svg xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-4 w-4">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
        </svg>
    </span>
  </div>
  <div class="flex flex-row">
  <div>
      <!-- Input -->
      <input
          type="text"
          name="search"
          value=""
          placeholder="Поиск…"
          class="w-[170px] rounded-md border border-gray-300
                bg-white
                pl-9 pr-3 py-2
                text-sm text-gray-900 placeholder-gray-400
                focus:border-gray-600 focus:ring-1 focus:ring-gray-600 focus:outline-none
                transition"
      >
  </div>
  <div>
      <button
        type="submit"
        class="hidden sm:inline-flex rounded-md
               px-4 py-2 text-sm text-gray-800
               bg-blue-100 hover:bg-blue-400 hover:text-white cursor-pointer">
        Найти
      </button>
  </div>
</div>
</form>
--}}

<div class="relative">
    <!-- Кнопка поиска -->
    <button
        id="search-toggle" title="Поиск по сайту"
        class="flex h-10 w-10 ml-3 mt-6 mr-10 items-center justify-center rounded-md
               text-gray-600 hover:bg-gray-200
               focus:outline-none focus:ring-2 focus:ring-gray-400 cursor-pointer"
                aria-label="Открыть поиск"
    >
        <!-- Иконка лупы -->

        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none"
             viewBox="0 0 24 24"
             stroke-width="1.5"
             stroke="currentColor"
             class="h-7 w-7">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z"/>
        </svg>
    </button>

    <!-- Выпадающий поиск -->
    <form
        id="search-form"
        action="{{ route('search') }}"
        method="GET"
        class="absolute right-0 top-6 z-50
               hidden w-64 sm:w-70"
    >
        <input
            type="text"
            name="search"
            placeholder="Поиск по статьям…"
            class="w-40 rounded-md border border-gray-300
                   bg-white px-2 py-2 text-sm
                   shadow-lg
                   focus:border-gray-600 focus:ring-1 focus:ring-gray-600
                   focus:outline-none"
        >
        <button
            type="submit"
            class="hidden sm:inline-flex rounded-md
                  px-4 py-2 text-sm text-gray-800
                  bg-blue-100 hover:bg-blue-400 hover:text-white cursor-pointer">
            Найти
        </button>
    </form>
</div>

<script>
    const toggle = document.getElementById('search-toggle');
    const form = document.getElementById('search-form');
    const input = form.querySelector('input');

    toggle.addEventListener('click', () => {
        form.classList.toggle('hidden');
        if (!form.classList.contains('hidden')) {
            input.focus();
        }
    });

    // Закрытие по Esc
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            form.classList.add('hidden');
        }
    });

    // Закрытие по клику вне
    document.addEventListener('click', (e) => {
        if (!toggle.contains(e.target) && !form.contains(e.target)) {
            form.classList.add('hidden');
        }
    });
</script>


