<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  	form{ border: 1px solid#ccc;
    	border-radius: 5px;
    	padding: 10px;}
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center">Add Records</h2>
   <div class="form-group text-center">
      @if(session('message'))
      <label><h3 style="color:#5cb85c">{{session('message')}}</h3></label>
      @endif
    </div>
  <form method="POST" action="{{ route('insert') }}" class="col-md-6 col-md-offset-3">
  	@csrf
    <div class="form-group">
      <label>Enter first Name:</label>
      <input type="textbox" class="form-control"  placeholder="Enter Name" name="name">
      @if ($errors->has('name'))
        <div class="invalid-feedback" role="alert">
            <strong style="color: red; font-size: 13px;">{{ $errors->first('name') }}</strong>
        </div>
      @endif
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="textbox" class="form-control"  placeholder="Enter Email" name="email">
      @if ($errors->has('email'))
        <div class="invalid-feedback" role="alert">
            <strong style="color: red; font-size: 13px;">{{ $errors->first('email') }}</strong>
        </div>
      @endif
    </div>
    <div class="form-group">
      <label>Mobile:</label>
      <input type="textbox" class="form-control"  placeholder="Enter Mobile" name="mobile">
      @if ($errors->has('mobile'))
        <div class="invalid-feedback" role="alert">
            <strong style="color: red; font-size: 13px;">{{ $errors->first('mobile') }}</strong>
        </div>
      @endif
    </div>
    
    <button type="submit" class="btn btn-success submit">Submit</button>
    <a class="btn btn-primary" href="{{ route('indexfile') }}">Back</a>
  </form>
</div>


<!-- <script>
  $(document).ready(function(){
    $(".submit").click(function(){
      alert("The paragraph was clicked.");
    });
  });
</script> -->

</body>
</html>
