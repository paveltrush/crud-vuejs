import { defineConfig } from 'vite';
import vue from "@vitejs/plugin-vue";
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: true,
        port: 3000, // This is the port which we will use in docker
        // Thanks @sergiomoura for the window fix
        // add the next lines if you're using windows and hot reload doesn't work
        watch: {
            usePolling: true
        }
    }
});
