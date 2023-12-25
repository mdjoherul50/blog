<!-- resources/views/posts/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Set your desired background color */
        }
        .container {
            background-color: #ffffff; /* Set your desired background color for the form container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand " href="{{route('post.index')}}">Personal Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2 class="mb-4">Create Post</h2>

        <form action="{{ route('post.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="ICT">ICT</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="World War">World War</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>

          

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
    <footer class="mt-5 py-3 text-center">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
