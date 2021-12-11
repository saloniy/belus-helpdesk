@extends('layout/main')
@section('ticketDetails')
<!--form content -->
<div class="row mt-4">
    <div class="col-sm-1">
        <!-- can be seen only by customer-->
        @if($csr==false)
        <button type="button" class="btn btn-success btn-sm">RE-OPEN</button>
            @endif
    </div>
    <div class="col-sm-8">
        <div>
            <b>Ticket #{{$cdata[0]->ticket_ref}}</b>
        </div>
        <div>
            Reported by : {{$data[0]->name}}
        </div>
    </div>
    <!-- can be seen only by CSR -->


    @if($csr==true)
    <div class="col-sm-3">
        <button type="button" class="btn btn-warning  btn-lg">Close</button>
        <button type="button" class="btn btn-danger  btn-lg">Delete</button>
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
            <td colspan="2">{{$d->status}}</td>
            <td class="fw-bold" colspan="2">User : </td>
            <td class="text-end" > {{$d->name}} </td>
        </tr>
        <tr>
            <td class="fw-bold"  colspan="2">Priority : </td>
            <td colspan="2">{{$d->priority}}</td>
            <td class="fw-bold" colspan="2">Email : </td>
            <td class="text-end"> {{$d->raised_by}}</td>
        </tr>
        <tr>
            <td class="fw-bold" colspan="2">Date Of Raise : </td>
            <td colspan="2" > {{$d->raised_on}} </td>
            <td class="fw-bold" colspan="2">Complaint : </td>
            <td class="text-end"> {{$d->description}} </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>

    <div class="form-group">
        @foreach($cdata as $c)
        <textarea class="form-control" rows="1">#{{$c->added_on}} - {{$c->comment_text}}.</textarea>
        @endforeach
        <form action="/ticket-details" method="post">
            @csrf
            <input type="hidden" name="ticket_id" value="{{$cdata[0]->ticket_ref}}">
        <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Enter your comment"></textarea>
        <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary">Save Comment</button>
        </div>
       </form>

    </div>
<!-- form content ends -->
@endsection
