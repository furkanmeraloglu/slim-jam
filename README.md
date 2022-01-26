<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="250"></a></p>

### About Slim Jam
Slim Jam is a project led and launched by [Uğur Arıcı](https://github.com/ugurarici) for educational purposes during the course of Advanced Full-Stack Developer Track in Siliconmade Academy. For the original project please [visit](https://github.com/ugurarici/slim-jam).

Slim Jam is a Laravel project aims to ensure Shopify integration. Slim Jam fetches product details as an Excel spreadsheet and stores all relevant data regarding the products both to Laravel database and the associated Shopify Store. It can also translate product names and headers right along with its integration to Google Cloud translation service API. Slim Jam utilizes queued jobs provided by Redis and benefits Horizon as a productive monitoring toolkit. Laravel Jetstream is utilized as a starter kit and authentication scaffolding. InertiaJs and VueJs are used for the front-end.

Different from the original copy of the project, this version also includes Laravel test suit provided by PEST. Alongside with the general logic test, some functions and API connections will also be tested via [Mocking](https://pestphp.com/docs/plugins/mock) and HTTP_Fakes features of Laravel and PEST. 

### Libraries / Packages

- [PHPSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet)
- [Google Cloud Translate](https://github.com/googleapis/google-cloud-php-translate)
- [Shopify API](https://github.com/Shopify/shopify-php-api)
- [Laravel Horizon](https://laravel.com/docs/7.x/horizon)
- [Laravel Jetstream with Inertia](https://jetstream.laravel.com/2.x/introduction.html)
- Laravel [PEST](https://pestphp.com/docs/installation) for test suite instead of PhpUnit. 

This project also utilizes some useful dev packages in order to increase the productivity of the development period. These are: 
- [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)
- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
- [Laravel Query Detector](https://github.com/beyondcode/laravel-query-detector)
