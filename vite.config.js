import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [

                // Landing page assets
                'resources/css/app.css', 
                'resources/css/mercy_tailwind.css',
                'resources/js/app.js',
                'resources/css/pagedone.css',
                'resources/js/pagedone.js',

                // // Admin dashboard assets
                'resources/css/dashboard.css',
                'resources/js/dashboard.js',
            ],
            refresh: true,
        }),
    ],
});
