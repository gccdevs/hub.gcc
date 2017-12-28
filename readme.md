# About

  ### This project is to create a central hub system for glory city church.

  ### [Demo](https://centralhub.glorycitychurch.com)
  
  
# Installation

1. Create __.env__ by running `vi .env` if you already have __vi__ or __vim__ installed, then:

   * Copy from the sample from __.env.sample__ 
   
   * Modify the database configuration to your database connection
   
   * Add Stripe Keys if payment is needed

2. Install packages and dependencies:
    ```
    composer install
    ```
    If you don't have __composer__ installed, check [here](https://getcomposer.org/doc/00-intro.md).
    
    And then install npm dependencies by running:
    ```
    npm install
    ```
    If you don't have __npm__ installed, please check [here](https://docs.npmjs.com/getting-started/installing-node).
    
    
    > Sometimes, delete `node_modules`, `vendor`, `package-lock.json` and `composer.lock` before install.
    

3. Create API_KEY by running:
    ```
    php artisan key:generate
    ```
    
4.  Migrate the database:
    ```
    php artisan migrate
    ```
    
5. Start the app and see the application in [http://127.0.0.1:8000](http://127.0.0.1:800):
    ```
    php artisan serve
    ```
    Or use [valet](https://laravel.com/docs/5.5/valet), a virtual host, to run in custom domain, eg: **myproject.dev**
    
# Optional Setup

5. Create dummy data:
    ```
    php artisan db:refresh
    ```    
        
6. Queue email tasks:
    
    1. Change the `QUEUE_DRIVE` setting in **.env** file
        ```
        QUEUE_DRIVER=database
        ```

    2. Modify the mail settings in __.env__ file, the example is using *gmail*:
        ```
        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=Example@gmail.com
        MAIL_PASSWORD=example
        MAIL_ENCRYPTION=tls
        MAIL_FROM_ADDRESS=example@gmail.com
        MAIL_FROM_NAME="GCC Central Hub"
        ```
        Remember for **APP_NAME** or **MAIL_FROM_NAME** in *.env*, include the __" "__ to the name you gave.

    3. Run `queue listen` or `queue work`
        ```
        php artisan work
        php artisan work --tries=4 // with max attempts of four 
        ```

7. Invitation token schedulling refresh:

    1. **Server development (Linux or Homestead)**, In order to run schedule properly every given timeframe, execute:
       ```
       * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
       ```

    2. **Mac Development Environment**, In order to run schedule properly every given timeframe, open a new tab with same root directory of the project and run:
       ```
       while true; do php artisan schedule:run; sleep 60; done
       ```

# Deployment on Heroku

- Create a __Procfile__ file and add two lines to allocate dynos:
  ```
    web: vendor/bin/heroku-php-apache2 public/
    queue: php artisan queue:work --tries=3 --daemon
  ```
  **web** used for indicating where to serve the application. **queue** is used to allocate a queue to send email tasks.

- Install ClearDB addon. 

  The Addon can be installed either from cli or dashboard panel.

- Add ClearDB config at the start of `config/database.php` in Laravel:
  ```
  <? php
  
  // Production on  Heroku configs
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $host = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $database = substr($url["path"], 1);
  
  ```

- Replace the default __mysql__ connection in`config/database.php` with the followings:
  ```
  'mysql' => [
      'driver'    => 'mysql',
      'host'      => $host,
      'database'  => $database,
      'username'  => $username,
      'password'  => $password,
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
      'strict' => true,
      'engine' => null,
  ],
  ```
  
- Run in production mode (if deployed in heroku directly using github repo), so run:
  ```
  npm run prod
  ```
  
  Also, set config var `APP_ENV` to **production** in heroku dashboard panel or using cli.
