<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      @include('home.css')
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
.room {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    overflow: hidden;
}

#serv_hover:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}

.room_img {
    padding: 20px;
    display: flex;
    justify-content: center;
    background: #f8f9fa;
}

.room_img img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.room_img img:hover {
    transform: scale(1.02);
}

.bed_room {
    padding: 25px;
}

.bed_room h3 {
    color: #333;
    font-size: 24px;
    margin-bottom: 15px;
    font-weight: 600;
}

.bed_room p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 16px;
}

.bed_room h4 {
    color: #555;
    font-size: 18px;
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}


        label
        {
            display: inline-block;
            width: 200px;
        }
        input{
            width:100%;
        }

    </style>
   </head>

   <body class="main-layout">

      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>

   <header>
    @include('home.header')
   </header>
   <div  class="our_room">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Room</h2>
             </div>
          </div>
       </div>
       <div class="row">
        <div class="col-md-8">
            <div id="serv_hover" class="room">
                @if (!empty($room->image))
                    <div class="room_img">
                        <img src="/room/{{$room->image}}" alt="Room Image"/>
                    </div>
                @endif
                
                <div class="bed_room">
                    @if (!empty($room->room_title))
                        <h3>{{ $room->room_title }}</h3>
                    @endif
                    
                    @if (!empty($room->description))
                        <p>Description: {{ $room->description }}</p>
                    @endif
                    
                    @if (!empty($room->price))
                        <h3>Price: {{ $room->price }}</h3>
                    @endif
                    
                    @if (!empty($room->wifi))
                        <h4>Free Wifi: {{ $room->wifi }}</h4>
                    @endif
                    
                    @if (!empty($room->room_type))
                        <h4>Room Type: {{ $room->room_type }}</h4>
                    @endif
                </div>
            </div>
        </div>
          <div class="col-md-4">
            <div>
            @if(session()->has('message'))
            <div class = "alert alert-success"> 
            <button type="button" class="close" data-bs-dismiss="alert">X</button>
                {{session()->get('message')}}  
            </div> 
            @endif
            </div>
            <h1 style="font-size: 40px!important;">Book Room</h1>

            
           
            {{-- if there is any error in the date validation then it will take us here and we will show the error to the user  --}}
            @if($errors)

            @foreach ($errors->all() as $errors )
               <li style="color: red">
                  {{$errors}}
               </li>
            @endforeach

            @endif

            
            @if (!empty($room) && !empty($room->id))
                <form action="{{ url('add_booking', $room->id) }}" method="POST">
             @csrf
               <div> 
                   <label>Name</label>
                   <input type="text" name="name"
                       @if(Auth::id()) value="{{ Auth::user()->name }}" 
                       @else required 
                       @endif>
               </div>
           
               <div>
                   <label>Email</label>
                   <input type="email" name="email"
                       @if(Auth::id()) value="{{ Auth::user()->email }}" 
                       @else required 
                       @endif>
               </div>
           
               <div>
                   <label>Phone</label>
                   <input type="number" name="phone"
                       @if(Auth::id()) value="{{ Auth::user()->phone }}" 
                       @else required 
                       @endif>
               </div>
           
               <div>
                   <label>Start Date</label>
                   <input type="date" name="startDate" id="startDate" required>
               </div>
           
               <div>
                   <label>End Date</label>
                   <input type="date" name="endDate" id="endDate" required>
               </div>
           
               <div style="padding: 20px">
                   <input type="submit" style="background-color: skyblue" class="btn btn-primary" value="Book Room">
               </div>
           </form>
           @endif
        </div>

    </div>
 </div>
   </div>

     @include('home.footer')
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      
     <script type="text/javascript">
        $(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
         day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#startDate').attr('min', maxDate);
        $('#endDate').attr('min', maxDate);
     });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
   </body>
</html>