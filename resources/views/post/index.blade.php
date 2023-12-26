<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Blog Site</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        body {
            padding-top: 56px; /* Adjusted for fixed navbar */
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            height: 100%; /* Make the card body height 100% */
        }
        .card:hover {
            transform: scale(1.05);
        }
        footer {
            background-color: #f8f9fa;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand  font-weight-bold font-size-3" href="#">Personal Blog</a>
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

    <!-- Cards -->
    <div class="container mt-5">
        @if(session('success'))
        <div class="  alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
        @endif
        <div class=" d-flex  justify-content-between">
            <div></div>
            <a class="btn btn-primary mb-2" href="{{route('post.create')}}">Create Post</a>
        </div>
        <div class="row">

            <!-- Card 1 -->
          
            @foreach ($posts as $post)
            <?php 
            $limitedDescription = Str::limit($post->description, 300);
            $limitedTitle = Str::limit($post->title, 55);
 
            ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body align-items-center justify-content-center">
                        <h4 class="card-title">{{$limitedTitle}}</h4>
                        <p class="card-text">{{$limitedDescription}}</p>
                        <div class="d-flex  justify-content-between">
                        <p class="card-text"><small class="text-muted">{{$post->author}} | {{$post->category}}</small></p>

                        <div> @if ($post->created_at->isToday())
                            Today
                        @elseif ($post->created_at->isYesterday())
                            Yesterday
                        @else
                            {{$post->created_at->format('j F Y')}}
                        @endif
                         </div>
                        </div>
                
                        <div class="d-flex justify-content-between">
                            <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">আরো দেখুন</a>
                            <div class="d-flex ">
                                <div><a class="text-decoration-none " href="{{route('post.edit',$post->id)}}">Edit&nbsp;|&nbsp;</a></div>
                                <div ><form action="{{route('post.destroy',$post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="text-decoration-none" href=""type="submit" >Delete</a>
                                  </form></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5 py-3 text-center">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>
    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 3000); // 5000 milliseconds = 5 seconds
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
