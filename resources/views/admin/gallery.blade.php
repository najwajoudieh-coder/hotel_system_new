<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
    .myflex{
        display: flex;
        justify-content: center;
        align-items: center;
    }

     .alert {
        padding: 12px 16px; /* Adds spacing inside the box */
        width: 50%; /* Limits the width to 50% of the page */
        margin: 10px auto; /* Centers the message horizontally */
        border-radius: 5px; /* Slightly rounded corners */
        text-align: center; /* Centers the text */
        font-size: 16px; /* Increases readability */
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    </style>
  </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')
   <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
    <div style="text-align: center;">

      <div class="container text-center mt-4">
        <h2 class="mb-4" style="font-weight:bold; font-size: larger ">Gallery</h2>
      </div>
        <div class="row">
        @foreach ($gallery as $item)
        <div class="col-md-4" style="padding: 20px;">   
        <img class="myflex" style ="height: 200px!important; width: 300px;" src="/gallery/{{$item->image}}">
        <a style="margin: 20px" onclick="return confirm('Are you sure you want to delete this')" href="{{url('delete_gallery',$item->id)}}" class="btn btn-danger">Delete Image</a>
        </div>
        @endforeach
        </div>
        <form action="{{url('upload_gallery')}}" method="Post" enctype="multipart/form-data">
            @csrf
            <div style="padding: 30px;">
                <label style="color: white; font-weight: bolder;">Upload Image</label>
                <input type="file" name="image" required>

                <input class ="btn btn-primary"type="submit" value="Add Image">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @endif
        
              @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
              @endif
              <script>
                  setTimeout(function() {
                  document.querySelectorAll('.alert').forEach(alert => alert.style.display = 'none');
                  }, 3000);
              </script>
            </div>
        </form>
    </div>
      </div>
    </div>
   </div>

        @include('admin.footer')
  </body>
</html>