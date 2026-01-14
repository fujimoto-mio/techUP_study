import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        // ===== Front 共通 =====
        'resources/css/front/common.css',
        'resources/js/front/app.js',

        // ===== Front Pages =====
        'resources/css/front/top.css',
        'resources/js/front/top.js',

        'resources/css/front/about.css',
        'resources/js/front/about.js',

        'resources/css/front/privacy-policy.css',

        'resources/css/front/coming-soon-en.css',

        'resources/css/front/contact/show.css',
        'resources/css/front/contact/thanks.css',

        'resources/css/front/newsblog/newsblog.css',
        'resources/css/front/newsblog/show.css',

        'resources/css/front/works/works.css',
        'resources/css/front/works/show.css',

        'resources/css/front/solutions/gnacademy.css',
        'resources/js/front/solutions/gnacademy.js',

        'resources/css/front/solutions/gnmedia.css',
        'resources/js/front/solutions/gnmedia.js',

        'resources/css/front/solutions/gnstudio.css',
        'resources/js/front/solutions/gnstudio.js',

        // ===== Admin 共通 =====
        'resources/css/admin/common.css',
        'resources/js/admin/app.js',

        // ===== Admin Pages =====
        'resources/css/admin/dashboard.css',
        'resources/js/admin/dashboard.js',

        'resources/css/admin/auth/login.css',

        'resources/css/admin/posts/index.css',
        'resources/js/admin/posts/create.js',

        'resources/css/admin/posts/create.css',

        'resources/css/admin/works/index.css',
        'resources/css/admin/works/create.css',
      ],
      refresh: true,
    }),
  ],

    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        manifest: 'manifest.json',
    },
});

