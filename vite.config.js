import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ command, mode }) => {
    const env = loadEnv(mode, process.cwd());
    return {
        server: {
            hmr: {
                host: env.VITE_APP_ADDRESS
            }
        },
        plugins: [
            laravel({
                input: [
                    'resources/sass/app.scss',
                    'resources/js/app.js'
                ],
                refresh: true
            }),
        ],
    }
})
