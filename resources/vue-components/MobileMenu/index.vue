<template>
  <Teleport to="body">
    <!-- Оверлей -->
    <Transition name="overlay">
      <div
        v-if="isOpen"
        class="fixed inset-0 z-[100] bg-black/50 lg:hidden"
        aria-hidden="true"
        @click="close"
      />
    </Transition>

    <!-- Панель меню -->
    <Transition name="drawer">
      <aside
        v-if="isOpen"
        class="fixed top-0 right-0 z-[101] w-[280px] max-w-[85vw] h-full
               bg-gradient-to-b from-gray-300 to-indigo-300
               shadow-xl overflow-y-auto lg:hidden"
        role="dialog"
        aria-label="Мобильное меню"
      >
        <div class="flex flex-col min-h-full">
          <!-- Шапка с кнопкой закрытия -->
          <div class="flex items-center justify-between p-4 border-b border-indigo-200/50">
            <span class="text-lg font-semibold text-gray-800">Меню</span>
            <button
              type="button"
              class="p-2 rounded-lg text-gray-600 hover:bg-indigo-200/60 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500"
              aria-label="Закрыть меню"
              @click="close"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Список пунктов меню -->
          <nav class="flex-1 py-2">
            <ul class="space-y-1 px-2">
              <li v-for="(item, index) in menuItems" :key="item.id" class="border-b border-indigo-200/30 last:border-0">
                <div class="rounded-lg overflow-hidden">
                  <!-- Пункт меню (кнопка-аккордеон) -->
                  <button
                    type="button"
                    class="w-full flex items-center justify-between px-4 py-3 text-left text-gray-800 font-medium
                           hover:bg-indigo-200/50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-inset"
                    :aria-expanded="expandedId === item.id"
                    :aria-controls="`submenu-${item.id}`"
                    :id="`menuitem-${item.id}`"
                    @click="toggleExpand(item.id)"
                  >
                    <span>{{ item.title }}</span>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-gray-600 transition-transform duration-200"
                      :class="{ 'rotate-180': expandedId === item.id }"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </button>

                  <!-- Подпункты -->
                  <ul
                    :id="`submenu-${item.id}`"
                    class="overflow-hidden transition-all duration-200 ease-out"
                    :class="expandedId === item.id ? 'max-h-[500px] opacity-100' : 'max-h-0 opacity-0'"
                    role="region"
                    :aria-labelledby="`menuitem-${item.id}`"
                  >
                    <li v-for="sub in (item.children || [])" :key="sub.id">
                      <a
                        :href="sub.href"
                        class="block pl-6 pr-4 py-2.5 text-gray-700 hover:bg-indigo-100 hover:text-indigo-800
                               border-l-2 border-transparent hover:border-indigo-500"
                        @click="onSubItemClick"
                      >
                        {{ sub.title }}
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
    </Transition>
  </Teleport>
</template>

<script setup>
import { ref, computed, watch, onMounted, onUnmounted } from 'vue';

const props = defineProps({
  /** Пункты меню с бэкенда: [{ id, title, children: [{ id, title, href }] }] */
  menu: {
    type: Array,
    default: () => [],
  },
});

const menuItems = computed(() => props.menu || []);
const isOpen = ref(false);
const expandedId = ref(null);

function toggle() {
  isOpen.value = !isOpen.value;
}

onMounted(() => {
  window.addEventListener('mobile-menu-toggle', toggle);
});
onUnmounted(() => {
  window.removeEventListener('mobile-menu-toggle', toggle);
});

function toggleExpand(id) {
  expandedId.value = expandedId.value === id ? null : id;
}

function close() {
  isOpen.value = false;
  expandedId.value = null;
}

function onSubItemClick() {
  // При переходе по ссылке закрываем меню (если href не #)
  close();
}

// Блокировка скролла body при открытом меню
watch(isOpen, (open) => {
  if (open) {
    document.body.style.overflow = 'hidden';
  } else {
    document.body.style.overflow = '';
  }
});
</script>

<style scoped>
.overlay-enter-active,
.overlay-leave-active {
  transition: opacity 0.2s ease;
}
.overlay-enter-from,
.overlay-leave-to {
  opacity: 0;
}

.drawer-enter-active,
.drawer-leave-active {
  transition: transform 0.25s ease;
}
.drawer-enter-from,
.drawer-leave-to {
  transform: translateX(100%);
}
</style>
