@extends ('layouts.app')

@section('content')
<main>

{{-- <div class="flex justify-between">
      <x-breadcrumbs />
      <!-- <x-filtercountry :$countryselected :$countrySelectedTitle :$countries :$chapter :$category /> -->
    </div>--}}

    <section class="prose prose-lg max-w-none">
        <!--  -->

        <article class="bg-grey-200 shadow-lg rounded-3xl p-2 sm:p-1 max-w-8xl mx-auto">
            <h1 class="text-sm sm:text-2xl font-bold text-gray-600 mb-3">Лауреаты Нобелевской премии 2025 года</h1>

            <div class="flex justify-between my-8">
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

            <div class="flex justify-between my-8">
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
            <!-- -->

{{--                <div class="justify-left w-auto gap-1 px-2">
                    <h3 class="text-sm sm:text-2xl font-bold text-gray-600 mb-3">Химия</h3>
                    <div class="flex flex-wrap justify-center gap-4 px-2">
                        @foreach ($articlesChemistry as $article)

                            @php
                                $chapter=$article->category->chapter;
                                $category=$article->category;
                            @endphp

                            @foreach ($article->content as $block)
                                @if ($block['type'] === 'image')

                            <div class="mx-2
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

                <div class="justify-left w-auto gap-1 px-2">
                    <h3 class="text-sm sm:text-2xl font-bold text-gray-600 mb-3">Физика</h3>
                    <div class="flex flex-wrap justify-center gap-4 px-2">
                        @foreach ($articlesFisics as $article)

                            @php
                                $chapter=$article->category->chapter;
                                $category=$article->category;
                            @endphp

                            @foreach ($article->content as $block)
                                @if ($block['type'] === 'image')

                            <div class="mx-2
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
          </div>

          <div class="flex">
            <div class="justify-left w-auto gap-1 px-2">
                    <h3 class="text-sm sm:text-2xl font-bold text-gray-600 mb-3">Физика</h3>
                    <div class="flex flex-wrap justify-center gap-4 px-2">
                        @foreach ($articlesFisics as $article)

                            @php
                                $chapter=$article->category->chapter;
                                $category=$article->category;
                            @endphp

                            @foreach ($article->content as $block)
                                @if ($block['type'] === 'image')

                            <div class="mx-2
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

                <div class="justify-left w-auto gap-1 px-2">
                    <h3 class="text-sm sm:text-2xl font-bold text-gray-600 mb-3">Физика</h3>
                    <div class="flex flex-wrap justify-center gap-4 px-2">
                        @foreach ($articlesFisics as $article)

                            @php
                                $chapter=$article->category->chapter;
                                $category=$article->category;
                            @endphp

                            @foreach ($article->content as $block)
                                @if ($block['type'] === 'image')

                            <div class="mx-2
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

                  <div class="justify-left w-auto gap-1 px-2">
                    <h3 class="text-sm sm:text-2xl font-bold text-gray-600 mb-3">Физика</h3>
                    <div class="flex flex-wrap justify-center gap-4 px-2">
                        @foreach ($articlesFisics as $article)

                            @php
                                $chapter=$article->category->chapter;
                                $category=$article->category;
                            @endphp

                            @foreach ($article->content as $block)
                                @if ($block['type'] === 'image')

                            <div class="mx-2
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
          </div> --}}


        </article>
   </section>
</main>
@endsection
