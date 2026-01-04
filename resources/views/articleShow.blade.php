@extends('layouts.app')
@section ('content')
    <x-breadcrumbs />
    <article class="bg-gray-200 shadow-lg rounded-3xl p-6 sm:p-10 max-w-6xl mx-auto">
        <header class="mb-8 text-center">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">{{ $title }}</h1>
            <p class="text-gray-500 italic">{{$country}}</p>
        </header>

        <section class="prose prose-lg  text-justify max-w-none">
            @foreach ($content as $index=>$block)

                @if ($block['type'] === 'heading')
                    <p class="text-2xl sm:text-2xl font-bold text-gray-800 text-center mb-3">{{$block['text']}}</p>
                @endif

                @if ($block['type'] === 'paragraph')
                    <p class="text-xl text-gray-500 indent-[2em] leading-relaxed text-justify mb-4">{{$block['text']}}</p>
                @endif

                @if ($block['type'] === 'image')
                    <div class="float-{{$block['position']}} mr-7 my-3 ml-3
                        bg-grey rounded-2xl shadow-lg overflow-hidden transform transition
                        hover:-translate-y-2 hover:shadow-2xl

                        w-[150px] sm:w-[200px] md:w-[250px] lg:w-[300px]
                        ">
                        <img src="{{$block['src']}}" alt="" class="w-full h-auto">
                        @if(!$loop->first)
                            <p class="p-3 text-sm sm:text-base md:text-lg text-gray-500 italic text-center">{{$block['caption']}}</p>
                        @endif
                    </div>
<!-- class="rotate-[-3deg] sm:rotate-[-5deg] md:rotate-[-7deg] lg:rotate-[-10deg] hover:rotate-0" -->
                @endif

                @if ($block['type'] === 'video')
                    <video controls class="w-full my-4 rounded shadow">
                        <source src="{{$block['src']}}">
                    </video>
                @endif
            @endforeach
            <div class="p-4 bg-gray-100 rounded-lg shadow mb-4">
                @if($comments->count()==0)
                    <p class="text-xl sm:text-2xl font-normal text-gray-400 mb-3">
                    Комментариев пока не оставлено</p>
                @else
                    <p class="text-xl sm:text-2xl font-bold text-gray-600 mb-3">Комментарии</p>
                    @foreach ($comments as $comment)
                        <div>
                            <p class="font-bold text-gray-600">{{$comment->user->name}}&nbsp;
                                <span class="font-light italic">{{$comment->created_at->format('d.m.Y: H ч.m мин.')}}</span></p>
                            <p>{{$comment->content}}</p><br/>
                        </div>
                    @endforeach
                @endif
            </div>
        <x-addcomment :$user :$articleid />
        </section>
    </article>
  @endsection
