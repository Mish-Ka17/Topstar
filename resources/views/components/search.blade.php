<div class="relative flex items-center grow-1 justify-end mr-2">
    <button
          id="search-toggle" title="Поиск по сайту"
          class="shrink-0 h-10 w-10 flex justify-center items-center rounded-md
                  text-gray-600 hover:bg-gray-200 cursor-pointer"
          aria-label="Открыть поиск"
      >
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
    <form
        id="search-form"
        action="{{ route('search') }}"
        method="GET"
        class="flex hidden grow-1"
    >
        <input
            type="text"
            name="search"
            placeholder="Поиск по статьям…"
            class="w-[100%] mr-1 rounded-md border border-gray-100
                   bg-white px-2 py-2 text-sm
                   shadow-lg focus:border-gray-600 focus:ring-1 focus:ring-gray-600 focus:outline-none"
        >
        <button
            id="search-button" title="Поиск по сайту"
            class="shrink-0 h-10 w-10 flex justify-center items-center rounded-md
                    text-gray-600 hover:bg-gray-200 cursor-pointer"
            aria-label="Открыть поиск"
        >
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
    </form>

</div>

<script>
    const toggle = document.getElementById('search-toggle');
    const form = document.getElementById('search-form');
    const input = form.querySelector('input');

    toggle.addEventListener('click', () => {
        form.classList.toggle('hidden');
        toggle.classList.add('hidden');
        if (!form.classList.contains('hidden')) {
            input.focus();
        }
    });

    // Закрытие по Esc
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            form.classList.add('hidden');
            toggle.classList.remove('hidden');
            toggle.classList.add('block');
        }
    });

    // Закрытие по клику вне
    document.addEventListener('click', (e) => {
        if (!toggle.contains(e.target) && !form.contains(e.target)) {
            form.classList.add('hidden');
            toggle.classList.remove('hidden');
            toggle.classList.add('block');
        }
    });
</script>
