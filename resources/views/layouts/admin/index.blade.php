@extends('layouts.admin.app')
@section('content')

            <!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                        {{-- <th></th> --}}
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Table ID</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Guest Number</th>
                        <th scope="col">Date time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @foreach ($user->tables as $table )
                            <tr>
                                {{-- <td><input class="form-check-input" type="checkbox"></td> --}}
                                {{-- <td>01 Jan 2045</td> --}}
                                {{-- {{dd($table->pivot)}} --}}
                                {{-- {{$table->pivot->mobile_number}} --}}
                                {{-- {{dd($user->tables->user_id)}} --}}
                                {{-- <td>{{$user->tables->id}}</td> --}}
                                <td>{{$user->name}}</td>
                                {{-- <td>{{$table->pivot->user_id}}</td> --}}
                                <td>
                                    <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                </td>
                                <td>{{$table->pivot->table_id}}</td>
                                <td>{{$table->pivot->mobile_number}}</td>
                                <td>{{$table->pivot->guest_number}}</td>
                                <td>{{$table->pivot->datetime}}</td>
                                {{-- {{dd($table->pivot->id)}} --}}
                                <td>
                                    <form action="{{route('index.destroy',$table->pivot->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    {{-- <a class="btn btn-sm btn-primary" href="">Detail</a> --}}
                                    {{-- <input class="btn btn-sm btn-danger" value="Delete"> --}}
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    {{-- <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>01 Jan 2045</td>
                        <td>INV-0123</td>
                        <td>Jhon Doe</td>
                        <td>$123</td>
                        <td>Paid</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr> --}}

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
@endsection
