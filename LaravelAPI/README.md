## Application Endpoint
[http://35.153.44.149/api](http://35.153.44.149/api)

## API Endpoints/Routes
| HTTP Method	| Path | Action | Description |
| --- | --- | --- |-----------|
| GET | / | index | No action |
| GET | /{name} | showByName | Get a person by name |
| GET | /{id} | showById | Get a person by id |
| POST | / | store | Create a new person |
| PUT | /{name} | editByName | Update a person by name |
| PUT | /{id} | editById | Update a person by id |
| DELETE | /{name} | deleteByName | Delete a person by name |
| DELETE | /{id} | deleteById | Delete a person by id |


<h2> Setup Instructions </h2>

To set up the project locally, follow the steps below:

1. Clone the repository to your local machine
```text
git clone https://github.com/Cidscapital/HNGX.git
```
2. Change directory into the project folder
```text
cd HNGX
```
3. Install dependencies
```text
composer install
```
4. Create a copy of the .env file
```text
cp .env.example .env
```
5. Generate an app encryption key
```text 
php artisan key:generate
```
6. Create an empty database for the application
7. In the .env file, add database information to allow Laravel to connect to the database
8. Migrate the database
```text
php artisan migrate
```
9. Start the local development server
```text
php artisan serve
```

You can now access the server at http://localhost:8000


## About LaravelAPI

This is a simple API that performs CRUD operations on a person resource. The API was built using the Laravel framework.

## Documentation
[API Documentation](DOCUMENTATION.md)



## Security Vulnerabilities

If you discover a security vulnerability within this project, please send an e-mail to Jesse Jason via [jesse.jason2002@gmail.com](mailto:jesse.jason2002@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
