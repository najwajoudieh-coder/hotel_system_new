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


        <div style="text-align: center;">
            <h1 style="font-size: 30px; font-weight: bold;">Mail Send to {{$data->name}}</h1>
            <form action ="{{url('mail',$data->id)}}" method ="Post">
                @csrf 
                <div class="div_design">
                    <label>Greeting</label>
                    <input type="text" name="greeting" required>
                </div>
                <div class="div_design">
                    <label>Mail Body</label>
                    <textarea name="body"></textarea>
                </div>
                <div class="div_design">
                    <label>Action Text</label>
                    <input type="text" name="action_text">
                </div>
                
                <div class="div_design">
                    <label>Action Url</label>
                    <input type="text" name="action_url">
                </div>
                
                <div class="div_design">
                    <label>End Line</label>
                    <input type="text" name="endline" required>
                </div>
            
                <div class="div_design">
                    <input class= "btn btn-primary" type="submit" value="Send Mail">
                </div>
{{-- for the display of the success message --}}
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

            </form>
        </div>

      </div>
    </div>
   </div>
        @include('admin.footer')
  </body>
</html>