<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
    .table_design{
        border: 2px solid white;
        width: 80%;
        margin:auto;
        text-align: center;
        margin-top: 40px;
    }
    .th_design{
        background-color: rebeccapurple;
        padding: 15px;
    }
    tr{
        border: 3px solid white;
    }
    td {
        padding: 10 px;
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

        <div class="container text-center mt-4">
          <h2 class="mb-4" style="font-weight:bold; font-size: larger ">Display Rooms</h2>
        </div>
        <table class="table_design"><!--table to display rooms-->
            <tr>
                <th class="th_design">Room Title</th>
                <th class="th_design">Description</th>
                <th class="th_design">Price</th>
                <th class="th_design">Free Wifi</th>
                <th class="th_design">Room Type</th>
                <th class="th_design">Image</th>
                <th class="th_design">Delete</th>
                <th class="th_design">Update</th>
            </tr>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->room_title }}</td>
                <td>{!! Str::limit($item->description, 150) !!}</td>
                <td>{{ $item->price }} $</td>
                <td>{{ $item->wifi }}</td>
                <td>{{ $item->room_type }}</td>
                <td><img src="room/{{ $item->image }}" style="width: 100px; height: 100px;"></td>
                <td>
                    <a onclick="return confirm('Are you sure you want to delete this')" class="btn btn-danger" href="{{ url('room_delete', $item->id) }}">Delete</a>

                </td>
                <td>
                    <a class="btn btn-warning" href="{{ url('room_update', $item->id) }}">Update</a>
                </td>
            </tr>
        @endforeach
        </table>
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
    </div>
   </div>
    @include('admin.footer')
  </body>
</html>