<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
      
    </head>
    <body>


    <form id="formcreate">
        <!-- {{ csrf_field() }} -->
        <div class="input-group" >
            <input type="text" class="form-control" name="a"
            placeholder="Author" value=""> <span class="input-group-btn">
            <input type="text" class="form-control" name="b"
            placeholder="Text" value=""> <span class="input-group-btn">
            <button type="submit"> Create</button>
            
        </span>
    </div>  
    </form>

    <form id="formupdate">
        <!-- {{ csrf_field() }} -->
        <div class="input-group" >
            <input type="text" class="form-control" name="a"
            placeholder="Author" value=""> <span class="input-group-btn">
            <input type="text" class="form-control" name="b"
            placeholder="Text" value=""> <span class="input-group-btn">
            Where   
            <input type="text" class="form-control" name="c"
            placeholder="ID" value=""> <span class="input-group-btn">
            <button type="submit"> Update</button>
            
        </span>
    </div>  
    </form>


    <form id="formdelete">
        <!-- {{ csrf_field() }} -->
        <div class="input-group" >
            <input type="text" class="form-control" name="a"
            placeholder="ID" value=""> <span class="input-group-btn">
           <button type="submit"> Delete</button>
            
        </span>
    </div>  
    </form>

     <form  id="formpaging">
        <!-- {{ csrf_field() }} -->
        <div class="input-group" >
            <input type="text" class="form-control" name="paging"
            placeholder="Input Display Data" value=""> <span class="input-group-btn">
           <button type="submit"> Display Rows Data</button>
            
        </span>
    </div>  
    </form>
   
    <form role="search" id="formsearch">
        <!-- {{ csrf_field() }} -->
        <div class="input-group" >
            <input type="text" class="form-control" name="q" id="id" 
            placeholder="ID" value=""> <span class="input-group-btn">
            <button type="submit"> Find</button>
            
        </span>
    </div>  
    </form>
     


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>

//    $.ajaxSetup({
 //       headers: {
 //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //      }
  //  });
    $(document).ready(function(){
        $('#formsearch').submit(function (e) {
            e.preventDefault(); //**** to prevent normal form submission and page reload

            $.ajax({
                type : 'GET',
                url : '/nonpostmancomments',
                dataType: 'json',
                data:$(this).serialize(),
                success: function(result){
                console.log(result);
                alert(result.message);
                },
                error: function (result) {
                //alert(xhr.status);
                //alert(thrownError);
                alert(result.success);
                }
            });
        });
    });


    $(document).ready(function(){
        $('#formdelete').submit(function (e) {
            e.preventDefault(); //**** to prevent normal form submission and page reload

            $.ajax({
                type : 'POST',
                url : '/nonpostmancomments/destroyform',
                dataType: 'json',
                data:$(this).serialize(),
                success: function(result){
                console.log(result);
                alert(result.message);
                },
                error: function (result) {
                //alert(xhr.status);
                //alert(thrownError);
                alert(result.success);
                }
            });
        });
    });

     $(document).ready(function(){
        $('#formupdate').submit(function (e) {
            e.preventDefault(); //**** to prevent normal form submission and page reload

            $.ajax({
                type : 'POST',
                url : '/nonpostmancomments/updateform',
                dataType: 'json',
                data:$(this).serialize(),
                success: function(result){
                console.log(result);
                alert(result.message);
                },
                error: function (result) {
                //alert(xhr.status);
                //alert(thrownError);
                alert(result.success);
                }
            });
        });
    });

     $(document).ready(function(){
        $('#formcreate').submit(function (e) {
            e.preventDefault(); //**** to prevent normal form submission and page reload

            $.ajax({
                type : 'POST',
                url : '/nonpostmancomments/storeform',
                dataType: 'json',
                data:$(this).serialize(),
                success: function(result){
                console.log(result);
                alert(result.message);
                },
                error: function (result) {
                //alert(xhr.status);
                //alert(thrownError);
                alert(result.success);
                }
            });
        });
    });


     $(document).ready(function(){
        $('#formpaging').submit(function (e) {
            e.preventDefault(); //**** to prevent normal form submission and page reload

            $.ajax({
                type : 'GET',
                url : '/nonpostmancomments/pagingform',
                dataType: 'json',
                data:$(this).serialize(),
                success: function(result){
                console.log(result);
                alert(result.message);
                },
                error: function (result) {
                //alert(xhr.status);
                //alert(thrownError);
                alert(result.success);
                }
            });
        });
    });
</script>


    </body>
</html>
