@extends ('layouts.app')

@section ('content')
  <div class="flex flex-col justify-between sm:flex-row">
    <x-breadcrumbs />
    <div>
      <x-filtercountry :$countryselected :$countrySelectedTitle :$countries :$chapter :$category />
    </div>
  </div>
  <h1 class="text-xl sm:text-2xl font-bold text-gray-600 my-6">{{$category->title}}</h1>
  @if($articles->count()==0)
    <div class="flex items-center justify-center">
      <x-emptyPageShow/>
      <p class="bg-gray-50 p-2 text-sm lg:text-2xl lg:bg-gray-300 text-gray-600 justify-center">
        Раздел находится в стадии наполнения контентом
      </p>
    </div>
  @else
  <div class="justify-left gap-1 px-2 mb-8">
    <div class="flex flex-wrap justify-center gap-4">
        @foreach ($articles as $article)
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
