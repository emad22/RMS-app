@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('Meals') }}
                    <a class="pull-right  btn btn-danger" href="{{ route('meal.create') }}"><i class="fa fa-plus"
                            aria-hidden="true"></i> add New meal </a>
                </div>

                <div class="card-body">

                    @if (count($meals) > 0 )
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                {{-- <th scope="col">meal Name</th> --}}
                                <th scope="col">Created By</th>
                                <th scope="col">Image</th>
                                <th scope="col">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($meals as $meal)
                            <tr>
                                <th scope="row">{{ $meal->id }}</th>
                                <td>{{ $meal->title }}</td>
                                <td>{{ $meal->description }}</td>
                                <td>{{ $meal->status }}</td>
                                {{-- <td>{{ $meal->meal->id }}</td> --}}
                                {{-- <td>{{ ucwords($meal->meal->title )}}</td> --}}
                                <td>{{ ucwords($meal->user->name )}}</td>
                                <td><img class="img-fluid img-thumbnail meal-img" src="{{ $meal->image }}" /></td>
                                <td>
                                    <div class="col-sm">
                                        <a href="{{ route('meal.edit', $meal->id) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        {{-- <a href="{{ route('meal.destroy', $meal->id) }}"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i></a> --}}

                                        <a href="{{ route('meal.destroy', ['id' => $meal->id]) }}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                        {{-- <form action="{{ route('meal.destroy', $meal->id) }}" method="post">
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