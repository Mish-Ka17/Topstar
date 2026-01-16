@extends ('layouts.app')

@section ('content')
    <div class="flex justify-between">
      <x-breadcrumbs />
      <x-filtercountry :$countryselected :$countrySelectedTitle :$countries :$chapter :$category />
    </div>

    <section class="prose prose-lg max-w-none">
        <!--  -->
        <h1 class="text-sm sm:text-2xl font-bold text-gray-600 mb-3">{{$category->title}}</h1>
        <article class="flex bg-grey-200 shadow-lg rounded-3xl p-2 sm:p-1 max-w-6xl mx-auto">
            <!--Игроки -->
            <div class="justify-left w-3/5 gap-1 px-2">

                <div class="flex flex-wrap justify-left gap-4 px-2">
                    @foreach ($articles_players as $article)
                        @foreach ($article->content as $block)
                            @if ($block['type'] === 'image')

                        <div class="mr-2
                            bg-grey rounded-sm shadow-lg overflow-hidden transform transition
                            hover:-translate-y-2 hover:shadow-2xl hover:rotate-0
                            w-[100px] sm:w-[50px] md:w-[80px] lg:w-[100px]
                            h-[160px]
                            ">
                        <a href="{{route('article.show', [$chapter, $category, $article])}}">
                            <img src="{{$block['src']}}" alt="{{$block['caption']}}" class="w-auto h-auto">
                            <p class="p-1 text-sx text-gray-700 italic text-xs text-center">{{ $block['caption']}}</p>
                        </a>
                        </div>
                            @break
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
            <!--Команды -->
            <div class="justify-center w-2/5 gap-1 px-2">

                <div class="flex flex-wrap justify-left gap-4 px-2">
                    @foreach ($articles_teams as $article)
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
   </section>
@endsection
