@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add new Advertisement
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Advert Form -->
                    <form action="{{ url('advert')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Advert Name -->
                        <div class="form-group">
                            <label for="advert-name" class="col-sm-3 control-label">Advert</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="advert-name" class="form-control" value="{{ old('advert') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">Select Category</label>
                            <div class="col-sm-6">
                                <select name="category" class="form-control col-sm-6" style="width:250px">
                                    <option value="">--- Select Category ---</option>
                                    @foreach ($categories as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subcategory" class="col-sm-3 control-label">Select Subcategory</label>
                            <div class="col-sm-6">
                                <select name="subcategory" class="form-control col-sm-6" style="width:250px">
                                    <option>--Subcategory--</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="advert-description" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                            <textarea name="description" class="form-control col-sm-6" rows = "3" cols = "80"></textarea>
                            </div>
                        </div>

                        <!-- Add advert Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Advert
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function ()
                    {
                            jQuery('select[name="category"]').on('change',function(){
                            var categoryID = jQuery(this).val();
                            if(categoryID)
                            {
                                jQuery.ajax({
                                    url : 'form/getsubcategories/' +categoryID,
                                    type : "GET",
                                    dataType : "json",
                                    success:function(data)
                                    {
                                        console.log(data);
                                        jQuery('select[name="subcategory"]').empty();
                                        jQuery.each(data, function(key,value){
                                        $('select[name="subcategory"]').append('<option value="'+ key +'">'+ value +'</option>');
                                        });
                                    }
                                });
                            }
                            else
                            {
                                $('select[name="subcategory"]').empty();
                            }
                            });
                    });
                </script>
            </div>
        </div>
    </div>
@endsection