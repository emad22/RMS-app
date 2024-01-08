@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('Menus') }}
                    <a class="pull-right  btn btn-info" href="{{ route('menu.create') }}"><i class="fa fa-plus"
                            aria-hidden="true"></i> add New </a>
                </div>

                <div class="card-body">
                    
                    @if (count($menus) > 0 )
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Image</th>
                                <th scope="col">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                            <tr>
                                <th scope="row">{{ $menu->id }}</th>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->type }}</td>
                                <td>{{ $menu->status }}</td>
                                <td>{{ ucwords($menu->user->name )}}</td>
                                <td><img class="img-fluid img-thumbnail menu-img" src="{{ $menu->image }}" /></td>
                                <td>
                                    <div class="col-sm">
                                        <a href="{{ route('menu.edit', $menu->id) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        {{-- <a href="{{ route('menu.destroy', $menu->id) }}"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i></a> --}}

                                        <a href="{{ route('menu.destroy', ['id' => $menu->id]) }}">
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