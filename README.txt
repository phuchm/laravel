* Note: Current OS: Ubuntu 16.0x.1 64bit LTS
- Install php modules:
    sudo apt-get install php7.0-cli php-mbstring php-dom

- Install nodejs:
    curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
    sudo apt-get install -y nodejs

- Upgrade node:
    wget https://nodejs.org/dist/v7.9.0/node-v7.9.0-linux-x64.tar.xz
    sudo apt-get install xz-utils
    sudo tar -C /usr --strip-components 1 -xJf node-v7.9.0-linux-x64.tar.xz

- Run this in your terminal to get the latest Composer version:
    +) Download the installer to the current directory:
        php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    +) Verify the installer SHA-384:
        php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    +) Run the installer to install to current directory:
        php composer-setup.php
    +) Remove the installer:
        php -r "unlink('composer-setup.php');"
    +) After the Composer is installed, check the installation by command line:
        ./composer.phar

- Link composer to use everywhere:
    sudo mv composer.phar /usr/bin/composer

- How to create a new project:
    composer create-project laravel/laravel name-of-your-project --prefer-dist

- Install all dependencies
    composer install

- Run project:
    php artisan serve

- If you get an error: The only supported ciphers are AES-128-CBC and AES-256-CBC with the correct key lengths.
    php artisan key:generate
    php artisan config:clear
And then run again: php artisan serve

- Start maintainance mode:
    php artisan down

- Stop maintenance mode:
    php artisan up

- Config database:
    +) Update DB_DATABASE, DB_USERNAME and DB_PASSWORD in .env file
    +) Select mysql engine: sqlite, mysql, pgsql, ... in "connections" tag and then update database username, password in config/database.php file

- Create a table in database:
    php artisan make:migration create_examples_table
    a. Create attributes for ORM (in file "create_examples_table.php" of folder "database/migrations"):
    public function up()
    {
        Schema::create('examples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->string('position');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('examples');
    }
    b. To migrate: php artisan migrate
    c. Prevent SQL Injection
        => Using Laravel Raw Queries. For Ex:
            $someVariable = Input::get("some_variable");
            $results = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = :somevariable"), array(
                'somevariable' => $someVariable,
            ));

- Create a controller:
    php artisan make:controller Examples
=> Defines method corresponding to routes in below

- Create a model:
    php artisan make:model Example
=> In file Example.php of folder "app": protected|public $fillable = array('id', 'name', 'email', 'contact_number', 'position');

- Config routes (in file "web.php" of folder "routes"):
For examples:
Route::get('/api/examples/{id?}', 'Examples@index');
Route::post('/api/examples', 'Examples@store');
Route::post('/api/examples/{id}', 'Examples@update');
Route::delete('/api/examples/{id}', 'Examples@destroy');

- Debug:
a. Using Laravel Logger
\Log::debug('Data');
\Log::info('Notification message');
\Log::warning('Warning message');
\Log::error('Error message');
\Log::critical('Critical error message');
b. Using dd() function
c. Using Laravel Debugbar
    + Install: composer require barryvdh/laravel-debugbar
    + Config (in file "config/app.php"):
        'providers' => [
            ...
            Barryvdh\Debugbar\ServiceProvider::class,
        ]
        'aliases' => [
            ...
            'Debugbar'  => Barryvdh\Debugbar\Facade::class,
        ]

- Unit Test:
a. To create a Test file: php artisan make:test ExampleTest
b. To run UT: ./vendor/bin/phpunit

- Note: Resolve conflict between AngularJS and Blade
=> Use $interpolateProvider to change syntax when using variables:
var myApp = angular.module('your_app', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
