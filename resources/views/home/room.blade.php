<style>
   .our_room {
       padding: 60px 0;
       background: #f8f9fa;
   }
   
   .room {
       margin-bottom: 30px;
       background: #fff;
       border-radius: 8px;
       box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
       transition: transform 0.3s ease;
   }
   
   .room:hover {
       transform: translateY(-5px);
   }
   
   .room_img {
       position: relative;
       width: 100%;
       height: 300px;
       overflow: hidden;
       border-radius: 8px 8px 0 0;
   }
   
   .room_img img {
       width: 100%;
       height: 100%;
       object-fit: cover;
       transition: transform 0.3s ease;
   }
   
   .room:hover .room_img img {
       transform: scale(1.05);
   }
   
   .bed_room {
       padding: 20px;
       text-align: center;
   }
   
   .bed_room h3 {
       margin-bottom: 15px;
       color: #333;
       font-size: 24px;
   }
   
   .bed_room p {
       color: #666;
       margin-bottom: 20px;
       line-height: 1.6;
   }
   
   .bed_room .btn-primary {
       padding: 10px 25px;
       border-radius: 25px;
       text-transform: uppercase;
       font-size: 14px;
       font-weight: 500;
       transition: all 0.3s ease;
   }
   
   .bed_room .btn-primary:hover {
       transform: translateY(-2px);
       box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
   }
   </style>
   
   <div class="our_room">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="titlepage">
                       <h2>Our Rooms</h2>
                   </div>
               </div>
           </div>
           
           <div class="row">
               @foreach($room as $rooms)
               <div class="col-md-4 col-sm-6">
                   <div id="serv_hover" class="room">
                       <div class="room_img">
                           <img src="room/{{$rooms->image}}" alt="{{$rooms->room_title}}"/>
                       </div>
                       <div class="bed_room">
                           <h3>{{$rooms->room_title}}</h3>
                           <p>{!! Str::limit($rooms->description,150) !!}</p>
                           <a class="btn btn-primary" href="{{url('room_details',$rooms->id)}}">Room Details</a>
                       </div>
                   </div>
               </div>
               @endforeach
           </div>
       </div>
   </div>