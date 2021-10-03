@extends('layouts.admin_layouts')

@section('content')



                            <div class="panel-body">
                                <table id="datatablesSimple"  class=" table table-bordered table-hover table-curved table-striped">
                                    <thead class="table-success">
                                        <tr style="word-break:break-all">
                                            <th >OrderId</th>
                                            <th>User Email</th>
                                            <th>Order Amount</th>
                                            <th>Placed On</th>
                               
                                        </tr>
                                    </thead>
                                    <tfoot style="word-break:break-all">
                                        <tr>
                                            <th>OrderId</th>
                                            <th>User Email</th>
                                            <th>Order Amount</th>
                                            <th>Placed On</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @foreach($orders as $order)
                                        <tr>
                                        <td style="word-break:break-all">{{$order->order_id}}</td>
                                        <td style="word-break:break-all">{{ $order->email }}</td>
                                        <td style="word-break:break-all">Ksh. {{ $order->order_amount }}</td>
                                        <td style="word-break:break-all">{{ $order->updated_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

@endsection