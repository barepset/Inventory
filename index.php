<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>JSON CRUD Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  </head>
  <body style="margin:20px auto;width:900px;";>
    <div class="container">
      <div class="row">
      <div class="col-md-4">
      <h1>JSON CRUD Test</h1>
      <img src="img/default.jpg" class="img-fluid" alt="Responsive image">
      <br>
      <br>
        <div class="btn-group" role="group" aria-label="Basic example" style="margin:0 auto;">
        <button type="button" class="btn btn-primary home">Home</button>
        <button type="button" class="btn btn-primary cek">Cek Data</button>
        <button type="button" class="btn btn-primary ins">Insert Data</button>
      </div>
      <br>
      <br>
      <small>copyleft 2050. bacok corp. all left reserved.</small>
      </div>
      <div class="col-md-8">
      <div id="box"> 
      <div class="indexhome">
      json crud test - collection!
      </div>
      </div>
    </div>
    </div>
    </div>
    <script>
     $(document).ready(function(){
    $('.home').click(function(){
        $('#box').load('index.php .indexhome');
    });
    $('.cek').click(function(){
        $('#box').load('cek.php');
    });
    $('.ins').click(function(){
        $('#box').load('add.php');
    });

})
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>