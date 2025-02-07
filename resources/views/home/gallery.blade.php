  
<div  class="gallery">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>gallery</h2>
             </div>
          </div>
       </div>
       <div class="row" >
         @foreach ($gallery as $item )
          <div class="col-md-4 col-sm-6">
            <div id="serv_hover" class="room">
             <div class="room_img">
                <img style=" object-fit: cover; height: 300px; width: 300px;" src="/gallery/{{$item->image}}" alt="#"/>
             </div>
            </div>
          </div>
           @endforeach
       </div>
    </div>
 </div>