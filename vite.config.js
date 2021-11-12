import liveReload from 'vite-plugin-live-reload'
import { resolve } from 'path'
import fs from 'fs'

const root = 'src'
const templateDir = resolve(__dirname, `${root}/templates`)
const templates = fs
  .readdirSync(templateDir)
  .filter(file => !(/^\./).test(file))
  .filter(file => fs.statSync(`${templateDir}/${file}`).isDirectory())

const input = Object.fromEntries([
  ...templates.map(template => [
    template,
   `${templateDir}/${template}/index.js`
  ]),
  ['shared', resolve(__dirname, `${root}/index.js`)]
])

export default ({ mode }) => ({
  root: 'src',
  base: mode === 'development' ? '/' : '/dist/',

  resolve: {
    alias: [{ find: '@', replacement: resolve(__dirname, 'src') }]
  },

  server: {
    cors: true,
    // Only important if you use a non-localhost php server, like laravel valet:
    hmr: { host: 'localhost', protocol: 'wss'},
    port: 3000,
    strictPort: true,
    https: {
      key: fs.readFileSync('./.cert/key.pem'),
      cert: fs.readFileSync('./.cert/cert.pem'),
    },
  },

  build: {
    outDir: resolve(process.cwd(), 'public/dist'),
    emptyOutDir: true,
    manifest: true,
    rollupOptions: { input }
  },

  plugins: [
    liveReload([
      '../content/**/*',
      '../site/(templates|snippets|controllers|models)/**/*.php'
    ])
  ]
})
