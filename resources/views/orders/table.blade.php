<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Телефон</th>
        <th>Адресс</th>
        <th>Статус заказа</th>
                <th colspan="3">Изменить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr style="background-color: {{$order->status->color}}">
                <td>{{ $order->id }}</td>
                <td>{{ $order->telephone }}</td>
                <td>{{ $order->address }}</td>
                <td><a href="#" class="ChangeStatus" data-id="{{ $order->id }}">{{ $order->status->name }}</a></td>
                           <td class=" text-center">
                               {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                               <div class='btn-group'>
                                   <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                                   <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                                   {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
