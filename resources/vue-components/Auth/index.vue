<template>
  <component :is="currentComponent"/>
</template>

<script setup>
  import { shallowRef } from 'vue';
  import AuthLogin from './AuthLogin.vue';
  import AuthRegister from './AuthRegister.vue';

  const props = defineProps({
    context: String
  });

  const currentComponent = shallowRef({
    login: AuthLogin,
    registration: AuthRegister
  }[props.context]);
</script>

