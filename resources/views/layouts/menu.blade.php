<    <div class="container bg-indigo-300"> <!--style="background: linear-gradient(145deg, #e6c79c 0%, #d5b383 40%, #c6a36d 80%, #b5935b 100%);">-->
        <menu>
        {{-- resources/views/components/menu.blade.php --}}
        <!-- Кнопка для мобилки -->
      <button id="menuBtn" class="md:hidden focus:outline-none">
        ☰
      </button>

      <!-- Меню -->
            <!-- <ul class="flex p-4 rounded-lg shadow-md space-x-14 text-4xl justify-center"> -->
            <ul class="hidden md:flex md:space-x-6 absolute md:static top-12 left-0 w-full md:w-auto bg-gray-800 md:bg-transparent flex-col md:flex-row">
                @foreach($menu as $chapter)
                    <li class="group relative border-b border-gray-100">
                        <button class="bg-orange-100 p-7 w-full rounded font-semibold text-gray-600 hover:text-indigo-600 hover:bg-gray-200">
                            {{ $chapter->title }}
                        </button>

                        @if($chapter->category->count())

                        <div class="absolute left-0 top-full w-[350px] bg-orange-100 text-gray-700 text-center
                            shadow-xl p-6 opacity-0 invisible border-1 border-gray-400
                            group-hover:opacity-100 group-hover:visible
                            transition duration-300">
                        <div class="grid grid-cols-3">

                                @php $i = 0; $j = 1; @endphp
                                @foreach($chapter->category as $category)

                                    @if ($i % 5 == 0)
                                     <div>
                                        <ul>
                                    @endif

                                    <li class="text-xl">
                                        <a href="{{route('category.show', [$chapter,$category])}}" class="block px-2 py-2 text-grey-700 hover:bg-indigo-50 hover:text-indigo-800 hover:underline">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                    @if ($j % 5 == 0)
                                         </ul>
                                      </div>
                                    @endif
                                @php $i++; $j++; @endphp
                                @endforeach

                        </div>
                        </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </menu>
    </div>
