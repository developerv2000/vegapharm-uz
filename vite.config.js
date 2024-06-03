import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel([
      'public/js/styles.js',
      'public/js/app.js',
      'public/js/dashboard.js',
    ]),
  ],
});
