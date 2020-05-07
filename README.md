# Shop Manager
A simple demonstration of a rest API with Laravel

## installing the application
First pull the git repository.
`$ git clone https://github.com/jesse-greathouse/shop-manager.git`

Switch to the site-manager directory
`$ cd site-manager`

## Running the application

### Migrations
To initialize the database first run the migrations.
`$ php artisan migrate`

### Seeding the data
To run the application with an already established database, you must first seed the database.
`$ php artisan db:seed`

## Start the Server
This application is for demonstration purposes. Simply run the development server.
`$ php artisan serve`

## Using the application

### Postman

It will be easiest to interact with the application via an http request client like [Postman](https://www.postman.com/).
You can [download Postman here](https://www.postman.com/downloads/).

### Import the workspace
In the root of the repository, you will see some files meant for importing into Postman.

Import the environment files:
    * shop-manager-local.postman_environment.json
    * shop-manager-production.postman_environment.json

Import the collection:
    * shop-manager.postman_collection.json

Now you can select the "shop-manager" workspace in postman, and you can also select the environment that you wish to use.

### Run requests
With the collection you imported into postman, you can make requests to any of the endpoints of the application. The requests in the collection already have pre-filled POST and PUT variables under the body tab.

## Testing the application

### Migrate the test database
The application comes equipped with its own database. It requires the use of Sqlite 3. Run the migrations with the following command.

`$ php artisan migrate:fresh --env=testing`

### Seeding the test database
It is not necessary to seed the test database because the tests do not depend on existing data. However if you would like to seed the test database, it is possible with the following command.

`$ php artisan db:seed --env=testing`

### Running the test
As long as the migrations have been ran on the test database, you can run the tests simply with the following command.
`$ php artisan test`