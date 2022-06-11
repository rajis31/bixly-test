@extends("layouts.base")

@section("body")

<div class="col-lg-6 offset-lg-3 align-items-center d-flex" style="height: 100vh;">
    <div class="row col-12 justify-content-center">
    <form class="w-100"> 
      @csrf
    <h3> Register </h3>
    <div class="form-group">
            <label for="username">Username</label>
            <input type="email" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Enter assword">
    </div>
    <div class="form-group">
        <label for="password_confirm"> Confirm Password</label>
        <input type="password_confirm" class="form-control" placeholder="Confirm Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    </div>
</div>

@endsection
