<!DOCTYPE html>
<html lang="en">
<head>
  <title>Json</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-md-8 col-md-offset-2"> 
    	<div class="row">
    		<div class="col-md-10"><h2>Json Records</h2></div>
    		<div class="col-md-2">
    				<a class="btn btn-success pull-right" href="{{ route('jsonform') }}" style="margin-top: 20px;">Add</a>  
    		</div>
    	</div>
    	     
	  <table class="table table-bordered" >
	    <thead>
	      <tr>
	        <th>Sr.</th>
	        <th>Name</th>
	        <th>email</th>
	        <th>Mobile</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@php $sr=1; @endphp
	    	@foreach($data as $row)
		    	<tr>
		    		<td>{{ $sr }}</td>
		    		<td>{{ $row['name'] }}</td>
		    		<td>{{ $row['email'] }}</td>
		    		<td>{{ $row['mobile'] }}</td>
		    		<td>
		    			<a href="{{ route('jsonedit',$row['id']) }}" class="btn btn-primary">Edit</a>
		    			<a href="{{ route('jsonidRemove',$row['id']) }}" class="btn btn-danger">Delete</a>
		    		</td>
		    	</tr>
		    	@php $sr++; @endphp
	    	@endforeach
	    </tbody>
	  </table>
	  <div class="form-group">
    	@if(session('message'))
    	<label><h3 style="color:#5cb85c">{{session('message')}}</h3></label>
    	@endif
    </div>
	</div>  
</div>

</body>
</html>
