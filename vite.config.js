import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
// import path from 'path'
// import monacoEditorPlugin from 'vite-plugin-monaco-editor';
// import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        vue(),
        laravel({

            input: ['resources/js/app.js'],
            // input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),

        // monacoEditorPlugin(),

        // tailwindcss(),

            ],
            // server: { https: false, cors: false, hmr: false, port: 5174 },
            // resolve: {
            //     alias: {
            //       '@': path.resolve(__dirname, './resources/js'),
            //     //   '@': path.resolve(__dirname, './src'),
            //     },
            //   },






    // base: '/portfolio/wii/'
});
