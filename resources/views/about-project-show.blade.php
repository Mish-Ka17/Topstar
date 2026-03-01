@extends('layouts.app')
@section ('content')
  <article class="bg-gray-50 rounded-xl p-2 sm:p-6 mt-4 mb-4 max-w-4xl mx-auto">
        {{--<header class="mb-1 text-center">
            <h1 class="text-2xl sm:text-3xl font-sans text-gray-600 mb-1">{{ $title }}</h1>
            <p class="text-gray-500 italic">{{$country}}</p>
        </header> --}}
      <div class="flex">
        <div class="hidden sm:flex flex-col">
          <div>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 68 68"
              class="w-25 h-25 text-red-800"
              aria-label="PERSONA logo"
              role="img"
              >
              <!-- круг -->
              <circle cx="45" cy="45" r="33"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"/>

              <!-- точка -->
              <circle cx="45" cy="45" r="2"
                      fill="currentColor"/>
            </svg>
          </div>
          <div class="text-left px-6">
              <span class="font-heading sm:text-xl tracking-wide text-gray-900">
                PERSONA
              </span>
          </div>
        </div>

        <section class="prose prose-lg max-w-none">
            @foreach ($aboutProjectShow->content as $index=>$block)

                @if ($block['type'] === 'heading')
                    <h1 class="text-2xl sm:text-3xl font-sans text-gray-600 text-center mb-3">{{$block['text']}}</h1>
                @endif

                @if ($block['type'] === 'paragraph')
                    <p class="text-lg text-gray-600 indent-[1em] leading-normal text-left mb-2">{{$block['text']}}</p>
                @endif

                @if ($block['type'] === 'image')
                    <div class="float-{{$block['position']}} mr-2 my-1 ml-1
                        bg-grey rounded-xl shadow-lg overflow-hidden transform transition
                        w-[150px] h-[180px] md:w-[250px] md:h-[300px]">
                        <img src="{{$block['src']}}" alt="" class="w-full h-auto">
                        @if(!$loop->first)
                            <p class="p-3 text-sm sm:text-base md:text-lg text-gray-500 italic text-center">{{$block['caption']}}</p>
                        @endif
                    </div>
                @endif

                @if ($block['type'] === 'video')
                    <video controls class="w-full my-4 rounded shadow">
                        <source src="{{$block['src']}}">
                    </video>
                @endif
            @endforeach
        </section>
      </div>
    </article>
  @endsection
