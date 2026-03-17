@extends ('layouts.app')
@section ('content')
<article class="bg-gray-50 rounded-xl p-2 sm:p-6 mt-4 mb-4 max-w-4xl mx-auto">
  <section class="prose prose-lg max-w-none">
    <h1 class="text-2xl sm:text-3xl font-sans text-gray-600 text-center mb-3">Подтверждение получения Вашего предложения персоны</h1>

    <p class="text-lg text-gray-600 leading-normal text-center mb-2">Спасибо за инициативу!
        <br/>Мы обязательно рассмотрим это предложение и в ближайшее время свяжемся с Вами по указанному email-адресу.
    </p>
    <div>
      <p class="text-lg text-gray-600 leading-normal text-center mt-10 mb-4">С уважением, проект Persona.</p>
    </div>
    <div>
          <a href="{{session('url_before_suggestion')}}" class="w-1/3 bg-indigo-100 text-gray-800 px-4 py-2 rounded hover:bg-indigo-300 hover:text-white cursor-pointer">
            Вернуться на предыдущую страницу</a>&nbsp;
          <a href="{{route('home')}}" class="w-1/3 bg-indigo-100 text-gray-800 px-4 py-2 rounded hover:bg-indigo-300 hover:text-white cursor-pointer">
            На главную</a>
    </div>
  </section>
</article>
@endsection
