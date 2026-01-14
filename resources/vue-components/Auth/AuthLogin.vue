<template>
  <div class="flex flex-col">
    <div class="flex justify-between mb-4">
      <span class="text-xl font-semibold">Авторизация</span>

      <div
        class="w-8 h-8 cursor-pointer"
        v-html="closeIcon"
        data-modal-close="auth"/>
      </div>

    <div class="flex flex-col space-y-[10px]">
      <div class="flex flex-col space-y-[5px]">
        <input
        v-model="email"
        type="email"
        name="email"
        placeholder="Введите Email"
        class="border rounded px-2 py-2 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-400"
        />
        <p class="h-5 text-sm text-red-600">{{ errors.email || '' }}</p>
      </div>

      <div class="flex flex-col space-y-[5px]">
        <input
        v-model="password"
        type="password"
        name="password"
        placeholder="Введите пароль"
        class="border rounded px-2 py-2 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-400"
        />
        <p class="h-5 text-sm text-red-600">{{ errors.password || '' }}</p>
      </div>

      <button
      type="submit"
      class="w-30 m-auto bg-blue-500 text-white text-[14px] py-2 rounded hover:bg-blue-600 cursor-pointer"
      @click="sendHandler">
      Войти
      </button>
    </div>
  </div>
</template>

<script setup>
  import { ref, reactive, watch } from 'vue';
  import closeIcon from './assets/close.svg?raw';
  import axios from 'axios';

  const email = ref('');
  const password = ref('');
  const errors = reactive({
    email: null,
    password: null,
  });

  function clearErrors() {
    Object.entries(errors).forEach(([k]) => {
      errors[k] = null;
    });
  }

  function setErrors(receivedErrors) {
    if (receivedErrors) {
      Object.entries(receivedErrors).forEach(([k, [v]]) => {
        if (k in errors) {
          errors[k] = v;
        }
      });
    }
  }

  function sendHandler() {
    return axios.post('/login', {
      email: email.value,
      password: password.value,
      _csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }).then(({ request }) => {
      document.location.href = request.responseURL;
    }).catch(({ response: { data } }) => {
      setErrors(data.errors);
    });
  }

  watch([email, password], () => {
    clearErrors();
  });
</script>

