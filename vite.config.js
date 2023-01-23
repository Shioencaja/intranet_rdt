import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input:  [
                'resources/css/app.css',
                'resources/css/index.scss',
                'resources/js/app.js'
            ],
           refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
            ],
            
        }),
      
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
