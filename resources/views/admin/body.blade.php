<div class="page-content">

  <div class="container text-center mt-4">
      <h1 class="mb-4" style="font-weight:bold; font-size: larger ">Admin Dashboard</h1>
      <div class="row justify-content-center">
          <!-- Total Users -->
          <div class="col-lg-3 col-md-6 mb-4">
              <div class="card text-white shadow-lg" style="background: linear-gradient(45deg, #007bff, #0056b3);">
                  <div class="card-body">
                      <h4 class="fw-bold">Total Users</h4>
                      <p class="display-6 fw-bold">{{ $userCount }}</p>
                  </div>
              </div>
          </div>

          <!-- Total Rooms -->
          <div class="col-lg-3 col-md-6 mb-4">
              <div class="card text-white shadow-lg" style="background: linear-gradient(45deg, #28a745, #218838);">
                  <div class="card-body">
                      <h4 class="fw-bold">Total Rooms</h4>
                      <p class="display-6 fw-bold">{{ $roomCount }}</p>
                  </div>
              </div>
          </div>

          <!-- Total Bookings -->
          <div class="col-lg-3 col-md-6 mb-4">
              <div class="card text-white shadow-lg" style="background: linear-gradient(45deg, #dc3545, #a71d2a);">
                  <div class="card-body">
                      <h4 class="fw-bold">Total Bookings</h4>
                      <p class="display-6 fw-bold">{{ $bookingCount }}</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
