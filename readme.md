# About

This project is to create a sign up and pay form for users can register for the GCC summit 2018 Limitless event. 
  
# Installation

1. Create __.env__  

   * Copy from the __.env.sample__ 
   
   * Modify the database config and stripe information.

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

3. Create API_KEY by running if there isn't a key:
    ```
    php artisan key:generate
    ```
    
4.  Migrate the database:
    ```
    php artisan migrate
    ```
    
5. Seeding to get dummy data:
    ```
    php artisan db:seed
    ```    
        
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

7. Schedulling tasks

    1. **Server development (Linux or Homestead)**, In order to run schedule properly every given timeframe, execute:
    ```
    * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
    ```

    2. **Mac Development Environment**, In order to run schedule properly every given timeframe, open a new tab with same root directory of the project and run:
    ```
    while true; do php artisan schedule:run; sleep 60; done
    ```

# Virtual Environment

- If has [valet](https://laravel.com/docs/5.5/valet) installed,
  then use it is recommended to use valet to run in __dev__ mode.

- Alternatively, use php local server

  ```
  php artisan serve
  ```
  
  and run in [localhost](http://127.0.0.1:800)  
  
# Selected APIs

  ### 1. Sign up and pay with Stripe
  
  - __Payment and Sign up__ are integrate altogether with custom vue-strpe-elment.js
  
  ### 2. Email Service
  
  - __Order Confirmation__: When use purchase or pay for something, an email will be sent from server.
  
  - __Account Registration Confirmation__: Users are invited by existing users and a confirmation email will sent to the new user. By clicking the link in the email, users will be able to set their password and login the the admin system. 
  
# Packages Version

[Laravel](https://laravel.com/docs/5.5) version is _5.5_

[Vue](https://vuejs.org/v2/guide/) version is _2.5.*_

[Vuex](https://vuex.vuejs.org/en/intro.html) version is _3.0.*_

[Stripe](https://stripe.com.au) version is *5.7*

# Screenshots

### Summit poster

![screen shot 2017-12-06 at 5 02 26 pm](https://user-images.githubusercontent.com/9074571/33647172-a69123a2-daa7-11e7-87df-8f2fd808665c.png)

### Summit Register and Pay

![](https://user-images.githubusercontent.com/9074571/33864983-9d786050-df43-11e7-904c-36dfaff3c196.png)

### Processing payment

![screen shot 2017-12-13 at 3 05 37 pm](https://user-images.githubusercontent.com/9074571/33921327-2f48bf4c-e017-11e7-83f5-ba4e0ef2c99b.png)

### Payment success

![](https://user-images.githubusercontent.com/9074571/33865145-7d1ded42-df44-11e7-91da-76207a539c7e.png)

### Receipt Email

![screen shot 2017-12-13 at 3 12 49 pm](https://user-images.githubusercontent.com/9074571/33921484-1e3a6a38-e018-11e7-8a7b-6afd292022a0.png)


### Admin Login

![screen shot 2017-12-06 at 5 03 24 pm](https://user-images.githubusercontent.com/9074571/33865057-100e2eb0-df44-11e7-8b10-2e7233a5d480.png)

### Admin Panel

![screen shot 2017-12-06 at 5 03 38 pm](https://user-images.githubusercontent.com/9074571/33857561-5161f2bc-df20-11e7-95b0-feb3fc4b37ed.png)

### Invite User

![screen shot 2017-12-13 at 12 52 45 pm](https://user-images.githubusercontent.com/9074571/33917893-ca8e6d8e-e004-11e7-92fc-14fe1fdb8442.png)

### Inivtation sent

![screen shot 2017-12-13 at 12 53 23 pm](https://user-images.githubusercontent.com/9074571/33917892-ca58d19c-e004-11e7-8038-945d10060a8f.png)

### Invitation Email

![screen shot 2017-12-13 at 3 11 40 pm](https://user-images.githubusercontent.com/9074571/33921455-fa725b4c-e017-11e7-81dc-2c6b109bd337.png)

### Confirm Invitation

![screen shot 2017-12-13 at 3 07 32 pm](https://user-images.githubusercontent.com/9074571/33921406-bc94f744-e017-11e7-9df7-a341546cc5da.png)
