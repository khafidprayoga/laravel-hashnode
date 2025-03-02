import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/*.js','resources/css/atom-one-dark.min.css'],
            refresh: true,
        }),
    ],
})
