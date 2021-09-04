# Lavarel-study
A study of Lavarel, MVC and a little bit of composer.  

Let's start with MVC, will post some notes about my research. 

https://www.youtube.com/watch?v=jTLzytrte5k&list=PLVSNL1PHDWvQwfqqY7XSobGuV39KsM46G&index=2
A video that helps me a lot.

# Composer

This gave me some problems with php.ini. But i've downloaded the Composer-Setup, which fixed php.ini for me, i only needed make this alteration in php.ini:
```bash
extension=fileinfo
```
Only remove the semicolon of it and save the archive.

# Laravel

Finally, install the laravel framework with composer: 

```bash
composer create-project laravel/laravel example-app
```

After the download of all dependencies and the laravel, enter the folder and do this command: 

```bash
php artisan serve
```

This is the ideal way to start it, according to the laravel documentation.

It's possible create a new example with a repository on GitHub, very useful.

### To be continued...

# MVC

With MVC we can separate the responsibilities of an application, in 3 types Modal-View-Controller. 
Must have a root directory, where it start the project, and a source code, where stay the de controller and modal.

## Controller

Receives the data from view or modal and with it, make a decision - it can be a method or just a view. It's built by the programmer.

## Core

Handles the URL, decides which controller and method should be called or executed.

# Calm down. To be continued





