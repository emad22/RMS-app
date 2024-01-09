@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('New item') }}
                </div>

                {{-- /*

                $table->string('title');
                $table->string('type')->unique();
                $table->text('description');
                $table->boolean('status');
                $table->string('image');

                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                */ --}}



                <div class="card-body">
                    <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group ">
                            <label for="inputEmail4">item Title</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="title" name="title" required>
                        </div>                        
                        <hr>
                        <div class="form-group ">
                            <label for="exampleFormControlTextarea1">item Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <hr>
                        <div class="form-group ">
                            <label for="inputState">item Status</label>
                            <select name="status" id="inputState" class="form-control" >
                                <option value="" selected disabled>Menu Item</option>
                                @foreach ($menus as $menu)
                                    <option value="1" id="{{ $menu->id }}" class="form-control">{{ $menu->title }}</option>
                                @endforeach
                                {{-- <option value="1" id="active" class="form-control">Active</option>
                                <option value="0" id="active" class="form-control">noInactive</option> --}}
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="image">Choose image:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <hr>
                        <button type="submit" class="pull-right btn btn-info">Add item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection