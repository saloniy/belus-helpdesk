@extends('layout/main')
@section('signup')
<!--form content -->
<div class="row">
    <div class="col d-flex justify-content-center">
        <div class="card login-card mt-3">
            <div class="card-body">
                <h5 class="card-title">Sign Up</h5>

                <form method="post" action="signup">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email Address">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Mobile</label>
                        <input type="tel" class="form-control" id="contact" placeholder="Mobile Number">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" placeholder="Re-type Password">
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
