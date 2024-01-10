@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('Edit meal') }}
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
                    <form action="{{ route('meal.update',$meals->id) }}" method="Post" enctype="multipart/form-data" >
                        {!! csrf_field() !!} {{ method_field('PUT') }}
                        <div class="form-group ">
                            <label for="inputEmail4">meal Title</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="title" name="title" required value="{{ $meals->title}}">
                        </div>                        
                        <hr>
                        <div class="form-group  ">
                            <label for="inputState">meal Type</label>
                            <select name="type"  class="form-control">
                                <option value="" selected disabled>meal Type</option>
                                {{-- <option value="Food" id="active" class="form-control">Food</option>
                                <option value="Hot Drink" id="active" class="form-control">Hot Drink</option>
                                <option value="Cold Drink" id="active" class="form-control">Cold Drink</option> --}}

                                <option value="Food" {{ $meals->type == "Food"? 'selected' : '' }}>Food</option>
                                <option value="Hot Drink" {{ $meals->type == "Hot Drink" ? 'selected' : '' }}>Hot Drink</option>
                                <option value="Cold Drink" {{ $meals->type == "Cold Drink" ? 'selected' : '' }}>Cold Drink</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group ">
                            <label for="exampleFormControlTextarea1">meal Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $meals->description}}</textarea>
                        </div>
                        <hr>
                        <div class="form-group ">
                            <label for="inputState">meal Status</label>
                            <select name="status" id="inputState" class="form-control" >
                                {{-- <option value="" selected disabled>meal Status</option> --}}
                                {{-- <option value="1" id="active" class="form-control">Active</option>
                                <option value="0" id="active" class="form-control">noInactive</option> --}}

                                <option value="1" {{ $meals->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $meals->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="image">Choose image:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <img class="img-fluid img-thumbnail meal-img" src="/{{ $meals->image }}" />
                        </div>
                        <hr>
                        <button type="submit" class="pull-right btn btn-info">Update meal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection