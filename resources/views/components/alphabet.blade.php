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
