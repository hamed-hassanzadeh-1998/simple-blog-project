const mix = require('laravel-mix');


mix.styles([
    'resources/admin/css/font-awesome.min.css',
    'resources/admin/css/font-awesome.css',
    'resources/admin/css/simple-line-icons.min.css',
    'resources/admin/dist/style.css',
    'resources/admin/dist/style-custom.css',
], 'public/css/all-admin.css')
mix.sass('resources/admin/css/fonta.scss', 'public/css/all-admin.css')
mix.scripts([
    'resources/admin/js/libs/jquery.min.js',
    'resources/admin/js/libs/bootstrap.min.js',
    'resources/admin/js/libs/Chart.min.js',
    'resources/admin/js/libs/pace.min.js',
    'resources/admin/js/app.js',
    'resources/admin/js/views/main.js'

], 'public/js/all-admin.js')

mix.styles(['resources/admin/css/dropzone.min.css'], 'public/css/dropzone.css')
    .scripts(['resources/admin/js/dropzone.min.js'], 'public/js/dropzone.js')

mix.styles([
        'resources/frontend/css/blog-post.css',
        'resources/frontend/vendor/bootstrap/css/bootstrap.min.css',
    ], 'public/css/all.css')
    .scripts([
        'resources/frontend/vendor/jquery/jquery.min.js',
        'resources/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js',
    ], 'public/js/all.js')