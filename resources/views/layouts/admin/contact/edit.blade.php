@extends('layouts.admin.app')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
           @endif
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Table Number</th>
                        <th scope="col">Edit table</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('admin.tables.update', $table)}}" method="POST">
                        @csrf
                        @method('put')
                        <tr>
                            {{-- <td>
                                <input class="form-control" type="text" name="number" value="{{$table->number}}" required>
                            </td> --}}
                            <td>
                                <input type="number" name="number" class="form-control" value="{{$table->number}}" required>
                                @error('number')
                                <span class="badge" style="color: red">{{$message}}</span>
                                @enderror
                            </td>


                            {{-- <td>
                                <select class="form-select" name="reserved">
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
                            </td> --}}
                            <td>
                                <input type="submit" class="btn btn-success" value="Edit table">
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
@endsection
