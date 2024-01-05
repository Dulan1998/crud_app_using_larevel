<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    @auth
    <p>Congrats you are login</p>
    <form action="/logout" method="post">
        @csrf
        <button>Log out</button>    
    </form>
    {{-- Create post section------------------------------------------------ --}}
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                  class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                  alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Create a new Post</h3>
      
                  <form class="px-md-2" action="/create-post" method="POST">
                      @csrf
                      
                      <div class="form-outline mb-4">
                          <input type="text" id="form3Example1q" class="form-control" name="title" />
                          <label class="form-label" for="form3Example1q">Post Title</label>
                      </div>
      
                      <textarea name="body" placeholder="body content..."></textarea>>
      
                      <button type="submit" class="btn btn-success btn-lg mb-1">Save Post</button>
      
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    {{-- section over---------------------------------------------- --}}

    <div style="border: 3px solid black; padding: 10px;">
        <h2>All Posts</h2> 
        @foreach($posts as $post)
        <div style="background-color: rgba(86, 251, 31, 0.588); padding:10px;margin:10px ;border-radius:7px" >   
            <h3>{{$post['title']}}</h3> 
            {{$post['body']}}
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}}" method="post">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div> 
        @endforeach         
    </div>    
    

    @else

    
    <div style="border: 3px solid black; padding: 10px;display: flex; justify-content: center; width: 800px; border-radius:10px; margin:10px ">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="form-group" style="width: 500px; padding:10px">
                <input name="name" type="text" placeholder="name" class="form-control">
            </div>    
            <div class="form-group" style="width: 500px; padding:10px">
                <input name="email" type="text" placeholder="email" class="form-control">
            </div>    
            <div class="form-group" style="width: 500px; padding:10px" >
                <input name="password" type="password" placeholder="password (min: 8digits)" class="form-control">
            </div>    
            
            
            <div style=" padding:10px">
            <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>

    <div style="border: 3px solid black; padding: 10px;display: flex; justify-content: center; width: 800px; border-radius:10px; margin:10px " >
        <h2>login</h2>
        <form action="/login" method="POST">
            @csrf
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-group" style="width: 500px; padding:10px">
                <input name="loginname" type="text" placeholder="name" class="form-control">
            </div>
            <div class="form-group" style="width: 500px; padding:10px">
                <input name="loginpassword" type="password" placeholder="password  " class="form-control">
            </div>
            <div style=" padding:10px">
                <button type="submit" class="btn btn-primary">log in</button>
            </div>
            
        </form>
    </div>    
    @endauth
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>