<!DOCTYPE html>
<html>
  <head> 
    
    @include('admin.css')
    <style type="text/css">
 .table_design{
        border: 2px solid white;
        width: 100%;
        margin:auto;
        text-align: center;
        margin-top: 40px;
    }
    .th_design{
        background-color: rebeccapurple;
        padding: 8px;
    }
    tr{
        border: 3px solid white;
    }
    td {
        padding: 10 px;
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
            <h2 class="mb-4" style="font-weight:bold; font-size: larger ">Bookings</h2>
        </div>
   <table class="table_design"><!--table to display rooms-->
    <tr>
        <th class="th_design">Room_id</th>
        <th class="th_design">Customer Name</th>
        <th class="th_design">Email</th>
        <th class="th_design">Phone</th>
        <th class="th_design">Status</th>
        <th class="th_design">Arrival_Date</th>
        <th class="th_design">Leaving_Date</th>
        <th class="th_design">Room Title </th>
        <th class="th_design">Price</th>
        <th class="th_design">Image</th>
        <th class="th_design">Delete</th>
        <th class="th_design">Status Update</th>
       
    </tr>
    
    @foreach($data as $item )
    <tr>
        <td>{{$item->room_id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->phone}}</td>
        {{-- here we are putting conditions and styles for the Approved or Rejected or waiting status --}}
        <td>
            @if($item->status == 'approved')
            <span style="color: green;">{{$item->status}}</span>
            @elseif($item->status == 'rejected')
            <span style="color: red;">{{$item->status}}</span>
            @else
            <span style="color: skyblue;">{{$item->status}}</span>
            @endif
            
        </td>
        <td>{{$item->start_date}}</td>
        <td>{{$item->end_date}}</td>
       {{-- Check if room exists before trying to access its properties --}}
    <td>
        @if($item->room)
            {{$item->room->room_title}}
        @else
            No room assigned
        @endif
    </td>

    <td>
        @if($item->room)
            {{$item->room->room_type}}
        @else
            No room type available
        @endif
    </td>
    <td>
        @if($item->room && $item->room->image)
            <img style="width: 200px;" src="/room/{{$item->room->image}}">
        @else
            No image available
        @endif
    </td>
        <td><a  onclick="return confirm('Are you sure you want to delete this?');"class ="btn btn-danger "href="{{url('delete_booking',$item->id)}}">Delete</a></td>
        <td>
            <span style="padding-bottom: 10px";>
            <a class ="btn btn-success" href="{{url('approve_booking', $item->id)}}">Approved</a>
            </span>
            <span style="padding-bottom: 10px";>
            <a class ="btn btn-warning" href="{{url('reject_booking',$item->id)}}">Rejected</a>
            </span>
        </td>   
        {{-- here after we maintained a connection we took the room-title from the room table --}}
    </tr>
    @endforeach
</table>
      </div>
    </div>
   </div>
     @include('admin.footer')
  </body>
</html>