@extends('layouts.admin.app')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
           @endif
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Table number</th>
                        <th scope="col">Reserved</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                    <tr>
                        <td>{{$table->id}}</td>
                        <td>{{$table->number}}</td>
                        <td>
                            <form action="{{route('admin.tables.update', $table)}}" method="post">
                                @csrf
                                @method('put')
                                <select class="form-select" name="reserved" onchange="this.form.submit()">
                                    <option value="{{$table->reserved}}">{{$table->reserved}}</option>
                                    @foreach ($allStatus as $status)
                                        @if ($status == $table->reserved )
                                            @php
                                                continue
                                            @endphp
                                        @endif
                                    <option value="{{$status}}">{{$status}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>

                        <td>
                            <form action="{{route('admin.tables.edit', $table->id)}}" method="post">
                                @csrf
                                @method('get')
                                <input type="submit" class="btn btn-success" value="Edit">
                            </form>
                        </td>
                        <td>
                            <form action="{{route('admin.tables.destroy', $table)}}" method="post" onsubmit="return confirm('are you sure ?')">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
@endsection
