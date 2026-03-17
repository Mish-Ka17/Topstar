@extends ('layouts.app')
@section ('content')
<div class="flex items-center justify-center">
  <x-emptyPageShow/>
  @php
  session(['url_before' => url()->previous()]);
  @endphp
  {{-- session('url_before') --}}
  <div class="mr-8">
      <p class="text-lg text-gray-600 leading-normal text-center mt-10 mb-4">Произошла ошибка...</p>
  </div>
  <div class="flex flex-col">
    <a href="{{session('url_before')}}" class="bg-indigo-200 text-gray-800 px-4 py-2 rounded hover:bg-indigo-300 hover:text-white cursor-pointer">
      Вернуться на предыдущую страницу</a>&nbsp;
    <a href="{{route('home')}}" class="bg-indigo-200 text-gray-800 px-4 py-2 rounded hover:bg-indigo-300 hover:text-white cursor-pointer">
      На главную</a>
  </div>



</div>
@endsection
