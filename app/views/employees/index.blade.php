<!DOCTYPE>
<html>
<head>
	<title>Phantom Reporter</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
</head>
<body>
<table class="table table-bordered">
	 <tr>
	 	<th>Name</th>
	 	<th>Email</th>
	 	<th>Hire date</th>
	 </tr>
	 		

@foreach ($employees as $employee)
	 <tr><a href="{{action('EmployeesController@show', $employee->id) }} "></a>
	 	<td> {{{$employee->first_name}}} {{{$employee->last_name}}} </td>
	 	<td> {{{$employee->email}}} </td>
	 	<td> {{{$employee->hire_date}}} </td>
	 </tr> 
 @endforeach
</table>

</body>
</html>


