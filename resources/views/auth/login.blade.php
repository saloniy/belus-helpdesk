@extends('layout/main')
@section('login')
<!--form content -->
<div class="row">
    <div class="col">
        <div class="card login-card mt-3">
            <div class="card-body">
                <h5 class="card-title">Login</h5>
                <ul class="nav nav-tabs my-3" id="loginTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="customer-tab" data-bs-toggle="tab" data-bs-target="#customer" type="button" role="tab" aria-controls="customer" aria-selected="true">Customer</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="support-tab" data-bs-toggle="tab" data-bs-target="#support" type="button" role="tab" aria-controls="support" aria-selected="true">Support Representative</button>
                    </li>
                </ul>
                <div class="tab-content" id="loginTabContent">
                    <div class="tab-pane fade show active" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                        <form method="post" action="login">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Email Address">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </form>
                        <p class="mb-2 text-muted">New User with Belus? <a class="text-decoration-none" href="/signup">Sign up</a> now!</p>
                    </div>
                    <div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab">
                        <form method="post" action="login">
                            <div class="mb-3">
                                <label for="id" class="form-label">Employee ID</label>
                                <input type="text" class="form-control" id="id" placeholder="Employee ID">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form content ends -->
@endsection
