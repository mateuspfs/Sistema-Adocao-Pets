import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/style-site.css', 'resources/css/style-admin.css'],
            refresh: true,
        }),
    ],
});
