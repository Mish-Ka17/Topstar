import { createApp } from 'vue';
import MobileMenu from './index.vue';

/**
 * Монтирует мобильное меню в элемент с указанным id.
 * Данные меню берутся из data-menu атрибута (JSON), как context в Auth из data-context.
 * Открытие по клику на кнопку в layout: window.dispatchEvent(new CustomEvent('mobile-menu-toggle'))
 *
 * @param {string} id - id элемента в DOM (точка монтирования с data-menu)
 */
export function mount(id) {
  const target = document.querySelector(`#${id}`);
  if (!target) return;

  let menu = [];
  try {
    if (target.dataset.menu) {
      menu = JSON.parse(target.dataset.menu);
    }
  } catch (e) {
    console.warn('MobileMenu: не удалось разобрать data-menu', e);
    console.warn('Содержимое data-menu:', target.dataset.menu);
  }

  const app = createApp(MobileMenu, { menu });
  app.mount(target);
}
