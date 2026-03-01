@extends ('layouts.app')

@section('content')
<div class="mt-1 mb-8">

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

    <x-about-project :$aboutProject/>

      <p class="text-xl font-light text-gray-900 my-4">Из последних публикаций</p>
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

  <h1 class="text-xl font-light text-gray-900 mt-6">Лауреаты Нобелевской премии 2025 года</h1>

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
</div>

<script>

  const contentAboutProject=document.getElementById('contentAboutProject');
  const chevronDown=document.getElementById('chevronDown');
  const ellipsis=document.getElementById('ellipsis');

  document.getElementById('aboutProject').addEventListener('click', ()=>{
    contentAboutProject.classList.toggle('hidden');
    chevronDown.classList.add('hidden');
    ellipsis.classList.toggle('hidden');
    document.getElementById('oproject').classList.remove('bg-gray-300');
    document.getElementById('oproject').classList.add('bg-gray-200');
  });

  //закрытие по клику вне
  document.addEventListener('click', (e)=>{
      if (!document.getElementById('aboutProject').contains(e.target)) {
            contentAboutProject.classList.add('hidden');
            ellipsis.classList.add('hidden');
            chevronDown.classList.remove('hidden');
            document.getElementById('oproject').classList.add('bg-gray-300');
        };
      if (document.getElementById('contentAboutProject').contains(e.target)) {
            contentAboutProject.classList.add('hidden');
            ellipsis.classList.add('hidden');
            chevronDown.classList.remove('hidden');
            document.getElementById('oproject').classList.add('bg-gray-300');
        };
      if (document.getElementById('ellipsis').contains(e.target)) {
            contentAboutProject.classList.add('hidden');
            ellipsis.classList.add('hidden');
            chevronDown.classList.remove('hidden');
            document.getElementById('oproject').classList.add('bg-gray-300');
        };

        //chevronDown.classList.remove('hidden');
      });

</script>
@endsection
