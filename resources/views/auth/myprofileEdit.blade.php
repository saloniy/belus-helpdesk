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
                                <h4></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-8">
            <form method="post" action="{{url('profile-save')}}">
                @csrf
                <div class="card mb-3">
                    <div class="card-body">
                        @if($errors->first('emailExists'))
                            <div class="alert alert-danger">{{$errors->first('emailExists')}}</div>
                        @endif
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="name" class="form-control" readonly value="{{$d->name}}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password') ? old('password') : $d->password}}">
                                @error('password')
                                <div class="error-msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" @if(session()->get('CSRcheck')) readonly @endif name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') ? old('email') : $d->email}}">
                                @error('email')
                                <div class="error-msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" maxlength="10" value="{{old('contact') ? old('contact') : $d->contact}}">
                                @error('contact')
                                <div class="error-msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="address" class="form-control" value="{{$d->address}}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    @endforeach
@endsection

