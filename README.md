# Fake Database API

The Fake Database API is a simulated API that provides a mock database with users, contacts, and messages. It is designed to assist developers in testing and prototyping applications that require database interactions without the need for a real production database.

## Features

This fake database API provides a read-only view of the data.

## Getting Started

To get started with the Fake Database API, follow these steps:

1. Clone the repository to your local development environment.

2. Install the required dependencies by running `composer update`.

3. Configure the database connection by updating the `.env` file with your database credentials.

4. Start the API server by running `php artisan serve`.

5. Run migrations and seed the database by running `php artisan migrate --seed`.

6. Once the server is running, you can research with the API using HTTP requests.

## API Endpoints

The Fake Database API provides the following endpoints:

- **User Endpoints**:
    - `GET /users`: Retrieve a list of all users.
    - `GET /users/:id`: Get details of a specific user.

- **Contact Endpoints**:
    - `GET /users/:userId/contacts`: Retrieve all contacts associated with a user.
    - `GET /users/:userId/contacts/:contactId`: Get details of a specific contact.

- **Message Endpoints**:
    - `GET /users/:userId/messages`: Retrieve all messages sent or received by a user.
    - `GET /users/:userId/messages/:messageId`: Get details of a specific message.

For detailed information on each endpoint, refer to the API documentation.

## Contributing

Contributions to the Fake Database API are welcome! If you have any suggestions, bug reports, or feature requests, please open an issue or submit a pull request to the repository.

## License

The Fake Database API is released under the [MIT License](https://opensource.org/licenses/MIT). You are free to use, modify, and distribute the code as per the terms of this license.

## Disclaimer

Please note that the Fake Database API is for testing and development purposes only. It does not provide real data persistence and should not be used in a production environment. Use at your own risk.
