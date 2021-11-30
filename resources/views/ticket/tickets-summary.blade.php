@extends('layout/main')
@section('ticketsSummary')
<div class="container">
    <div class="row mt-4">
        <div class="col-12 text-center">
            <h1>All tickets</h1>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-6">
            <button type="button"  class="btn btn-secondary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
                <span><i class="fas fa-filter"></i> Filter by status</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li class="dropdown-item">Open</li>
                <li class="dropdown-item">In-Progress</li>
                <li class="dropdown-item">Resolved</li>
                <li class="dropdown-item">Closed</li>
            </ul>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <!-- only visible to customer -->
            <button class="btn btn-success">Raise New Issue</button>
        </div>
    </div>
    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Issue Summary</th>
            <th scope="col">Issue Status</th>
            <th scope="col">Date Issue Raised <i class="fas fa-sort ms-2"></i></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <th scope="row">1</th>
                <td>{{$d->summary}}</td>
                <td>{{$d->status}}</td>
                <td>{{$d->raised_on}}</td>
            </tr>
{{--        <tr>--}}
{{--            <th scope="row">1</th>--}}
{{--            <td>Internet not working</td>--}}
{{--            <td>In Progress</td>--}}
{{--            <td>12/01/2021</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th scope="row">2</th>--}}
{{--            <td>Router restarting on its own</td>--}}
{{--            <td>Open</td>--}}
{{--            <td>13/03/2021</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th scope="row">2</th>--}}
{{--            <td>Sites not accessible</td>--}}
{{--            <td>Closed</td>--}}
{{--            <td>07/07/2021</td>--}}
{{--        </tr>--}}
            @endforeach
        </tbody>
    </table>
</div>
@endsection
