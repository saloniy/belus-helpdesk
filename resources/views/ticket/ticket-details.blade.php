@extends('layout/main')
@section('ticketDetails')
<!--form content -->
<div class="row mt-4">
    <div class="col-sm-2">
        <!-- can be seen only by customer-->
        @if($csr == false)
            <form action="/ticket-details" method="post">
                @csrf
                <input type="hidden" name="ticket_id" value="{{$ticket_ref}}">
            <button type="submit" name="btnOpen" class="btn btn-success btn-sm">Re-open Ticket</button>
            </form>
        @endif
        @if($csr == true)
            <a href="{{url('mail-ticket', $ticket_ref)}}" class="btn btn-success btn-sm">Mail ticket details to supervisor</a>
        @endif
    </div>
    <div class="col-sm-7">
        <div>
            <b>Ticket #{{$ticket_ref}}</b>
        </div>
        <div>
            Reported by : {{$reporter}}
        </div>
    </div>
    <!-- can be seen only by CSR -->


    @if($csr==true)
    <div class="col-sm-3">
        <form action="/ticket-details" method="post">
            @csrf
            <input type="hidden" name="ticket_id" value="{{$ticket_ref}}">
        <button type="submit" name="btnClose" class="btn btn-warning  btn-lg">Close</button>
        <button type="submit" name="btnDel" class="btn btn-danger  btn-lg">Delete</button>
        </form>
    </div>
    @endif
    <!-- end -->
</div>
<div class="row mt-5">
    <div class="card">
        <div class="table-responsive">
    <table class="table  table-striped table-curved">
        <thead>
        <tr>
            <th class="display-6">Ticket Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
        <tr>
            <td class="fw-bold" colspan="2">Status : </td>
            <td colspan="2" id="status">{{$d->status}}</td>
            <td class="fw-bold" colspan="2">User : </td>
            <td class="text-end" id="name"> {{$d->name}} </td>
        </tr>
        <tr>
            <td class="fw-bold"  colspan="2">Priority : </td>
            <td colspan="2" id="priority">{{$d->priority}}</td>
            <td class="fw-bold" colspan="2">Email : </td>
            <td class="text-end" id="raisedBy"> {{$d->raised_by}}</td>
        </tr>
        <tr>
            <td class="fw-bold" colspan="2">Date Of Raise : </td>
            <td colspan="2" id="raisedOn"> {{$d->raised_on}} </td>
            <td class="fw-bold" colspan="2">Complaint : </td>
            <td class="text-end" id="description"> {{$d->description}} </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>

    <div class="form-group" id="comments">
        @foreach($cdata as $c)
        <textarea readonly class="form-control" rows="1">#{{$c->added_on}} : {{$c->comment_by}} - {{$c->comment_text}}.</textarea>
        @endforeach
        <form action="/ticket-details" method="post">
            @csrf
            <input type="hidden" name="ticket_id" value="{{$ticket_ref}}">
            <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Enter your comment"></textarea>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">Save Comment</button>
            </div>
       </form>

    </div>
<!-- form content ends -->
@endsection
