@extends('layout/main')
@section('ticketsSummary')
<div class="container">
    <div class="row mt-4">
        <div class="col-12 text-center">
            <h1>Assigned Tickets</h1>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-6">
            <button type="button"  class="btn btn-secondary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
                <span><i class="fas fa-filter"></i> Filter by status</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li class="dropdown-item">Open</li>
                <li class="dropdown-item">Closed</li>
            </ul>
        </div>
    </div>
    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Issue Summary</th>
            <th scope="col">Issue Status</th>
            <th scope="col">Date Issue Raised <i class="fas fa-sort ms-2"></i></th>
            <th scope="col"> </th>


        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
        <tr>
            <th scope="row">{{$d->id}}</th>
            <td>{{$d->summary}}</td>
            <td>{{$d->status}}</td>
            <td>{{$d->raised_on}}</td>
            <td><a href="{{url('/ticket-details/'.$d->id)}}" class="btn btn-warning" >View Ticket Details</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
