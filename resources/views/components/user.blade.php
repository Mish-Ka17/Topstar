<div class="relative">
  <button
    id="user-toggle" title="Авторизация"
    class="shrink-0 h-8 w-8 flex justify-center rounded-md
            text-gray-800 hover:bg-gray-300 cursor-pointer"
    aria-label=""
  >
    <div class="self-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round"
        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
      </svg>
    </div>
  </button>

  @if(isset($user))
    <div class="-ml-13">
      <x-register :$user/> {{--<x-AuthManager.status :$user/>--}}
    </div>
  @else
    <div id="user-status" class="hidden -ml-14">
      <x-register/> {{--<x-AuthManager.status/>--}}
    </div>
  @endif

</div>

<script>
    let activeComponent = 'user';
    const user = document.getElementById('user-toggle');
    const status = document.getElementById('user-status');
    //let register=document.getElementById('register');
    // const input = form.querySelector('input');

    user.addEventListener('click', () => {
        status.classList.remove('hidden');console.log(activeComponent);
        //status.classList.add('block');
        // toggle.classList.add('hidden');
        // if (!form.classList.contains('hidden')) {
        //     input.focus();
        // }
    });

    //Закрытие по Esc
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (activeComponent = 'user')
              status.classList.add('hidden');
            //register.classList.add('hidden');
            // toggle.classList.remove('hidden');
            console.log(activeComponent);// toggle.classList.add('block');console.log(activeComponent);
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
