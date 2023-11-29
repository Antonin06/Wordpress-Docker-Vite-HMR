import { defineConfig } from 'vite';
import liveReload from './vite/reloadPhp.js'

export default defineConfig({
  plugins: [
    liveReload('./**/*.php', {
        alwaysReload: true,
        log: true,
    }),
  ],

  build: {
    target: 'modules',
    outDir: 'dist',
    rollupOptions: {
      input: {
        stylesheet: './sass/style.scss',
        main: './js/main.js'
      },
    },
  },
  server: {
    port: 1337,
    host: '0.0.0.0',
  },
});
