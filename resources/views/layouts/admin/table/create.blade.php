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
                        <th scope="col">Reserved</th>
                        <th scope="col">Add table</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('admin.tables.store')}}" method="POST">
                        @csrf
                        @method('post')
                        <tr>
                            <td>
                                <select class="form-select" name="reserved">
                                    @foreach ($allStatus as $status)
                                    <option value="{{$status}}">{{$status}}</option>
                                        @error('reserved')
                                        <span class="badge" style="color: red">{{$message}}</span>
                                        @enderror
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="Add table">
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
