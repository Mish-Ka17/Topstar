import { createApp } from "vue";
import Auth from '../Auth/index.vue';

export function mount(id = null) {
  const target = document.querySelector(`#${id}`);
  if (!target) return;

  const authApp = createApp(Auth, {
    context: target.dataset.context
  });

  authApp.mount(target);
}
