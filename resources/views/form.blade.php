<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add new advertisment</title>
    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
  </head>
  <body>
    <div class="container">
    <h2>Add new advertisment</h2>
            <div class="form-group">
                <label for="category">Select Category:</label>
                <select name="category" class="form-control" style="width:250px">
                    <option value="">--- Select Category ---</option>
                    @foreach ($categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subcategory">Select Subcategory:</label>
                <select name="subcategory" class="form-control"style="width:250px">
                <option>--Subcategory--</option>
                </select>
            </div>
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
  </body>
