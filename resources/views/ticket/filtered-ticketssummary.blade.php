@foreach($data as $d)
    <tr>
        <th scope="row">{{$d->id}}</th>
        <td>{{$d->summary}}</td>
        <td>{{$d->status}}</td>
        <td>{{$d->raised_on}}</td>
        <td><a href="{{url('/ticket-details/'.$d->id)}}" class="btn btn-warning" >View Ticket Details</a></td>
    </tr>
@endforeach
