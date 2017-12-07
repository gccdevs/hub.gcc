# About

This project is to create a Vue.js based single page application, which is built for __anonymous form sign up__, __payment__, __email__, __admin panel__, __download__ and basic __login__ and __register__.
  
# Installation

1. Create __.env__  

   * Copy from the __.env.sample__ 
   
   * Modify the database config.

2. Install packages:
    ```
    composer install
    ```
    and dependencies:
    ```
    npm install
    ```
    Sometimes, please do delete `node_modules`, `vendor`, 'package-lock.json' and `composer.lock` first,
    
    and then execute the above two commands. 

3. Create API_KEY by running:
    ```
    php artisan key:generate
    ```
    
4.  Migrate the database:
    ```
    php artisan migrate
    ```
    
5. Seeding:
    ```
    php artisan db:seed
    ```    
    A use with email: `admin@admin.com` and password: `123123` will be created for development.
        
6. Queue, for sending email
    
    1. Remember to change the `QUEUE_DRIVE` setting in **.env** file
    ```
    QUEUE_DRIVER=database
    ```
    
    2. Run `queue listen` or `queue work`
    ```
    php artisan work
    php artisan work --tries=4 // with max attempts of four 
    ```
    
# Run

- If has [valet](https://laravel.com/docs/5.5/valet) installed,
  then use it is recommended to use valet to run in __dev__ mode.

- Alternatively, use php local server

  ```
  php artisan serve
  ```
  
  and run in [localhost](http://127.0.0.1:800)  
  
# Selected APIs

  ### 1. Sign up and pay with Stripe
  
  - AJAX __Sign up__ form
  
  - Data will be saved into database with payment reference when stripe processed successfully.
  
  
  ### 2. Email Service
  
  - __Order Confirmation__: When use purchase or pay for something, an email will be sent from server.
  
  - __Account Registration Confirmation__: When new user or admin account is created, a invitation email will sent to their email and their account will be activiated only if they clicked on the link being sent to.
  
  
  ### 3. Admin Panel
  
  - `/login` to login.
  
  - `/dashboard` to check all options that admin page has. 
  
  - `/message` to chat with other colleagues
  
  - `booking` to allow user to book for a specific time
 
  - `calendar` to provide admin with a convenient tool to arrange upcoming events
  
  
# Packages Version

[Laravel](https://laravel.com/docs/5.5) version is _5.5_

[Vue](https://vuejs.org/v2/guide/) version is _2.5.*_

[Vuex](https://vuex.vuejs.org/en/intro.html) version is _3.0.*_

[Stripe](https://stripe.com.au) version is *5.7*

# Screenshots

### Summit poster

![screen shot 2017-12-06 at 5 02 26 pm](https://user-images.githubusercontent.com/9074571/33647172-a69123a2-daa7-11e7-87df-8f2fd808665c.png)

### Summit Register and Pay

![](https://user-images.githubusercontent.com/9074571/33714867-b25e4d10-dba4-11e7-8dce-819c45843101.png)

### Loading

![](https://user-images.githubusercontent.com/9074571/33714870-b2b87ea2-dba4-11e7-89ae-ad159a16e178.png)

### Admin Login

![screen shot 2017-12-06 at 5 03 24 pm](https://user-images.githubusercontent.com/9074571/33647177-a75af7f4-daa7-11e7-934d-0d6c7413b2fd.png)

### Admin Panel

![screen shot 2017-12-06 at 5 03 38 pm](https://user-images.githubusercontent.com/9074571/33647178-a78b4184-daa7-11e7-80af-7adbbb636ef2.png)
