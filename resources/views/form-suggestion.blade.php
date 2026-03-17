@extends ('layouts.app')
@section ('content')
@php
  session(['url_before_suggestion' => url()->previous()]);
@endphp
<!-- <div class="bg-gray-200 shadow-lg rounded-xl p-2 sm:p-6 my-2 max-w-5xl mx-auto"> -->
  <form action="{{ route('store.suggestion') }}" method="POST"
        class="max-w-xl mx-auto bg-white rounded-xl shadow mt-10 p-6 space-y-4">
      @csrf

      <h2 class="text-xl font-semibold text-gray-800">
          Предложить персону
      </h2>

      <input type="text" name="name" placeholder="Имя и фамилия"
            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200"
            required>

      <input type="text" name="field" placeholder="Область (наука, общество, спорт...)"
            class="w-full border rounded-lg px-3 py-2">

      <textarea name="message" rows="4"
                placeholder="Почему стоит добавить эту персону?"
                class="w-full border rounded-lg px-3 py-2"></textarea>

      <div class="flex justify-center">
        <button type="submit"
              class="w-1/3 bg-indigo-100 text-gray-800 py-2 rounded-lg hover:bg-indigo-300 hover:text-white cursor-pointer">
          Отправить
        </button>
        <div class="w-1/3 bg-indigo-100 text-gray-800 py-2 rounded-lg hover:bg-indigo-300 hover:text-white cursor-pointer ml-4">
          @if (url()->previous() == url()->current())
            <a href="{{route('home')}}">
                Отмена
            </a>
          @else
            <a href="{{session('url_before_suggestion')}}">
                Отмена
            </a>
          @endif
        </div>
      </div>
  </form>
<!-- </div> -->
@endsection
