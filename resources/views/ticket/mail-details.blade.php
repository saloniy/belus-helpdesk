@extends('layout/main')
@section('mail')
    <div class="container mt-3">
        <h2 class="text-center"> Mail Ticket Details</h2>
        <div class="alert alert-success hide" id="success-msg">Mail sent successfully</div>
        <div class="mb-3 row">
            <label for="raised_by" class="col-form-label col-sm-2">Raised By</label>
            <div class="col-sm-10">
                <input class="form-control" name="raised_by" id="raised_by" readonly value="{{$data->name}}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-form-label col-sm-2">Email</label>
            <div class="col-sm-10">
                <input readonly class="form-control" name="email" id="email" value="{{$data->raised_by}}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ticket_id" class="col-form-label col-sm-2">Ticket ID</label>
            <div class="col-sm-10">
                <input readonly class="form-control" name="ticket_id" id="ticket_id" value="{{$ticket_ref}}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="col-form-label col-sm-2">Status</label>
            <div class="col-sm-10">
                <input readonly class="form-control" name="status" id="status" value="{{$data->status}}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="priority" class="col-form-label col-sm-2">Priority</label>
            <div class="col-sm-10">
                <input readonly class="form-control" name="priority" id="priority" value="{{$data->priority}}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="description" class="col-form-label col-sm-2">Description</label>
            <div class="col-sm-10">
                <input readonly type="description" value="{{$data->description}}" class="form-control" id="description" />
            </div>
        </div>
        <div class="form-group" id="comments">
            @foreach($cdata as $c)
                <textarea readonly class="form-control" rows="1">#{{$c->added_on}} : {{$c->comment_by}} - {{$c->comment_text}}.</textarea>
            @endforeach
        </div>
        <div class="form-group">
            <textarea class="form-control" id="additional_comment" name="additional_comment" rows="2" placeholder="Enter any additional comment"></textarea>
        </div>
        <div class="col-12 mt-3">
            <button type="button" class="btn btn-primary" onClick="sendMail()">Send Mail</button>
        </div>
    </div>
@endsection
