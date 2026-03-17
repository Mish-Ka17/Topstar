@extends ('layouts.app')

@section ('content')
<article class="bg-gray-50 rounded-xl p-2 sm:p-6 mt-4 mb-4 max-w-4xl mx-auto">

  <section class="prose prose-lg max-w-none">
    <h1 class="text-2xl sm:text-3xl font-sans text-gray-600 text-center mb-3">Подтверждение Вашего email-адреса</h1>

    <p class="text-lg text-gray-600 leading-normal text-center mb-2">Спасибо за регистрацию!
        <br/>Мы отправили письмо на указанный Вами email-адрес.
        <br/>Подтвердите Ваш email, нажав на кнопку в этом письме.
    </p>
    <div>
      <p class="text-lg text-gray-600 leading-normal text-center mt-10 mb-4">Не получили письмо?&nbsp;
        Нажмите кнопку повторной отправки.</p>
    </div>
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="bg-indigo-100 text-gray-800 px-4 py-2 rounded hover:bg-indigo-300 hover:text-white cursor-pointer">
            Отправить письмо повторно
        </button>
    </form>

  </section>
</article>
@endsection
