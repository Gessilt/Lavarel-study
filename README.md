# Lavarel-study
A study of Lavarel, MVC and a little bit of composer.  

Let's start with MVC, will post some notes about my research. 

https://youtu.be/qH7rsZBENJo
A playlist that helps me a lot.

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
Route::get("/nameinURL", function () {
return view('namearchive',[parameters]);
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
            <p> Hi, Matheus, you are  {{$age}} years old </p>
        @else
            <p> The name is {{ $name }}, you are {{$age}} years old </p>
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

### Blade layout

Is possible create a layout with blade, we can use the same header e footer in all pages.
In your folder views, create a new folder called layouts, inside, create a file called main.blade.php, and put everything that you want that be standardized. 

We can put a value that can be inserted when the layout is called, like the title and the content, do like that:
```bash
    <title>@yield('title') </title> 
```
The title of site will be passed here

```bash
    @yield('content') 
```
The content of the site will be passed here

How to use in view archives?

```bash
@extends('layouts/main')  
``` 
Call the layout

```bash
@section('title','Parameters by URL')

@section('content')

    <h1> Paste your HTML body here </h1> 

@endsection
``` 
Section is used to represent a value defined on Yield in the main layout.

If you don't insert by the first way, you need to put an endsection, like the second example.

### Parameters

We should put the parameters like: {id};
We have the possibility of create optional parameters, using: ?;
{id} will be waiting for an parameter, not putting it, causes an error;
{id?} is optional, we need to define the parameter of function(), which can be null.

Check the different names in the Route::get and the view.

```bash
Route::get('/parameters/{id?}',function ($id = null) { 
   return view('queryParameters',['id' => $id]);
});
```

In URL, we can insert some parameters showing their names, differently of the other.
Like: "URL"?search="me".
```bash
Route::get('/parameterSearch',function () {
        $search = request('search');

        return view('queryParameterSearch',['search' => $search]);    
});
```

The request will break up the URL, get the value of search defined and transform it into a value, which can be stored.

# Controler

Controller can be created by artisan.
Enter in laravel folder and write this code: 
```bash
"php artisan make:controller NameControler"
```
A important recommendation, the first letter of class must be uppercase + "Controller"

The controller is created in controllers folder

### Inside Controller

After creating a controller, we can set some functions up, is normally created one called "index", which is the function that is called when no other is.

This functions will work like the functions of web.php. But we can call the functions of controller class in web.php.

First, add the class in the file: 
```bash
use App\Http\Controllers\EventController;
```
After it, get an Route::get and replace the function(){} by the function of class.

```bash
Route::get('/nameInURL',[NameClassController::class,'index']);
```
#### Create event w/ blade

If the page is dependent of one class, we should create a new folder inside of views, related to the class. 

Inside this class, put yours files. Example of calling:
```bash
Route::get('/events/create',[NameClassControler::class,'create']);
```

OBS: To call on a view method, you need to change the "/" for ".". Example:
```bash
return view('events.create');
```

# Database

The connection to the database is configured by the file .env;
Utilizes an ORM called Eloquent, and the migrations, to create and modify tables.

## Migrations

Migrations are like a versioning of database;
Can we forward and backward at any moment;
Like said above, can we insert and delete columns;
Make the setup of an database by a simple command;
Can we certificate the migrations with:
```bash
migrate:status
```

Let's try a connection with the database creating some tables that are already configured with migrations.
```bash
php artisan migrate 
```
You can configure the tables on the folder migrations.
"database->migrations". 

Create a new migration:
```bash
php artisan make:migration create_products_table 
```
A new archive will be created, we can change it, add new columns. If the table is already created, we can set it up again by the fresh command.
```bash
php artisan migrate:fresh
```
OBS: Take caution, the fresh drop the tables and create new ones, look out your data.

"Rollback" command make migration backward;
To backward all tables, can we use "reset";
To backward all tables and create the migrations, we need use "refresh". 

To add a new column in a existent migration, you need to create a new migration.

```bash
php artisan make:migration add_image_to_event_table
```
This is the conventional name for the new migration.

add_column_to_tableOnDatabase_table

In this migration, put the new column inside the method up(), futhermore, you need to put the same column in down() method, to possibility a rollback on migration. 
To add: 
```bash
$table->string('column',100);
```
To drop: 
```bash
$table->dropColumn('column');
```

After it, only migrate and the new column will be in your table.

## Eloquent

The lavarel's ORM;
Each table have a model, responsible for the interaction between the requisitions to the database;
Following the good pratiques, Model must have it name on singular, while the table is in plural; Event and events;
Model is rarely modified, only specific alterations. 

# Model

We can use artisan to create a new model too. 

```bash
php artisan make:model NameModel
```
After creating a Model, let's use one principle of MVC, the contact between controller and model. 

## Select

Hope you've insert some data in your table, with this on mind. How do I get all my data? 

Finally, back on controller, on the function index. We can call all data from one table.
```bash
$events = Event::all();
```

### Redeem one data

Use of Eloquent;
The method used is "findOrFail".

## Insert

In laravel, we have a specific action referent to POST, it called store.
In store, we will create the object and create it with data from POST.
To save the data sended, the method utilized is: "save".

Now, go on and create a POST formulary to the test. To the laravel allow the passage of data, you need define "@csrf" in start on form.

Before the creation of POST form, you can pass the collected data to action as follows:
```bash
Route::POST('/action',[EventController::class,'store']);
```
Store is the name conventional used to store data in a table. Use it.

In the function store, you will need to get the POST data with the object type Request, and instantiate the model class. 
```bash
public function store(Request $request) {
    
    $class = new ModalClass;

    $class->title = $request->title;
    $class->city = $request->city;
    $class->description = $request->description;
    $class->private = $request->private;
    $event->save();
    return redirect('/');
}
```
Pass the data of Request to the class and call the method save, like said above.

The redirect will send the user to an page, which is customizable.


## Saving images

To upload images we need change the enctype of form, and create a submit input for it. 
The treatment is done on the controller.
Save the image with a unique name in a project directory, because in database we only store the path of image.
Put this property in you principal form. 
```bash
enctype="multipart/form-data"
```
Create a input for image  
```bash
<div class="form-group">
    <label for='image'> Image: </label>
    <input type='file' class='form-control-file' id='image' name='image'>
</div>
```
### Inside controller

```bash

if($request->hasfile('image') && $request->file('image')->isValid()) {

    $requestImage  = $request->image;
    // Get the image

    $extension = $requestImage->extension();
    // See if the image is .jpg or .png...

    $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
    // Encrypt the image name, save the time it was inserted and put the type of extension in the final.

    $requestImage->move(public_path('img/events'), $imageName);
    //Upload image locally, in this case on "img/events".


    $event->image = $imageName;
    //Save the attribute of Modal to make the insertion
}
```
Then, save it.

## Find Or Fail

If you want get all data from a unique id in database? The method find or fail can do this for you, this one is simple to do. 

```bash
public function show ($id) {
        
    $event = Event::findOrFail($id);
    //Searching in table all data that the id is equal to $id from POST.

    return view('events.show',['event' => $event]);

    //Return all data

}
```

Good to see it, remember that show is a convention of laravel, to show the data of a specific thing. 

## Saving JSON

Save a set of data in database for multiple choices itens;
Can we create a field determined of json by migrations;
With this, we can use input by checkbox.

After to the migrate process to add a json "items" on database, let's modify our formulary. 

### Inside view

```bash 
<div class="from-group">
    <input type='checkbox' name='items[]' value='Chairs'> Chairs 
</div>
```
The name must be 'items[]', because it will be passed like an array, and the value will be inside this array.

### Inside controller

Just add it before insert the data to database.

```bash
$event->items = $request->items;
```
### Inside modal

You need to define that the item "items" is an array, otherwise will not work. You define it by inserting this on Modal of the class table.
```bash
protected $casts =[ 
    'items'=>'array'
];
```
Futhermore, you will be capable of adding JSON items on database.

## Save Date

### Inside Modal

You will need add a new specification in Modal. 
```bash
protected $dates =['date'];
```
Now, the modal will understand the Data in datetime value

### Inside view

Needs create an input,type date. 

After, to show this data, you will need call the date and strtotime methods.

```bash
<p class='card-date'> {{date('d/m/y'), strtotime($eventData->date)}} </p>
```

### Inside controller 

Process data submission via controller.

Do it normally, nothing to change this time.







# Flash Messages

A interaction with user.
We can add one using the method with in controllers.
Show a feedback to user.
Using blade, is possible verify the presence of flash by the @session.

Starting in controller, to add an Flash Message, you need call the "with" method. 

```bash
return redirect('/folder')->with('msg','Created successfully');
```

To appear on your website, using the blade create like this: 

```bash
@if (@session('msg'))
    <p class ='msg'> {{@session('msg')}}  </p>
@endif
```
@session is responsible for store the message.  

```
```bash

```
```bash

```
```bash

```
```bash

```
```bash

```
```bash

```
```bash

```
```bash

```
```bash

```
```bash

```



# Calm down. To be continued