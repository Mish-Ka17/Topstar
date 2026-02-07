<div class="w-full sm:w-1/2 lg:w-1/3 mt-4 px-2">
    <h2 class="text-xl font-light text-gray-500 mb-3">{{$title}}</h2>
    <div class="flex flex-wrap justify-center">
        @foreach ($articles as $article)

            @php
                $chapter=$article->category->chapter;
                $category=$article->category;
                $remarks=$article->remarks;
            @endphp

            @foreach ($article->content as $block)
                @if ($block['type'] === 'image')

                <div class="mx-2
                    bg-grey rounded-sm shadow-lg overflow-hidden transform transition
                    hover:-translate-y-2 hover:shadow-2xl hover:rotate-0
                    w-[100px] h-[140px] lg:w-[110px] lg:h-[160px]
                ">
                <a href="{{route('article.show', [$chapter, $category, $article])}}">
                    <img src="{{$block['src']}}" alt="{{$block['caption']}}" class="w-[100px] h-[120px] lg:w-[110px] lg:h-[132px]">
                    <p class="p-1 text-gray-700 italic text-xs text-center">{{ $block['caption']}}</p>
                </a>
                </div>
                @break
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="bg-gray-300 text-sm text-gray-800 italic text-center p-1 my-2">
      {{$remarks}}
    </div>
</div>
