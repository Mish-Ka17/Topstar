@extends ('layouts.app')

@section ('content')
  @if(empty($arr_articles))
      <div class="flex items-center justify-center">
          <x-emptyPageShow/>
          <p class="text-md lg:text-2xl text-gray-600 bg-gray-300 p-1">
            По запросу<span class="text-blue-700">"{{$search}}"</span>&nbsp;ничего не найдено
          </p>
      </div>
    @else
      <article class="bg-gray-50 shadow-lg rounded-xl p-2 sm:p-6 my-10 mx-auto max-w-6xl justify-center">
        <p class="text-xl text-gray-600 justify-center my-4">
            Запрос: буква <span class="text-blue-700">"{{$search}}"</span>:
        </p>
        <div class="grid gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 mt-2 justify-items-center max-w-6xl mx-auto">

          @foreach ($arr_articles as $index=>$items)   {{-- $index это title категории; $items  - массив статей одной категории ($article)--}}
              @php
                $chapter=$items[0]->category->chapter;
                $category=$items[0]->category;
                $category_title=$items[0]->category->title;
              @endphp
              <div class="flex flex-col w-[230px]">
                <div class="text-lg underline text-left">
                  <a href="{{ route('category.show', [$chapter, $category]) }}"
                     class="block px-2 py-1 text-gray-800
                     hover:bg-indigo-100"
                  >
                    {{ $category_title }}
                  </a>
                </div>
                @foreach($items as $article)
                  @php
                    $chapter=$article->category->chapter;
                    $category=$article->category;
                  @endphp
                  <div class="text-lg text-gray-800 text-left">
                  <a href="{{route('article.show', [$chapter, $category, $article])}}" class="block px-2 py-1
                     hover:bg-indigo-100">
                    {{$article->title_reversed}}
                  </a>
                  </div>
                @endforeach
              </div>
          @endforeach
        </div>
      </article>
    @endif
@endsection
