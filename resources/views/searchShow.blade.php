@extends ('layouts.app')

@section ('content')
    <section class="prose prose-lg max-w-none">
        <!-- <h1 class="text-sm sm:text-2xl font-bold text-gray-600 mb-3">Поиск по...</h1> -->
        @if($articles->count()==0)
          <p class="bg-gray-50 p-4 text-sm lg:text-2xl lg:bg-gray-300 text-gray-600 justify-center">
            По запросу <span class="text-blue-700">"{{$search}}"</span> в заголовках статей ничего не найдено
          </p>
        @else
        <p class="bg-gray-50 p-4 text-sm lg:text-2xl lg:bg-gray-300 text-gray-600 justify-center">
            По запросу <span class="text-blue-700">"{{$search}}"</span> найдено статей: <span class="text-blue-700">{{$articles->count()}}</span>
          </p>
        <article class="flex bg-grey-200 shadow-lg rounded-3xl p-2 sm:p-1 max-w-6xl mx-auto">
            <div class="justify-left w-3/5 gap-1 px-2">

                <div class="flex flex-wrap justify-left gap-4 px-2">
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
                            w-[100px] sm:w-[50px] md:w-[80px] lg:w-[100px]
                            h-[160px]
                            ">
                        <a href="{{route('article.show', [$chapter, $category, $article])}}">
                            <img src="{{$block['src']}}" alt="{{$block['caption']}}" class="w-full h-auto">
                            <p class="p-1 text-sx text-gray-700 italic text-xs text-center">{{ $block['caption']}}</p>
                        </a>
                        </div>
                            @break
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </article>
        @endif
   </section>
@endsection
