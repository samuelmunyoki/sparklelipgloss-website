@extends('layouts.admin_layouts')

@section('content')



                            <div class="panel-body">
                                <table  id="datatablesSimple"  class=" table table-bordered table-hover table-curved table-striped">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Name</th>
                                            <th>User Email</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                               
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>User Email</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @foreach($users as $user)
                                        <tr>
                                        <td style="word-break:break-all">{{$user->name}}</td>
                                        <td style="word-break:break-all">{{ $user->email }}</td>
                                        <td>
                                            @if(Cache::has('user-is-online-' .$user->id))
                                            <div class="text-success">Online</div>
                                            @else
                                            <div class="text-danger">Offline</div>
                                            
                                            @endif
                                        </td>
                                        <td style="word-break:break-all">{{$user->created_at}}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

@endsection