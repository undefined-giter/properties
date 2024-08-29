laravel.com/docs/11.x/installation
inertiajs.com/server-side-setup - client-side-setup
tailwindcss.com/docs/guides/laravel
vuejs.org/guide/introduction.html
vitejs.dev/guide


laravel new laraVue
cd .\laraVue\
npm i vue@latest
code .
composer require inertiajs/inertia-laravel

    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body>
    @inertia

php artisan inertia:middleware

dans bootstrap/app.php
use App\Http\Middleware\HandleInertiaRequests;
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        HandleInertiaRequests::class
    ]);
})

Dans web.php
use Inertia\Inertia;
Route::get('/', function () {
    return Inertia('');
});

npm install @inertiajs/vue3

create "Pages" folder: ressources/js/Pages

Dans vite.config.js:
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

//// installer tailwind
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p

Dans tailwind.config.js:
content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
],

Dans app.css:
@tailwind base;
@tailwind components;
@tailwind utilities;

Dans app.js:
import '../css/app.css'

Dans la balise head du layout.blade.php (ou .vue ou .js)
@vite('resources/css/app.css')
Et en fin de body :
@vite('resources/js/app.js')
//// fin installer tailwind

composer require barryvdh/laravel-debugbar --dev
//ajoute une debugbar

php artisan ide-helper:models -M
// aide l'ide à connaitre les models, et les types de nos entrées en bdd

php artisan serve
npm run dev
npm run build

php artisan config:cache
php artisan config:clear
php artisan route:cache
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan event:cache
php artisan event:clear
npm cache clean --force

composer dump-autoload

php artisan make:model -m NomDuModel
// Puis ajouter les colomns dans la migration créée, $table->string('title');
// option -m pour créé la migration

php artisan migrate

php artisan make:migration add_comment_to_users_table --table=users
$table->longText('comment')->nullable();
// OU pour ne pas rendre la colomne nullable :
$table->longText('comment')->default('')->change();
// créer une nouvelle migration pour ajouter ue colomne à une table

php artisan make:controller Admin\PropertyController

php artisan make:controller Admin\PropertyController -r
// -r permet de pré-créer les methodes CRUD -> c'est un controller 'resource'

php artisan make:request Admin\PropertyFormRequest
// valider les données entrées en inputs

php artisan make:middleware RestrictAdminAccess

php artisan route:list

composer require tightenco/ziggy
// accède aux routes definies en Laravel directement depuis le code JS

php artisan storage:link
// rendre les photos accessibles - créé un lien symbolique entre le storage folder dans le public folder

npm i --save lodash

