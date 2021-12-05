@extends('layout/main')
@section('adminAllUsers')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 text-center">
                <h1>All Open Tickets</h1>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{url('admin-all-users')}}" class="btn btn-primary" >View All Users</a>
            </div>
        </div>
        <table class="table table-light">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Summary</th>
                <th scope="col">Status</th>
                <th scope="col">Assign To</th>
            </tr>
            </thead>
            <tbody>
            @foreach($openTickets as $ot)
                <tr>
                    <th scope="row">{{$ot->id}}</th>
                    <td>{{$ot->summary}}</td>
                    <td>{{$ot->status}}</td>
                    <td>
                        <select class="form-select" onChange="assignToCsr({{$ot->id}})" id="assignedTo{{$ot->id}}">
                            @foreach($csr as $user)
                                <option value="{{$user->email}}" @if($user->email == $ot->assigned_to) {{"selected"}} @endif>
                                    {{$user->name}} - {{$user->email}}
                                </option>
                            @endforeach
                        </select>
                        <span id="updatedMsg{{$ot->id}}" class="hide success-msg">Ticket Updated</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

