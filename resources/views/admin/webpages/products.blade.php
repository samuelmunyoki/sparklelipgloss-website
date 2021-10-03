@extends('layouts.admin_items')

@section('content')



                            <div class="panel-body">
                                <table id="datatablesSimple"  class=" mb-4 table table-bordered table-hover table-curved table-striped">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Current Price</th>
                                            <th>Previous Price</th>
                                            <th>Rating</th>
                                            <th>Updated At</th>
                                            <th style="word-break:break-all" colspan="2">Action</th>
                               
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Current Price</th>
                                            <th>Previous Price</th>
                                            <th>Rating</th>
                                            <th>Updated At</th>
                                            <th style="word-break:break-all" colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @foreach($items as $item)
                                        <tr>
                                        <td style="word-break:break-all">{{ucfirst( $item->prod_name )}}</td>
                                        <td style="word-break:break-all">{{ $item->prod_price_now }}</td>
                                        <td style="word-break:break-all">{{ $item->prod_prev_price}}</td>
                                        <td style="word-break:break-all">{{ $item->prod_rating }}</td>
                                        <td style="word-break:break-all">{{ $item->updated_at }}</td>
                                        <td style="word-break:break-all">
                                        <div class="d-flex justify-content-between">
                                        <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf

                                          <a class="btn btn-primary"  href="{{ route('adminedit', $item->prod_id )}}"> Edit</a>
                                          
                                          <a onclick="return confirm('Delete Item?')" class="btn btn-danger delete"  href="{{ route('admindestroy', $item->prod_id)}}">Delete</a>
                                           
                                       </form> 
                                    </div>
                                    </td>                              
                                       
                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

@endsection