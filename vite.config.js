import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/mercy_tailwind.css',
                'resources/js/app.js',
                'resources/css/pagedone.css',
                'resources/js/pagedone.js',
            ],
            refresh: true,
        }),
    ],
});
