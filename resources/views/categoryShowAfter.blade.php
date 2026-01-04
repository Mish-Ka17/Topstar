@extends ('layouts.app')

@section ('content')
    <x-breadcrumbs />
    <section class="prose prose-lg max-w-none">
        <h1 class="text-sm sm:text-2xl font-bold text-gray-600 mb-3">Футболисты и клубы</h1>
        <!-- <p class="text-gray-500 italic">Автор: В. Лесной, октябрь 2025</p> -->

        <!--Фильтр  -->
        <div class="p-4 bg-gray-100 rounded-lg shadow mb-4">
            <form method="POST" action="{{route('articles.index',[$chapter,$category])}}" class="flex items-center gap-4">
            <div>
            <label class="block text-sm font-medium mb-1">Страна</label>
            <select name="country" class="p-2 border rounded">
                <option value="">Все</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" @selected(request('country') === $country)>
                        {{ $country->title }}
                    </option>
                @endforeach
            </select>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Применить
            </button>
            </form>
        </div>
        <!--  -->

        <article class="flex bg-grey-200 shadow-lg rounded-3xl p-2 sm:p-10 max-w-6xl mx-auto">

            <!--Игроки -->
            <div class="justify-left w-3/5 gap-1 px-2">
                <p class="mb-3 text-gray-500 italic">Игроки</p>
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
            <!--Команды -->
            <div class="justify-center w-2/5 gap-1 px-2">
                <p class="mb-3 text-gray-500 italic">Клубы</p>
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
