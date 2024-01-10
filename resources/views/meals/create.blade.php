@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('New meal') }}
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
                    <form action="{{ route('meal.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group ">
                            <label for="inputEmail4">meal Title</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="title" name="title" required>
                        </div>                        
                        <hr>
                        <div class="form-group  ">
                            <label for="inputState">meal Type</label>
                            <select name="type"  class="form-control">
                                <option value="" selected disabled>meal Type</option>
                                <option value="Food" id="active" class="form-control">Food</option>
                                <option value="Hot Drink" id="active" class="form-control">Hot Drink</option>
                                <option value="Cold Drink" id="active" class="form-control">Cold Drink</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group ">
                            <label for="exampleFormControlTextarea1">meal Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <hr>
                        <div class="form-group ">
                            <label for="inputState">meal Status</label>
                            <select name="status" id="inputState" class="form-control" >
                                <option value="" selected disabled>meal Status</option>
                                <option value="1" id="active" class="form-control">Active</option>
                                <option value="0" id="active" class="form-control">noInactive</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group ">
                            <label for="menu">Select Menu</label>
                            <select name="menu" id="menu" class="form-control">
                                <option value="" selected disabled>Menu Item</option>
                                @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" id="{{ $menu->id }}" class="form-control">{{ $menu->title }}</option>
                                @endforeach
                                {{-- <option value="1" id="active" class="form-control">Active</option>
                                <option value="0" id="active" class="form-control">noInactive</option> --}}
                        
                        
                            </select>
                        
                        </div>
                        {{-- <hr> --}}
                        {{-- <div class="form-group " id="item_field">
                            <label for="inputState">Select items</label>
                            <select name="items" id="items" class="form-control">  </select>
                            {{-- <select id="product" name="product" class="form-control">  </select> --}}
                        
                        {{-- </div> --}} 
                        <hr>
                        {{-- @foreach($roles as $role) --}}
                        <div class="col-md-4" id="item_data" >
                            {{-- <input type="checkbox" name="items"  class="form-check-input" value=""  id=""> Item title --}}
                        </div>
                        {{-- @endforeach --}}
                        <div class="form-group">
                            <label for="image">Choose image:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <hr>
                        <button type="submit" class="pull-right btn btn-info">Add meal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#item_field').hide();
            $('select[name="menu"]').on('change', function() {
                // console.log("Changed...........................................");
                var menu_id = $(this).val();
                if (menu_id) {
                    $.ajax({
                        url: "{{ URL::to('getItem') }}/" + menu_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            $('#item_field').show();
                            $('#item_data').empty();
                            $.each(data, function(key, value) {
                                console.log(value['id']);
                                $('#item_data').append('<input type="checkbox" name="items[]" class="form-check-input" value="' + value + '" id=""> ' ).append('<label for="vehicle3"> ' + value + '</label><br>')
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

</script>
@endpush