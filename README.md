
## FileStore

This application is used to securely store and transfer files. Your recipient receives a link to the e-mail and can download the file transferred to him. The shelf life of files is limited to no more than 45 days (DAY_SAVE in App\MyApp - you can change it).

App created special for Drive.Modul.OOO.

Created by: http://best-itpro.ru


## FileStore Installation

This app created in PHP Laravel Framework 6.15.1.


- Copy files to project folder.
- Create MySQL Database (DB_DATABASE)


Edit .env:

- APP_NAME=YourAppName
- APP_URL=YourURL
- DB_DATABASE=YourDatabaseName
- DB_USERNAME=YourDBUser
- DB_PASSWORD=YourDBUserPassword
- MAIL_DRIVER=smtp
- MAIL_HOST=smtp.yandex.ru (for example we use Yandex.Mail)
- MAIL_PORT=587
- MAIL_USERNAME=YourYandexLogin
- MAIL_PASSWORD=YourYandexPassword
- MAIL_ENCRYPTION=tls
- MAIL_FROM_ADDRESS=YourYandexEmail
- MAIL_FROM_NAME="${APP_NAME}"


In project folder:

 - create bootstrap/cache directory - it must be present and writable
 - run: composer install
 - run: npm install (node.js must be installed in your system)
- change permissions: chown www-data:www-data bootstrap/cache
- chmod -R 775 bootstrap/cache
- change permissions: chown www-data:www-data storage
- chmod -R 775 /storage/logs/laravel.log
- Configure Apache to project folder/public
- sudo service apache2 restart
- run: sudo php artisan storage:link
- run: php artisan key:generate
- run: php artisan config:cache

In project folder run:

- php artisan migrate
- php artisan config:cache
- comment command return redirect()->route('home'); (93 line) in file \app\Http\Controllers\Auth\RegisterController.php for new admin creation *

From Web-Browser:

- Check in your web-browser: APP_URL
- Use your web-browser APP_URL/admin
- Register New Admin in web-browser
- Check your e-mail and confirm registration
- Login to APP_URL/admin
- Oops! I'm sorry, but this site has only russian interface now - may be I'll create eng interface later ;)
- If you do not want to register new administrators anymore, you can comment out line 93
- Add all mail domains to which you will send links on APP_URL/admin/settings 
-  Only on these domains will it be possible to send links for downloading files
- Try to sent file to anyone from APP_URL

Crontab: 
- crontab -e (to automatically delete old files):

 ***** /YourProgectFolder/ && php artisan schedule:run >> /dev/null 2>&1

- Enjoy your new file exchanger now!
;)



If you liked this program, you can make a donation:

- http://best-itpro.ru/donation/ (Yandex.Money)
- R723560933530 (Webmoney)
- Z172877073592 (Webmoney)




## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
