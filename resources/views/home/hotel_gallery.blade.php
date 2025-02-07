<!DOCTYPE html>
<html lang="en">
   <head>
     @include('home.css')
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
   <style>.room {
      display: flex;
      flex-direction: column;
      height: 100%;
      margin-bottom: 15px;
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
         height: auto;
         object-fit: cover;
         transition: transform 0.3s ease;
     }
     
     .room:hover .room_img img {
         transform: scale(1.05);
     }
     .gallery .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center; /* Centers the items */
      margin: -5px;
  }
  
  .col-md-4,
  .col-sm-6 {
      padding: 5px;
     }
      </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
   <header>
     @include('home.header')
   </header>
   @include('home.gallery')

     @include('home.footer')
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
<!--here we took the css of index in our folder hotel template and paste it in this folder which will be the home for our page and we divided each sevtor of the html &css to a blade.php file in the home -->