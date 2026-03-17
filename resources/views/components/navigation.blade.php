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
