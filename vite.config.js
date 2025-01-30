import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ command, mode }) => {
  return {
    plugins: [
      tailwindcss(),
      laravel({
        hotFile: 'storage/vite.hot',
        buildDirectory: 'build',
        input: [
          'resources/css/site.css',
          'resources/js/site.js',
          'resources/js/fonts.js',
        ],
        refresh: ['site/templates/**', 'site/snippets/**'],
        detectTls: 'foerderverein-einsteinstrasse.test',
      }),
    ],
  };
});
