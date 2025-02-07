<!DOCTYPE html>
<html>
  <head> 
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
        <div class="container text-center mt-4">
            <h2 class="mb-4" style="font-weight:bold; font-size: larger ">Add Rooms</h2>
          </div>
        <form action ="{{url('add_room')}}" method ="Post" enctype="multipart/form-data">
            @csrf <!--for image upload-->
            <div class="div_design">
                <label>Room Title</label>
                <input type="text" name="title" required>
            </div>
            <div class="div_design">
                <label>Description</label>
                <textarea name="description" required></textarea>
            </div>
            <div class="div_design">
                <label>Price</label>
                <input type="number" name="price" required>
            </div>
            <div class="div_design">
                <label>Room Type</label>
                <select name="type">
                    <option selected value="regular">Regular</option>
                    <option value="premuim">Premuim</option>
                    <option value="deluxe">Deluxe</option>
                </select>
            </div>
            <div class="div_design">
                <label>Free Wifi</label>
                <select name="wifi">
                    <option selected value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="div_design">
                <label>Upload Image</label>
                <input type= "file" name="image" required>
            </div>
            <div class="div_design">
                <input class= "btn btn-primary" type="submit" value="Add Room">
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