Introduction
--------------
EXP CMS
Customise from Doptor CMS (https://github.com/Doptor/Doptor)

Requirements
--------------
- PHP 5.4 and above;
- MCrypt PHP Extension
- `mod_rewrite` module enabled, if serving the CMS on an Apache server
- `php_fileinfo` plugin enabled
- MySQLi extension installed and enabled
- PHP cURL extension installed and enabled
- PHP zip extension installed and enabled

Installation
--------------
###Install Composer
Doptor CMS is based on Laravel, which utilizes [Composer](http://getcomposer.org) to manage its dependencies. First, download a copy of the `composer.phar`. Once you have the PHAR archive, you can either keep it in your local project directory or move to `usr/local/bin` to use it globally on your system. On Windows, you can use the Composer [Windows installer](https://getcomposer.org/Composer-Setup.exe).

###Install Doptor CMS
1. Download or checkout the latest copy of EXP from here (https://github.com/vnzacky/Granit/)
2. Enter the newly created folder. e.g.: `cd Granit`
3. Extract `vendor.zip`
4. Create your environment at App/config/your-environment
5. Edit Your environment at `bootstrap/strart.php`
6. Install with composer: 
6.1 Run: `composer dump-autoload`
6.2 Run: `php artisan project:setup`
7. Access the website in browser. e.g.: www.yourdomain.com/Granit

*Note: You may need to configure the `app/storage` folder to have write access by the server. A permission of `775` on the `app/storage` folder is sufficient.*

Note
--------------
Doptor is under heavy development and major changes will be pushed from time to time. You are most welcome to test Doptor CMS, however it is strictly not recommended for use in production environment until it reaches a stable release.

Contributing to Doptor CMS
--------------
**All issues and pull requests should be filed on the [Doptor/Doptor](https://github.com/Doptor/Doptor) repository.**
