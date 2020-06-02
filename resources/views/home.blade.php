@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Phone</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="/">Bookmark</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                </div>

                <div class="card-footer">
                    <div class="float-right">
                        {!! $contacts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
