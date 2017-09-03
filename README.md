# quibble
Quibble is a system which allows you to calculate various attainment level achieved by a teacher.

# Installation
1. Nodejs - [Download]()https://nodejs.org/)
2. Composer - [Download](https://getcomposer.org/download/)
3. Laravel installed via composer
   >composer global require "laravel/installer"
4. Fork this repository
5. Install node packages
   >npm install
6. Install composer packages
   >composer update


# Database creation
1. Set-up your database variables in **.env** file (**may be different for your system**)
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=quibble
   DB_USERNAME=root
   DB_PASSWORD=
   ```

2. Open CLI in your project folder and type
   ```
   php artisan migrate
   php artisan db:seed
   ```