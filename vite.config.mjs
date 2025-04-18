import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/index.html', // Asegúrate de que Vite sepa de este archivo
      ],
    }),
  ],
});
