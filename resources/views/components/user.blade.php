<div class="relative items-center grow-1 justify-end mr-2">
  <button
    id="user-toggle"
    class="shrink-0 h-10 w-10 flex justify-center items-center rounded-md
            text-gray-600 hover:bg-gray-200 cursor-pointer"
    aria-label=""
  >
    <div class="flex self-end">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke-width="1.5" stroke="currentColor" class="size-6 mt-2">
        <path stroke-linecap="round" stroke-linejoin="round"
        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
      </svg>
    </div>
  </button>

  @if(isset($user))
      <x-AuthManager.status :$user/>
  @else
    <dv id="user-status" class="hidden">
      <x-AuthManager.status/>
    </dv>
  @endif

</div>

<script>
    const user = document.getElementById('user-toggle');
    const status = document.getElementById('user-status');
    // const input = form.querySelector('input');

    user.addEventListener('click', () => {
        status.classList.toggle('hidden');
        // toggle.classList.add('hidden');
        // if (!form.classList.contains('hidden')) {
        //     input.focus();
        // }
    });

    //Закрытие по Esc
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            status.classList.add('hidden');
            // toggle.classList.remove('hidden');
            // toggle.classList.add('block');
        }
    });

    // Закрытие по клику вне
    document.addEventListener('click', (e) => {
         if (!user.contains(e.target) && !status.contains(e.target)) {
            status.classList.add('hidden');
            // toggle.classList.remove('hidden');
            // toggle.classList.add('block');
         }
    });
</script>
