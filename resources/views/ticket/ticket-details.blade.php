@extends('layout/main')
@section('ticketDetails')
<!--form content -->
<div class="row mt-4">
    <div class="col-sm-1">
        <!-- can be seen only by customer-->
        <button type="button" class="btn btn-success btn-sm">RE-OPEN</button>
    </div>
    <div class="col-sm-8">
        <div>
            <b>Ticket #788</b>
        </div>
        <div>
            Reported by : Ganesh Thampi
        </div>
    </div>
    <!-- can be seen only by CSR -->
    <div class="col-sm-3">
        <button type="button" class="btn btn-warning  btn-lg">Close</button>
        <button type="button" class="btn btn-secondary  btn-lg">Process</button>
        <button type="button" class="btn btn-danger  btn-lg">Delete</button>
    </div>
    <!-- end -->
</div>
<div class="row mt-5">
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th class="display-6">Ticket Details</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="fw-bold" colspan="2">Status : </td>
            <td colspan="2"> OPEN </td>
            <td class="fw-bold" colspan="2">User : </td>
            <td class="text-end" > Ganesh Thampi </td>
        </tr>

        <tr>
            <td class="fw-bold"  colspan="2">Priority : </td>
            <td colspan="2"> NORMAL </td>
            <td class="fw-bold" colspan="2">Email : </td>
            <td class="text-end"> ganeshthampi077@gmail.com</td>
        </tr>
        <tr>
            <td class="fw-bold" colspan="2">Plan : </td>
            <td colspan="2" > UL-40MBPS </td>
            <td class="fw-bold" colspan="2">Complaint : </td>
            <td class="text-end"> Internet Very Slow </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="form-group">
        <textarea class="form-control" rows="1" readonly>#20.12.2021 - Customer reports low internet speed. Need to check router settings.</textarea>
        <textarea class="form-control" rows="1" readonly>#25.12.2021 - The router is fine.</textarea>
        <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Enter your comment"></textarea>
        <div class="text-end mt-3">
            <button type="button" class="btn btn-primary">Add comment</button>
        </div>
    </div>
</div>
<!-- form content ends -->
@endsection
