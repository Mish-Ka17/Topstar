@extends ('layouts.app')

@section ('content')

@if($articles->count()==0)
  <div class="flex items-center justify-center">
      <x-emptyPageShow/>
      <p class="text-sm lg:text-2xl text-gray-600 bg-gray-300 p-1">
        По запросу <span class="text-blue-700">"{{$search}}"</span> в заголовках статей ничего не найдено
      </p>
  </div>
@else
  <p class="bg-gray-300 p-2 text-md lg:text-2xl text-gray-600">
    По запросу <span class="text-blue-700">"{{$search}}"</span> найдено статей: <span class="text-blue-700">{{$articles->count()}}</span>
  </p>

              <div class="justify-left gap-1 px-2 mt-4">

                  <div class="flex flex-wrap justify-center gap-4">
                      @foreach ($articles as $article)
                        @php
                          $chapter=$article->category->chapter;
                          $category=$article->category;
                        @endphp
                          @foreach ($article->content as $block)
                              @if ($block['type'] === 'image')

                          <div class="mr-2
                              bg-grey rounded-sm shadow-lg overflow-hidden transform transition
                              hover:-translate-y-2 hover:shadow-2xl hover:rotate-0
                              w-[100px] h-[140px] lg:w-[110px] lg:h-[160px]
                            ">
                          <a href="{{route('article.show', [$chapter, $category, $article])}}">
                              <img src="{{$block['src']}}" alt="{{$block['caption']}}" class="w-[100px] h-[120px] lg:w-[110px] lg:h-[132px]">
                              <p class="p-1 text-sx text-gray-700 italic text-xs text-center">{{ $block['caption']}}</p>
                          </a>
                          </div>
                              @break
                              @endif
                          @endforeach
                      @endforeach
                  </div>
              </div>

          @endif

@endsection
