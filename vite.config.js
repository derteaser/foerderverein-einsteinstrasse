import { resolve } from 'path';
import kirby from 'vite-plugin-kirby';
import mkcert from 'vite-plugin-mkcert';

export default ({ mode }) => ({
  root: 'src',
  base: mode === 'development' ? '/' : '/dist/',

  build: {
    outDir: resolve(process.cwd(), 'public/dist'),
    emptyOutDir: true,
    rollupOptions: { input: [resolve(process.cwd(), 'src/index.js'), resolve(process.cwd(), 'src/index.css')] },
  },

  plugins: [kirby(['../content/**/*', '../site/(templates|snippets|controllers|models)/**/*.php']), mkcert()],
  server: {
    https: true,
    host: 'localhost',
  },
});
