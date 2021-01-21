@extends('layouts.app')

@section('content')

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Supplier_code</td>
            <td>Supplier_Name</td>
            <td>Supplier_Contact</td>
            <td>Supplier_Address</td>
            <td>Email</td>
        </tr>
        </thead>
        <tbody>
        @foreach($suppliers as $key => $value)
            <tr>
                <td>{{ $value->supplier_code }}</td>
                <td>{{ $value->supplier_name }}</td>
                <td>{{ $value->supplier_contact }}</td>
                <td>{{ $value->supplier_address }}</td>
                <td>{{ $value->email }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('suppliers/' . $value->supplier_id) }}">Show this shark</a>

                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('suppliers/' . $value->supplier_id . '/edit') }}">Edit this shark</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection