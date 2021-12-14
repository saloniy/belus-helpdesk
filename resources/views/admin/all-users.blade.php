@extends('layout/main')
@section('adminAllUsers')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 text-center">
                <h1>All Users</h1>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-6">
                <button type="button"  class="btn btn-secondary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
                    <span><i class="fas fa-filter"></i> Filter by account type</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-item" onClick="filterByUserType('customer')">Customer</li>
                    <li class="dropdown-item" onClick="filterByUserType('csr')">Customer Service Representative</li>
                </ul>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="{{url('new-csr-signup')}}" class="btn btn-success me-3" >Create CSR Account</a>
                <a href="{{url('admin-all-open-tickets')}}" class="btn btn-primary" >View Open Tickets</a>
            </div>
        </div>
        <table class="table table-light">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Account Type</th>
                <th scope="col">Email ID</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody id="allUsersData">
            @foreach($userData as $d)
                <tr>
                    <th scope="row">{{$d->id}}</th>
                    <td>{{$d->name}}</td>
                    <td>
                        @if($d->isCustomer)
                            Customer
                        @endif
                        @if(!($d->isCustomer))
                            Customer Service Representative (CSR)
                        @endif
                    </td>
                    <td>{{$d->email}}</td>
                    <td>
                        @if(!($d->isCustomer))
                            <a href="{{url('update-csr-account', $d->id)}}" class="btn btn-primary">Update Account</a>
                            <a href="{{url('delete-csr-account', $d->id)}}" class="btn btn-danger">Delete Account</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
