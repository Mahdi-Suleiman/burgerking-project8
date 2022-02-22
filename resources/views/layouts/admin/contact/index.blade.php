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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$contact->contact_name}}</td>
                        <td>
                            <a href="mailto:{{$contact->contact_email}}">{{$contact->contact_email}}</a>
                        </td>
                        <td>{{$contact->subject}}</td>
                        {{-- <td>{{$contact->message}}</td> --}}
                        {{-- <td>
                            <textarea class="form-control" id="exampleFormControlTextarea3" rows="2" readonly>
                                {{$contact->subject}}
                            </textarea>
                        </td> --}}
                        <td>
                            <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" readonly>{{$contact->message}}</textarea>
                        </td>
{{--
                        <td>
                            <form action="{{route('admin.tables.edit', $table->id)}}" method="post">
                                @csrf
                                @method('get')
                                <input type="submit" class="btn btn-success" value="Edit">
                            </form>
                        </td>
                        <td> --}}
                        <td>
                            <form action="{{route('admin.tables.destroy', $contact)}}" method="post" onsubmit="return confirm('are you sure ?')">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
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
