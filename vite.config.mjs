import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin'; // Correcta importación del plugin

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css', // Cambia si tienes otros archivos CSS
        'resources/js/app.js',    // Cambia si tienes otros archivos JS
      ],
      refresh: true, // Activa el hot reload
    }),
  ],
});
