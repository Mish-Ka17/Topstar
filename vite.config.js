import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from "@vitejs/plugin-vue";
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        vue(),
    ],

    server: {
        cors: true,
        host: 'localhost',
    },

    resolve: {
      alias: {
        '@js': path.resolve(__dirname, 'resources/js'),
        '@vue-components': path.resolve(__dirname, 'resources/vue-components'),
      },
    },
});
