@extends("layouts.base")

@section("body")
<!-- Display Vehicles -->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Vehicle Type</th>
      <th scope="col">VIN/HIN</th>
      <th scope="col">Date Entered</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($boats as $boat)
        <tr>
            <th scope="row">Boat</th>
            <td>{{ $boat->hin }}</td>
        </tr>
    @endforeach

    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>



<!-- Add Vehicle -->
<div class="card">
    <button data-toggle="modal" data-target="#add_vehicle">
        Add Vehicle
    </button>
</div>

<div class="modal fade" id="add_vehicle" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form vehicle-form" method="POST">
                    @csrf
                    <label for="vehicle_type">Vehicle Type</label>
                    <select class="custom-select" name="vehicle_type">
                        <option value="" default>Choose One</option>
                        <option value="car">Car</option>
                        <option value="boat">Boat</option>
                        <option value="truck">Truck</option>
                    </select>

                    <!-- Car -->
                    <div class="form-group" vehicle="car">
                        <label for="make">Make</label>
                        <input type="text" name="make" placeholder="Make" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="car">
                        <label for="model">Model</label>
                        <input type="text" name="model" placeholder="Model" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="car">
                        <label for="year">Year</label>
                        <input type="number" name="year" placeholder="Year" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="car">
                        <label for="seats">Seats</label>
                        <input type="number" name="seats" placeholder="Seats" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="car">
                        <label for="color">Color</label>
                        <input type="text" name="color" placeholder="Color" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="car">
                        <label for="vin">VIN</label>
                        <input type="text" name="vin" placeholder="VIN" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="car">
                        <label for="current_mileage">Current Mileage</label>
                        <input type="text" name="current_mileage" placeholder="Current Mileage" class="form-control" />
                    </div>


                    <div class="form-group" vehicle="car">
                        <label for="service_interval">Service Interval</label>
                        <input type="number" name="service_interval" placeholder="Service Interval"
                            class="form-control" />
                    </div>

                    <div class="form-group" vehicle="car">
                        <label for="next_service">Next Service</label>
                        <input type="date" name="next_service" placeholder="Next Service" class="form-control" />
                    </div>

                    <!-- Truck -->
                    <div class="form-group" vehicle="truck">
                        <label for="make">Make</label>
                        <input type="text" name="make" placeholder="Make" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="truck">
                        <label for="model">Model</label>
                        <input type="text" name="model" placeholder="Model" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="truck">
                        <label for="year">Year</label>
                        <input type="number" name="year" placeholder="Year" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="truck">
                        <label for="seats">Seats</label>
                        <input type="number" name="seats" placeholder="Seats" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="truck">
                        <label for="bed_length">Bed Length</label>
                        <input type="text" name="bed_length" placeholder="Bed Length" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="truck">
                        <label for="color">Color</label>
                        <input type="text" name="color" placeholder="Color" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="truck">
                        <label for="vin">VIN</label>
                        <input type="text" name="vin" placeholder="VIN" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="truck">
                        <label for="current_mileage">Current Mileage</label>
                        <input type="text" name="current_mileage" placeholder="Current Mileage" class="form-control" />
                    </div>


                    <div class="form-group" vehicle="truck">
                        <label for="service_interval">Service Interval</label>
                        <input type="number" name="service_interval" placeholder="Service Interval"
                            class="form-control" />
                    </div>

                    <div class="form-group" vehicle="truck">
                        <label for="next_service">Next Service</label>
                        <input type="date" name="next_service" placeholder="Next Service" class="form-control" />
                    </div>

                    <!-- Boat -->
                    <div class="form-group" vehicle="boat">
                        <label for="make">Make</label>
                        <input type="text" name="make" placeholder="Make" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="boat">
                        <label for="model">Model</label>
                        <input type="text" name="model" placeholder="Model" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="boat">
                        <label for="year">Year</label>
                        <input type="number" name="year" placeholder="Year" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="boat">
                        <label for="length">Length</label>
                        <input type="number" name="length" placeholder="Length" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="boat">
                        <label for="width">Width</label>
                        <input type="number" name="width" placeholder="Width" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="boat">
                        <label for="hin">HIN</label>
                        <input type="text" name="hin" placeholder="HIN" class="form-control" />
                    </div>

                    <div class="form-group" vehicle="boat">
                        <label for="current_hours">Current Hours</label>
                        <input type="text" name="current_hours" placeholder="Current Hours" class="form-control" />
                    </div>


                    <div class="form-group" vehicle="boat">
                        <label for="service_interval">Service Interval</label>
                        <input type="number" name="service_interval" placeholder="Service Interval"
                            class="form-control" />
                    </div>

                    <div class="form-group" vehicle="boat">
                        <label for="next_service">Next Service</label>
                        <input type="date" name="next_service" placeholder="Next Service" class="form-control" />
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary add-vehicle-submit">Add Vehicle</button>
            </div>
        </div>
    </div>
</div>

@push("js")
    <script src="{{ asset('js/helpers.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
@endsection