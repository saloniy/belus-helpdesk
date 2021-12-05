@foreach($data as $d)
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
                <a class="btn btn-primary">Update Account</a>
                <a class="btn btn-danger">Delete Account</a>
            @endif
        </td>
    </tr>
@endforeach
