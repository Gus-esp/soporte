import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',  // archivo de entrada CSS
        'resources/js/app.js',     // archivo de entrada JS
      ],
      refresh: true, 
    }),
  ],
});
