@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('Edit item') }}
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
                    <form action="{{ route('item.update',$items->id) }}" method="Post" enctype="multipart/form-data" >
                        {!! csrf_field() !!} {{ method_field('PUT') }}
                        <div class="form-group ">
                            <label for="inputEmail4">item Title</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="title" name="title" required value="{{ $items->title}}">
                        </div>
                        <hr>
                        <div class="form-group ">
                            <label for="exampleFormControlTextarea1">item Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                rows="3">{{ $items->description}}</textarea>
                        </div>
                        <hr>
                        <div class="form-group ">
                            <label for="inputState">item Status</label>
                            <select name="status" id="inputState" class="form-control">
                                {{-- <option value="" selected disabled>item Item</option>
                                <option value="1" id="Found" class="form-control">Found</option>
                                <option value="0" id="Not-found" class="form-control">not Found</option> --}}

                                <option value="1" {{ $items->status == "Found"? 'selected' : '' }}>found</option>
                                <option value="0" {{ $items->status == "Not-found" ? 'selected' : '' }}>Not-found</option>
                            </select>
                        </div>                        
                        <hr>
                        <div class="form-group ">
                            <label for="inputState">item Price</label>
                            <input type="number" class="form-control" id="" placeholder="Price Of Item" name="price" required value="{{ $items->price}}">
                        </div>
                        
                        <hr>
                        <div class="form-group ">
                            <label for="inputState">Select item</label>
                            <select name="menu" id="inputState" class="form-control">
                                <option value="" selected disabled>item Item</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}" id="{{ $menu->id }}" class="form-control" {{$items->menu_id == $menu->id ? 'selected' :''}}>
                                        {{ $menu->title }}
                                    </option>
                                @endforeach
                        
                            </select>                        
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="image">Choose image:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <img class="img-fluid img-thumbnail item-img" src="/{{ $items->image }}" />
                        </div>
                        <hr>
                        <button type="submit" class="pull-right btn btn-info">Update item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection