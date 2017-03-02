- How to create a new project:
    composer create-project laravel/laravel --prefer-dist
- Run project:
    php artisan serve
- Start maintainance mode:
    php artisan down
- Stop maintenance mode:
    php artisan up
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