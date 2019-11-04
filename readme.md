## Download


[![Download](https://circleci.com/gh/rappasoft/laravel-boilerplate/tree/master.svg?style=svg)](https://github.com/webbello/wings/archive/master.zip)


## Getting Started

Quiz application in one form or the other is becoming a general requirement for most of the applications these days. Be it Survey, mock test, preparation, self evaluation, gathering information, actual objective test or exam. This quiz application will help you to get through your need with minimal or no modification.

### Prerequisites

What things you need to install the software and how to install them

```
NodeJs (10.x)
Composer
PHP >= 7.2

```

# Installation


## 1. Download

Download the files above and place on your server. [Download](https://github.com/webbello/wings/archive/master.zip)



## 2. Environment Files

This package ships with a `.env.example` file in the root of the project.

You must rename this file to just `.env`

Note: Make sure you have hidden files shown on your system.

## 3. Composer

Laravel project dependencies are managed through the [PHP Composer tool](https://getcomposer.org/) . The first step is to install the depencencies by navigating into your project in terminal and typing this command:

```
composer install
```

## 4. NPM/Yarn

In order to install the Javascript packages for frontend development, you will need the Node Package Manager, and optionally the Yarn Package Manager by Facebook (Recommended)

If you only have NPM installed you have to run this command from the root of the project:

```
npm install
```
If you have Yarn installed, run this instead from the root of the project:

`yarn`


## 5. Create Database

You must create your database on your server and on your `.env` file update the following lines:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wings
DB_USERNAME=root
DB_PASSWORD=secret

```
Change these lines to reflect your new database settings.


## 6. Artisan Commands

The first thing we are going to so is set the key that Laravel will use when doing encryption.
```
php artisan key:generate
```
You should see a green message stating your key was successfully generated. As well as you should see the `APP_KEY` variable in your `.env` file reflected.

It's time to see if your database credentials are correct.

We are going to run the built in migrations to create the database tables:
```
php artisan migrate
```

You should see a message for each table migrated, if you don't and see errors, than your credentials are most likely not correct.

We are now going to set the administrator account information. To do this you need to navigate to this file and change the name/email/password of the Administrator account.

You can delete the other dummy users, but do not delete the administrator account or you will not be able to access the backend.

Now seed the database with:
```
php artisan db:seed
```
You should get a message for each file seeded, you should see the information in your database tables.

## 7. Storage:link

After your project is installed you must run this command to link your public storage folder for user avatar uploads:

```
php artisan storage:link
```

## 8. Serve 

```
php artisan serve
```

## 9. Login

After your project is installed and you can access it in a browser, click the login button on the right of the navigation bar.

The administrator credentials are:

**User:** admin@admin.com  
**Password:** secret

You will be automatically redirected to the backend. If you changed these values in the seeder prior, then obviously use the ones you updated to.


## Route guide with screenshots

| `\src\app\components\login`               | `\src\app\components\quiz`               | `\src\app\components\offline-session` |
| ------------- |:-------------:| -----:|
| ![](./images/screenshot/eclass_login.png) | ![](./images/screenshot/play.png) | ![](./images/screenshot/offline-session.png) |

| `\src\app\components\user-profile`          | `\src\app\components\quiz\quiz-list`   | `\src\app\components\question`        |
| ------------- |:-------------:| -----:|
| ![](./images/screenshot/study_material.png) | ![](./images/screenshot/quiz-list.png) | ![](./images/screenshot/question.png) |

| `\src\app\components\online-users`        | `\src\app\components\reports`       | `\src\app\components\chat-history`        |
| ------------- |:-------------:| -----:|
| ![](./images/screenshot/online-users.png) | ![](./images/screenshot/report.png) | ![](./images/screenshot/chat-history.png) |

## Demo Link

<a href="http://wingsofesc.herokuapp.com/"> Demo Url </a>


 
