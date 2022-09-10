<table>
    <tr>
        <th>service_id</th>
        <th>service provider</th>
        <th>category </th>
        <th>title</th>
        <th>description</th>
        <th>installment title</th>
        <th>installment start price</th>
        <th>installment end price</th>
        <th>installment count</th>
        <th>created_at</th>
        <th>select Service</th>

    </tr>
    @foreach($services as $service)
    <tr>
        <td>{{$service->service_id}}</td>
       
        <td>{{$service->user->first_name}}</td>
        <td>{{$service->category->name}}</td>
        <td>{{$service->title}}</td>
        <td>{{$service->description}}</td>
        <td>{{$service->installment->name}}</td>
        <td>{{$service->installment->start_price}}</td>
        <td>{{$service->installment->end_price}}</td>
        <td>{{$service->installment->installment_count}}</td>
        <td>{{$service->created_at}}</td>
        <td><button>select</button></td>

    </tr>
    @endforeach
</table>