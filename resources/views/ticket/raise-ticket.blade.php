@extends('layout/main')
@section('raiseTicket')
<div class="container-fluid app-container min-vh-100">
    <h2 class="text-center">Customer Raise Ticket Form</h2>
    <!--form content -->
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Issue Summary</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Issue Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputName4" class="form-label">Name</label>
            <input type="name" class="form-control" id="inputName4">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-12">
            <label for="inputContactNum" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="inputContactNum" placeholder="">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address </label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit Ticket</button>
        </div>
    </form>
    <!-- form content ends -->
</div>
@endsection
