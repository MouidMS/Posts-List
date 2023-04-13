Laravel CRUD Application
This is a basic CRUD (Create, Read, Update, Delete) application built using Laravel. It allows you to create, read, update and delete posts.

Installation
Clone the repository
Run composer install
Create a copy of the .env.example file and rename it to .env
Update the database connection details in the .env file
Run php artisan key:generate
Run php artisan migrate to create the database tables
Run php artisan serve to start the application
Usage
Once the application is running, you can access it at http://localhost:8000.

List Posts
The home page displays a list of all the posts. If you are not logged in, you will be redirected to the login page.

Create Post
To create a new post, click the "Create New Post" button on the home page. This will take you to a form where you can enter the post title and body.

Edit Post
To edit an existing post, click the "Edit" button next to the post you want to edit. This will take you to a form where you can update the post title and body.

Delete Post
To delete a post, click the "Delete" button next to the post you want to delete. This will permanently delete the post from the database.

License
This project is licensed under the MIT License - see the LICENSE file for details.

Acknowledgments
This project was built following the Laravel CRUD tutorial on TutorialsPoint.
