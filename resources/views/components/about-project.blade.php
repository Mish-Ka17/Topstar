<div id="aboutProject" class="flex text-left ml-6">

  <div id="oproject" class="flex bg-gray-300 hover:bg-gray-200 rounded-sm px-2 py-2 ">
      <div class="text-md text-gray-800 cursor-pointer">
        О проекте
      </div>

      <div id="chevronDown" class="mt-1 cursor-pointer">
        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 size-5 text-gray-600">
          <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
        </svg>
      </div>

      <div id="ellipsis" class="mt-1 cursor-pointer hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
        </svg>
      </div>
  </div>

  <article id="contentAboutProject" class="hidden rounded-md px-1 py-2
          bg-gray-200
            w-[184px] sm:w-[504px] md:w-[650px] lg:w-[890px] xl:w-[1000px]">

    @foreach ($aboutProject->content as $index=>$block)
      {{--@if ($block['type'] === 'image')
        <div class="aspect-4/3 mr-2">
          <img src="{{$block['src']}}" alt="" class="w-full h-full object-fit">
        </div>
      @endif --}}

      @if ($block['type'] === 'heading')
        <span class="text-md font-sans font-bold text-gray-800">{{$block['text']}}&nbsp;&nbsp;&nbsp;&nbsp;</span>
      @endif

      @if ($block['type'] === 'paragraph')
        <span class="text-sm text-gray-800 indent-[1em] leading-relaxed text-left rounded-sm">{{$block['text']}}</span>
      @endif
    @endforeach
    &nbsp;&nbsp;&nbsp;
    <a href="{{route('about')}}" class="text-md text-gray-900 px-2 py-1 hover:bg-gray-400 hover:text-white italic underline rounded-sm">Подробнее...</a>
  </article>

</div>
