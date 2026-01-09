<template>
  <div class="flex flex-col">
    <div class="flex justify-between mb-4">
      <span class="text-xl font-semibold">Регистрация</span>

      <div
        class="w-8 h-8 cursor-pointer"
        v-html="closeIcon"
        data-modal-close="auth"/>
      </div>
    </div>
    <div class="flex flex-col space-y-[15px]">
      <input
        v-model="email"
        type="email"
        name="email"
        placeholder="Введите Email"
        class="border rounded px-2 py-2 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-400"
      />

      <input
        v-model="name"
        type="text"
        name="name"
        placeholder="Введите имя"
        class="border rounded px-2 py-2 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-400"
      />

      <input
        v-model="password"
        type="password"
        name="password"
        placeholder="Введите пароль"
        class="border rounded px-2 py-2 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-400"
      />

      <input
        v-model="passwordConfirmation"
        type="password"
        name="confirmPassword"
        placeholder="Подтвердите пароль"
        class="border rounded px-2 py-2 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-400"
      />

      <button
        type="submit"
        class="w-40 m-auto bg-blue-500 text-white text-[14px] py-2 rounded hover:bg-blue-600 cursor-pointer"
        @click="sendHandler">
        Зарегистрироваться
      </button>
    </div>

</template>

<script setup>
  import { ref } from 'vue';
  import closeIcon from './assets/close.svg?raw';
  import axios from 'axios';

  const email = ref('');
  const name = ref('');
  const password = ref('');
  const passwordConfirmation = ref('');

  function sendHandler() {
    axios.post('/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      password_confirmation : passwordConfirmation.value,
      _csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }).then(({ request }) => {
      document.location.href = request.responseURL;
    });
  }
</script>

