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
                    class="h-[23px] lg:h-[28px] mt-9 lg:mt-1 rounded-md px-2 text-xs lg:text-sm text-gray-800 bg-indigo-200 hover:bg-indigo-200 hover:text-white cursor-pointer">
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

<footer class="h-[110px] sm:h-[140px] text-gray-700 border-t border-gray-400 top-0 bg-gray-200">
  <div class="flex flex-col">

    <div class="w-auto hidden sm:flex justify-between"> <!--desktop footer -->
      <div class="flex">

        <div class="flex flex-col">
          <div>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 68 68"
              class="w-25 h-25 text-red-800"
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
              <span class="font-heading sm:text-xl tracking-wide text-gray-900">
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

        <div class="w-[250px] bg-linear-to-t from-gray-200 to-gray-100 text-md lg:text-xl leading-[20px] justify-center mt-4 ml-10 rounded-xl">
          <div class="py-1 rounded cursor-pointer hover:bg-gray-300 hover:text-white">
            <a href="{{route('about')}}">О проекте</a>
          </div>
          <div>
            @if(isset($user))
            <div class="hover:bg-gray-300 hover:text-white py-1 rounded cursor-pointer">
              <a href="{{route('form.suggestion')}}">Предложить персону</a>
            </div>
            @else
            <button
              data-requires-auth
              class="py-1 px-6 rounded cursor-pointer hover:bg-gray-300 hover:text-white">
              Предложить персону
            </button>       <!--<a href="{{route('form.suggestion')}}">Написать нам</a>-->
            @endif
          </div>
          <div class="py-1 rounded cursor-pointer hover:bg-gray-300 hover:text-white">
            <a href="#" class="hover:text-white">Контакты</a>
          </div>
        </div>
        <div class="w-[300px] text-md lg:text-xl justify-center mt-4 ml-8 bg-linear-to-t from-gray-200 to-gray-100 text-md leading-[20px] rounded-xl">
            <div class="py-1 rounded cursor-pointer hover:bg-gray-300 hover:text-white">
              <a href="{{route('home')}}">Главная</a>
            </div>
            <div class="hover:bg-gray-300 hover:text-white py-1 rounded cursor-pointer">
              <a href="#">Последние публикации</a>
            </div>
            <div class="hover:bg-gray-300 hover:text-white py-1 rounded cursor-pointer">
              <a href="#">Лауреаты Нобелевской премии 2025 г.</a>
            </div>
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
                <a href="{{route('form.suggestion')}}">Предложить персону</a>
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
