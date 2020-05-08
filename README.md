
# Shop Manager

A simple demonstration of a rest API with Laravel

## installing the application

First pull the git repository.

`$ git clone https://github.com/jesse-greathouse/shop-manager.git`

Switch to the shop-manager directory

`$ cd shop-manager`

Copy the environment file.

`$ cp .env.example .env`

Now that you have your environment file set up, open your environment file and update the MySQL configs to work in your local environment.

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

You can import the environment files by clicking on the cog-wheel in the upper right-hand corner of Postman.
  ![Click the cog-wheel](https://i.imgur.com/hd5yV3T.png)

Then click the import button.
![Click the import button](https://i.imgur.com/6mrqw2n.png)

Import the environment files:
* shop-manager-local.postman_environment.json
* shop-manager-production.postman_environment.json

![Import the environment files](https://i.imgur.com/Y8yRUv9.png)

Click the import button in the upper-right portion of Postman
![Click the import button](https://i.imgur.com/k3odekO.png)

Under the "Import File" tab, click Choose Files.

![Click Choose Files](https://i.imgur.com/Ch7pGus.png)

Import the collection:
* shop-manager.postman_collection.json

![Import the collection](https://i.imgur.com/mTZ9MAQ.png)

Now you can select the "shop-manager" workspace in postman, and you can also select the environment that you wish to use.

![select the collection](https://i.imgur.com/lIcntZ1.png)
![select your environment](https://i.imgur.com/ckbJjMz.png)

### Run requests

With the collection you imported into postman, you can make requests to any of the endpoints of the application. The requests in the collection already have pre-filled POST and PUT variables under the body tab.

![Send requests with pre-defined endpoints](https://i.imgur.com/oNn5q21.png)

  
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