<template>
  <div class="flex flex-col">
    <div class="flex justify-between mb-4">
      <span class="text-xl font-semibold">Авторизация</span>

      <div
      class="w-8 h-8 cursor-pointer"
      v-html="closeIcon"
      data-modal-close="auth"/>
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
      v-model="password"
      type="password"
      name="password"
      placeholder="Введите пароль"
      class="border rounded px-2 py-2 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-400"
      />

      <button
      type="submit"
      class="bg-blue-500 text-white text-[14px] py-2 rounded hover:bg-blue-600 cursor-pointer"
      @click="sendHandler">
      Войти
      </button>
    </div>
  </div>
</template>

<script setup>
  import { ref } from 'vue';
  import closeIcon from './assets/close.svg?raw';
  import axios from 'axios';

  const email = ref('');
  const password = ref('');

  function sendHandler() {
    const formData = new FormData();
    formData.append('email', email.value);
    formData.append('password', password.value);
    formData.append('_csrf', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    axios.post('/login', formData).then(({ data, request }) => {
      console.warn('data', data);
      document.location.href = request.responseURL;
    });
  }
</script>

