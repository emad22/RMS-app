@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('Items') }}
                    <a class="pull-right  btn btn-info" href="{{ route('item.create') }}"><i class="fa fa-plus"
                            aria-hidden="true"></i> add New Item </a>
                </div>

                <div class="card-body">
                    
                    @if (count($items) > 0 )
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Menu Name</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Image</th>
                                <th scope="col">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->status }}</td>
                                {{-- <td>{{ $item->menu->id }}</td> --}}
                                <td>{{ ucwords($item->menu->title )}}</td>
                                <td>{{ ucwords($item->user->name )}}</td>
                                <td><img class="img-fluid img-thumbnail menu-img" src="{{ $item->image }}" /></td>
                                <td>
                                    <div class="col-sm">
                                        <a href="{{ route('item.edit', $item->id) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        {{-- <a href="{{ route('menu.destroy', $menu->id) }}"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i></a> --}}

                                        <a href="{{ route('item.destroy', ['id' => $item->id]) }}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                        {{-- <form action="{{ route('menu.destroy', $menu->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"> <i class="fa fa-trash-o"></i></button>
                                        </form> --}}

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-warning" role="alert">
                            This is No Data To Display!
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection