@extends ('layouts.app')
@section ('content')
<div class="bg-gray-200 shadow-lg rounded-xl p-2 sm:p-6 my-2 max-w-5xl mx-auto">
  <form action="{{ route('store.suggestion') }}" method="POST"
        class="max-w-xl mx-auto bg-white rounded-xl shadow p-6 space-y-4">
      @csrf

      <h2 class="text-xl font-semibold text-gray-800">
          Предложить персону
      </h2>

      <input type="text" name="name" placeholder="Имя и фамилия"
            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200"
            required>

      <input type="text" name="field" placeholder="Область (наука, спорт...)"
            class="w-full border rounded-lg px-3 py-2">

      <input type="email" name="user_email" placeholder="Ваш email (необязательно)"
            class="w-full border rounded-lg px-3 py-2">

      <textarea name="message" rows="4"
                placeholder="Почему стоит добавить эту персону?"
                class="w-full border rounded-lg px-3 py-2"></textarea>

      <button type="submit"
              class="w-1/3 bg-indigo-700 text-white py-2 rounded-lg hover:bg-indigo-600">
          Отправить
      </button>
  </form>
</div>
@endsection
