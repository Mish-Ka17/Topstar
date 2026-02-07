@extends ('layouts.app')

@section('content')
<main>
  <div class="mt-6 mb-8"> <!-- class="flex text-gray-700 py-4"-->

 {{--   <div class="flex hidden sm:block w-1/2">
      @foreach ($articleMainPage->content as $index=>$block)
        @if ($block['type'] === 'image')
          <div class="aspect-4/3 mr-2">
            <img src="{{$block['src']}}" alt="" class="w-full h-full object-fit">
          </div>
        @endif
        @if ($block['type'] === 'paragraph')
          <p class="text-sm text-gray-500 indent-[1em] leading-relaxed text-center rounded-sm border border-t-0 border-r-0 border-l-0 border-indigo-400">{{$block['text']}}</p>
        @endif
      @endforeach
    </div> --}}

    <div class="justify-center gap-1">
      <p class="text-xl font-light text-gray-900 mb-2">Из последних публикаций</p>
      <div class="flex flex-wrap justify-center gap-4">
        @foreach ($articlesLatest as $article)
          @php
              $chapter=$article->category->chapter;
              $category=$article->category;
          @endphp
          @foreach ($article->content as $block)
              @if ($block['type'] === 'image')

            <div class="
              rounded-sm shadow-lg overflow-hidden transform transition
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
  </div>

  <h1 class="text-xl font-light text-gray-900">Лауреаты Нобелевской премии 2025 года</h1>

  <div class="flex flex-wrap justify-center my-1">
      @php
        $articles=$articlesPhysics;
        $title=$articles->first()->category->title;
      @endphp
      <x-nobel-item :$articles :$title/>

      @php
        $articles=$articlesChemistry;
        $title=$articles->first()->category->title;
      @endphp
      <x-nobel-item :$articles :$title/>

      @php
        $articles=$articlesMedicine;
        $title=$articles->first()->category->title;
      @endphp
      <x-nobel-item :$articles :$title/>

      @php
        $articles=$articlesPhysics;
        $title=$articles->first()->category->title;
      @endphp
      <x-nobel-item :$articles :$title/>

      @php
        $articles=$articlesChemistry;
        $title=$articles->first()->category->title;
      @endphp
      <x-nobel-item :$articles :$title/>

      @php
        $articles=$articlesMedicine;
        $title=$articles->first()->category->title;
      @endphp
      <x-nobel-item :$articles :$title/>
  </div>
</main>
@endsection
