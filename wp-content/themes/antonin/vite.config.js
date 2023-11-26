import { resolve as resolvePath } from 'path';

import { defineConfig } from 'vite';

import { CopyFilePlugin } from './vite';

const __dirname = new URL('.', import.meta.url).pathname;
console.log(__dirname)
export default defineConfig({
  plugins: [
    CopyFilePlugin({
      sourceFileName: 'style.css',
      absolutePathToDestination: resolvePath(__dirname, './sass/style.css'),
    }),
    CopyFilePlugin({
      sourceFileName: 'main',
      absolutePathToDestination: resolvePath(__dirname, './js/main.js'),
    }),
  ],
  build: {
    target: 'modules',
    outDir: 'dist',
    rollupOptions: {
      input: {
        stylesheet: './sass/style.scss',
        helloWorld: './js/main.js'
      },
    },
  },
  server: {
    port: 1337,
    host: '0.0.0.0',
  },
});
