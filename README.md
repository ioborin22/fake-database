# Fake Database API

The Fake Database API is a simulated API that provides a mock database with users, employers, posts, images, contacts, messages, products and orders. It is designed to assist developers in testing and prototyping applications that require database interactions without the need for a real production database.

## Features

This fake database API provides a read-only view of the data.

## Getting Started

To get started with the Fake Database API, follow these steps:

1. Clone the repository to your local development environment.

2. Install the required dependencies by running `composer update`.

3. Configure the database connection by updating the `.env` file with your database credentials.

4. Start the API server by running `php artisan serve`.

5. Run migrations and seed the database by running `php artisan migrate:fresh --seed`.

6. Once the server is running, you can research with the API using HTTP requests.

## API Endpoints

The Fake Database API provides the following endpoints:

- **User Endpoints**:
    - GET `/users`: Get a list of all users.
    - GET `/users/:id`: Get details of a user.
    - GET `/users`: Get all users (e.g., 100 users).
    - GET `/users/{id}`: Get user by ID (e.g., the first user).
    - GET `/users?page={number}&limit={quantity}`: Get users with pagination (e.g., 15 users per page).
    - GET `/users?limit={quantity}`: Get users without pagination (e.g., 30 users).

- **Employer Endpoints**:
    - GET `/employers`: Get a list of all employers.
    - GET `/employers/:id`: Get details of an employer.
    - GET `/employers`: Get all employers (e.g., 100 employers).
    - GET `/employers/{id}`: Get employer by ID (e.g., the first employer).
    - GET `/employers?page={number}&limit={quantity}`: Get employers with pagination (e.g., 15 employers per page).
    - GET `/employers?limit={quantity}`: Get employers without pagination (e.g., 30 employers).

- **Post Endpoints**:
    - GET `/posts`: Get a list of all posts.
    - GET `/posts/:id`: Get details of a post.
    - GET `/posts`: Get all posts.
    - GET `/posts/{id}`: Get post by ID (e.g., the first post).
    - GET `/posts?page={number}&limit={quantity}`: Get posts with pagination (e.g., 15 posts per page).
    - GET `/posts?limit={quantity}`: Get posts without pagination (e.g., 30 posts).

- **Image Endpoints**:
    - GET `/images`: Get a list of all images.
    - GET `/images/{id}`: Get image by ID (e.g., the first image).
    - GET `/images?page={number}&limit={quantity}`: Get images with pagination (e.g., 15 images per page).
    - GET `/images?limit={quantity}`: Get images without pagination (e.g., 30 images).

- **Contact Endpoints**:
    - GET `/contacts/{id}`: Get all contacts by ID (e.g., the first user, id=1).
    - GET `/contacts/{id}/added`: Get added contacts by ID (e.g., the first user, id=1).
    - GET `/contacts/{id}/blocked`: Get blocked contacts by ID (e.g., the first user, id=1).

- **Message Endpoints**:
    - GET `/messages/{id}`: Get all messages by ID (e.g., the first message, sender_id=1).
    - GET `/messages/{sender_id}/{receiver_id}`: Get messages between sender_id and receiver_id.
    - GET `/messages/{sender_id}/{receiver_id}?page={number}&limit={quantity}`: Get messages with pagination (e.g., 15 messages per page).

- **Product Endpoints**:
    - GET `/products`: Get a list of all products.
    - GET `/products/{id}`: Get product by ID (e.g., the first product).
    - GET `/products?page={number}&limit={quantity}`: Get products with pagination (e.g., 15 products per page).
    - GET `/products?limit={quantity}`: Get products without pagination (e.g., 30 products).

- **Order Endpoints**:
    - GET `/orders`: Get a list of all orders.
    - GET `/orders?page={number}&limit={quantity}`: Get orders with pagination (e.g., 15 orders per page).
    - GET `/orders?limit={quantity}`: Get orders without pagination (e.g., 30 orders).
    - GET `/orders/{id}`: Get order by ID (e.g., the first order, id=1).
    - GET `/orders/{id}?page={number}&limit={quantity}`: Get orders by User ID with pagination (e.g., 5 orders per page).
    - GET `/orders/{id}?limit={quantity}`: Get orders by User ID without pagination (e.g., 5 orders).

## Contributing

Contributions to the Fake Database API are welcome! If you have any suggestions, bug reports, or feature requests, please open an issue or submit a pull request to the repository.

## License

The Fake Database API is released under the [MIT License](https://opensource.org/licenses/MIT). You are free to use, modify, and distribute the code as per the terms of this license.

## Disclaimer

Please note that the Fake Database API is for testing and development purposes only. It does not provide real data persistence and should not be used in a production environment. Use at your own risk.
