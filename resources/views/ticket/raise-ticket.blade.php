@extends('layout/main')
@section('raiseTicket')
<div class="container mt-3">
    <h2 class="text-center"> Raise Ticket </h2>
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message')}}
        </div>
    @endif
    <!--form content -->

    <form action="{{url('raise-ticket')}}" method="post" class="row g-3">
        @csrf
        <div class="mb-3">
            <label for="summary" class="form-label">Issue Summary</label>
            <textarea class="form-control" name="summary" id="summary" rows="2"></textarea>
        </div>
        @error('summary')
        <div class="alert-danger">{{$errors->first('summary')}}</div>
        @enderror
        <div class="mb-3">
            <label for="description" class="form-label">Issue Description</label>
            <textarea class="form-control" name="description" id="description"  rows="3"></textarea>
        </div>
        @error('description')
        <div class="alert-danger">{{$errors->first('description')}}</div>
        @enderror
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{$email}}" name="email" class="form-control" id="email" readonly>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit Ticket</button>
        </div>
    </form>
    <!-- form content ends -->
</div>
@endsection
