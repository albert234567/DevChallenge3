import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
        'resources/css/app.css',
      ],
    }),
  ],
  server: {
    host: '127.0.0.1',
    port: 5173, // el mismo puerto que Vite utiliza
  },
});
