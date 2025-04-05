// Cambia require por import
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'; // Asegúrate de que esta línea esté presente
import { laravel } from 'laravel-vite-plugin'; // Importa el plugin de Vite para Laravel

export default defineConfig({
  plugins: [
    laravel(),
    vue(),
  ],
});
