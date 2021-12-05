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
                        <form method="post" action="{{url('login-user')}}" novalidate>
                            @csrf
                            @if($errors->first('noAccount'))
                                <div class="alert alert-danger" id="noAccount">{{$errors->first('noAccount')}}</div>
                            @endif
                            <input type="hidden" name="isCustomer" value="1"/>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}">
                                @error('email')
                                <div class="error-msg" id="emailErr">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}"placeholder="Password">
                                @error('password')
                                <div class="error-msg" id="passErr">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </form>
                        <p class="mb-2 text-muted">New User with Belus? <a class="text-decoration-none" href="/signup">Sign up</a> now!</p>
                    </div>
                    <div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab">
                        <form method="post" action="{{url('login-user')}}" novalidate>
                            @csrf
                            @if($errors->first('noCsrAccount'))
                                <div class="alert alert-danger" id="noCsrAccount">{{$errors->first('noCsrAccount')}}</div>
                            @endif
                            <input type="hidden" name="isCustomer" value="0"/>
                            <div class="mb-3">
                                <label for="csrEmail" class="form-label">Employee ID</label>
                                <input type="text" name="csrEmail" class="form-control @error('csrEmail') is-invalid @enderror" id="csrEmail" placeholder="Employee Email Address" value="{{ old('csrEmail') }}">
                                @error('csrEmail')
                                <div class="error-msg" id="csrEmailErr">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="csrPassword" class="form-label">Password</label>
                                <input type="password" name="csrPassword" class="form-control @error('csrPassword') is-invalid @enderror" id="csrPassword" placeholder="Password" value="{{ old('csrPassword') }}">
                                @error('csrPassword')
                                <div class="error-msg" id="csrPassErr">{{ $message }}</div>
                                @enderror
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
