@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard
                <span class="pull-right">
                    <a href="/listings/create" class="btn btn-success btn-xs">Add Listing</a>
                </span>
            </div>

            <div class="panel-body">
                <h3>Your Listings</h3>
                @if(count($listings))
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Bio</th>
                        </tr>
                        @foreach($listings as $listing)
                            <tr>
                                <td>{{ $listing->name }}</td>
                                <td>{{ $listing->address }}</td>
                                <td>{{ $listing->website }}</td>
                                <td>{{ $listing->email }}</td>
                                <td>{{ $listing->phone }}</td>
                                <td>{{ $listing->bio }}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
