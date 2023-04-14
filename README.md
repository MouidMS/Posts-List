<h1>Posts List</h1>

<p>This is a simple CRUD web application for managing posts.</p>

<h2>Installation</h2>

<p>To install the application, follow these steps:</p>

<ol>
  <li>Clone the repository: <code>git clone https://github.com/MouidMS/Posts-List.git</code></li>
  <li>Install dependencies: <code>composer install</code></li>
  <li>Create a database and update the <code>.env</code> file with your database credentials</li>
  <li>Run migrations: <code>php artisan migrate</code></li>
  <li>Start the server: <code>php artisan serve</code></li>
  <li>Visit <code>http://localhost:8000/posts</code> to view the list of posts</li>
</ol>

<h2>Usage</h2>

<p>To create a new post, click the "Create New Post" button on the Posts List page. Fill out the form and submit it to create the post.</p>

<p>To edit an existing post, click the "Edit" button next to the post you want to edit. Make your changes in the form and submit it to update the post.</p>

<p>To delete a post, click the "Delete" button next to the post you want to delete. Confirm that you want to delete the post when prompted.</p>

<p>To view the details of a post, click the "Show" button next to the post you want to view.</p>

<h2>List of Posts</h2>

<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Title</th>
      <th>Body</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>My First Post</td>
      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
      <td>
        <a href="#">Show</a>
        <a href="#">Edit</a>
        <a href="#">Delete</a>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>My Second Post</td>
      <td>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
      <td>
        <a href="#">Show</a>
        <a href="#">Edit</a>
        <a href="#">Delete</a>
      </td>
    </tr>
    <tr>
      <td>3</td>
      <td>My Third Post</td>
      <td>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
      <td>
        <a href="#">Show</a>
        <a href="#">Edit</a>
        <a href="#">Delete</a>
      </td>
    </tr>
  </tbody>
</table>
