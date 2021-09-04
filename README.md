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


# MVC

With MVC we can separate the responsibilities of an application, in 3 types Modal-View-Controller. 
Must have a root directory, where it start the project, and a source code, where stay the de controller and modal.

## Controller

Receives the data from view or modal and with it, make a decision - it can be a method or just a view. It's built by the programmer.

## Core

Handles the URL, decides which controller and method should be called or executed. Call the Models or Views

## Models

Here is the logic of the entities, the interaction with the database, basically saying.
Contactcting the controller, then show the data on a view screen, like said before.

## Views

The interaction with user, the controller need methods to react a action done by the user in the view.
In some cases, it need to show data from a model. 
            
![MVC3](https://user-images.githubusercontent.com/86273719/132092816-850880eb-029e-4c79-8b98-e8472b576b5f.png)      

# Inside Laravell

## Views

First, let's look for the first contact with the server and the code, which is the router, it can be considered the first controller that you can see in the code, it performs the function of calling views, with the possibility of passing parameters. There a lot of types of router, the one who matter for us is web.php.
Enter on it, you will gonna see something like that: 

```bash
Route::get('/new', function () {

    $name = "Matheus";

    $names = ["Júlio","Levi","Ronaldo","Battisti"];

    $age = 23;

    $numbers = [1,2,3,4,5];

    return view('new',['name' => $name, 'age' => $age, "numbers" => $numbers, "names" => $names]);
});
```
Let's get some things straight, the get method it calls is inherited from the Routes class at the beginning of the code.

Let's simplify the get syntax:

```bash
Route::get("/namearchive", function () {
return view('nameinURL',[parameters]);
});
```

Sounds simpler, doesn't it?

Thinking about creating a new view for your project, like the one presented above, do the following:

/resources/views/createarchive.blade.php

You need to include ".blade.php" at the end, because the blade is responsible for views, it makes the routes dynamic. It's the laravel machine engine.

### Inside view

Ok, you run the server and called the page you want by the URL and it appeared as it should, with the HTML entries. However, how am I going to check the parameters I passed in the route method?

In the following way, you must remember the names of the indexes that were defined along with the parameter, and in view, the blade offers a huge versatility of working with php, without having to use "<?php". Follow the body:


```bash
       <h1> New page </h1>

        @if(10 > 5)
            <p> The condition is true </p>
        @endif

        <p> {{ $name }} </p>

        @if($name  == "Matheus")
            <p> Hi, Matheus, you're {{$age}} years old </p>
        @else
            <p> The name is {{ $name }}, you're {{$age}} years old </p>
        @endif

        @for($i = 0; $i < count($numbers); $i++)
            @if ($numbers[$i] % 2 == 0)
                <p> {{$numbers[$i]}} - {{$i}}; The number is even </p>
            @else 
                <p> {{$numbers[$i]}} - {{$i}}; The number is odd </p>
            @endif
        @endfor
        <!-- We can call php, using @ php and @ endphp, without the space between the @ and php. -->
        {{-- This is the blade comment, it does not appear on the page inspection, it is blade exclusive. --}}
        @foreach($names as $nome)
            <p> {{ $nome }} - {{ $loop->index }} </p>
        @endforeach
```

We can call the PHP operators as if we were in it, just needing the @ for the blade to know it's his turn to work, see how simple it is.

Using the reference defined earlier, in route, we'll use it here, otherwise laravel won't recognize it.

Instead of using braces ({}) to identify the end of some structure, we use @end. This is how the blade understands that the structure is gone.

# Calm down. To be continued





