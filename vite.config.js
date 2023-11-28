import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import fs from 'fs';

export default defineConfig({
    server: {
        https: {
            key: fs.readFileSync(`/var/www/golists/certs/live/oracle1.artillero.com.es/privkey.pem`),
            cert: fs.readFileSync(`/var/www/golists/certs/live/oracle1.artillero.com.es/cert.pem`),
        },
        host:'oracle1.artillero.com.es',
        hmr: {
            host: 'oracle1.artillero.com.es',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
    ],
});
