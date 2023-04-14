# Posts List

This is a web application that allows users to create, view, edit, and delete posts.

## Installation

1. Clone the repository to your local machine.
2. Install the required dependencies using `composer install`.
3. Create a new database for the application.
4. Copy the `.env.example` file to `.env` and update the `DB_*` variables to match your database configuration.
5. Run the database migrations using `php artisan migrate`.
6. Start the development server using `php artisan serve`.

## Usage

1. Open the application in your web browser at http://localhost:8000.
2. Log in or register a new account.
3. From the home page, you can view a list of all posts. You can also click the "Create New Post" button to create a new post.
4. To view, edit, or delete a post, click the corresponding buttons next to the post in the list.
5. To view a list of deleted posts, click the "Trashed Posts" button at the top of the page. From there, you can restore or permanently delete individual posts.

## Contributing

Contributions are welcome! If you find a bug or would like to suggest an improvement, please open an issue or submit a pull request.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.
