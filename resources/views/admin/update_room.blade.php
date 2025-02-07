<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
    label{
        display: inline-block;
        width: 200px;
    }
    .div_design{
       padding-top: 30px;
    }
    .div_center{
       text-align: center;
       padding-top: 40px;
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
      <div class= "div_center">
        <h1 style="font-size: 30px; font-weight: bold;">Update Rooms</h1>
        <form action ="{{url('edit_room',$data->id)}}" method ="Post" enctype="multipart/form-data">
            @csrf <!--for image upload-->
            <div class="div_design">
                <label>Room Title</label>
                <input type="text" name="title" value="{{$data->room_title}}">
            </div>
            <div class="div_design">
                <label>Description</label>
                <textarea name="description">{{$data->description}} </textarea><!--displaying the description in the textarea-->
            </div>
            <div class="div_design">
                <label>Price</label>
                <input type="number" name="price" value="{{$data->price}}"> <!--displaying the price in the input field-->
            </div>
            <div class="div_design">
            <label>Room Type</label>
                
            
            <select name="type">
                <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                    <option  value="regular">Regular</option>
                    <option value="premuim">Premuim</option>
                    <option value="deluxe">Deluxe</option>
            </select>
            </div>
            <div class="div_design">
                <label>Free Wifi</label>
                <select name="wifi">
                    <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>

                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="div_design">
                <label>Current Image</label>
               <img style ="margin: auto;" width = "100" src = "room/{{$data->image}}"><!--displaying the current image--> 
            </div>
            <div class="div_design">
                <label>Upload Image</label>
                <input type= "file" name="image">
            </div>
            <div class="div_design">
                <input class= "btn btn-primary" type="submit" value="Update Room">
            </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <script>
        // Auto-close alert after 3 seconds
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.classList.remove('show');  // Removes Bootstrap's "show" class for fading out
                alert.classList.add('fade');  // Ensures smooth transition
                setTimeout(() => alert.remove(), 500);  // Removes the alert completely after fade-out
            });
        }, 3000);
    </script>
        </form>
      </div>
      </div>
    </div>
   </div>
   @include('admin.footer')
  </body>
</html>