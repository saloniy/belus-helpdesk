@extends('layout/main')
@section('myProfile')

<div class="row gutters-sm mt-3">
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">

                    <div class="mt-3">
                        @foreach($data as $d)
                        <h4>{{$d->name}}</h4>
                        <p class="text-muted font-size-sm">{{$d->address}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
                @foreach($data as $d)
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$d->name}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        ********
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$d->email}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$d->contact}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$d->address}}
                    </div>
                </div>
                @endforeach
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <a class="btn btn-primary" href="{{url('profile-edit')}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

