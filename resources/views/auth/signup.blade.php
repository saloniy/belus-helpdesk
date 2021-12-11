@extends('layout/main')
@section('signup')
<!--form content -->
<div class="row">
    <div class="col d-flex justify-content-center">
        <div class="card login-card mt-3">
            <div class="card-body">
                <h5 class="card-title">Sign Up</h5>

                <form method="post" action="{{url('new-user-signup')}}" novalidate>
                    @if($errors->first('emailExists'))
                    <div class="alert alert-danger">{{$errors->first('emailExists')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Full Name" value="{{ old('name') }}">
                        @error('name')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address" value="{{ old('email') }}">
                        @error('email')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="tel" maxlength="10" name="contact" class="form-control @error('contact') is-invalid @enderror" id="contact" placeholder="Contact Number" value="{{ old('contact') }}">
                        @error('contact')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword" placeholder="Re-type Password" value="{{ old('cpassword') }}">
                        @error('cpassword')
                        <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
                <p class="mb-2 text-muted">Existing User? <a class="text-decoration-none" href="/">Log in</a> now!</p>
            </div>
        </div>
    </div>
</div>
<!-- form content ends -->
@endsection
