<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alumni</title>
	<style type="text/css">
		table{
			border-collapse: collapse; background-color: #F0FFFF;
		}
		td, th{
			border:1px solid;
		}
	</style>
</head>
<body>
<center>
	<h1>No. of Registered Alumni Order By Course</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Course</th>
			<th>Email</th>
			<th>Campus</th>
			<th>Home Address</th>
			<th>Year Graduated</th>
		</tr>
		@foreach($user as $use)
		<tr>
			<td>{{$use->name}} {{$use->middlename}} {{$use->lastname}}</td>
			<td>{{$use->course}}</td>
			<td>{{$use->email}}</td>
			<td>OLFU - {{$use->campus}}</td>
			<td>{{$use->address}}</td>
			<td>{{$use->yeargrad}}</td>
			
		</tr>
		@endforeach
	</table>
	
</center>

</body>
</html>