<div class="d-flex align-items-stretch">
  <style>
.avatar {
    width: 3%;  /* Adjust the size as needed */
    height: 3%;
    overflow: hidden; /* Hide any overflowing parts */
    display: flex;
    justify-content: center;
    background-color: #fff; /* Optional: ensures a clean background */
    border: 2px solid #ddd; /* Optional: Adds a subtle border */
}

.avatar img {
    width: 100%;  /* Ensure it covers the whole container */
    height: 100%;
    object-fit: contain; /* Ensures the image fully fills the circle */
}

</style>
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="Avatar">
            <img src="/images/royal_new.jpeg" alt="Circular Image">
        </div></div>
      <ul class="list-unstyled">
             <li><a href="{{url('home')}}"> <i class="icon-home"></i>Home</a></li>
              <li><a href="{{url('users')}}"> <i class="icon-home"></i>Users</a></li>
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('create_room')}}">Add Rooms</a></li>
                  <li><a href="{{url('view_room')}}">Display Rooms</a></li>
                </ul>
              </li>
              <li><a href="{{url('bookings')}}"> <i class="icon-home"></i>Bookings</a></li>
              <li><a href="{{url('view_gallery')}}"> <i class="icon-home"></i>Gallery</a></li>
              <li><a href="{{url('all_messages')}}"> <i class="icon-home"></i>Messages</a></li>
      </ul>
    </nav>