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
	<h1>No. of Registered Alumni who are Unemployed</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Employment Status</th>
			<th>Year Graduated</th>
			<th>Email</th>
			<th>Course</th>
			<th>Home Address</th>
			<th>Campus</th>
		</tr>
		@foreach($user as $use)
		<tr>
			<td>{{$use->name}} {{$use->middlename}} {{$use->lastname}}</td>
			<td>{{$use->employment}}</td>
			<td>{{$use->yeargrad}}</td>
			<td>{{$use->email}}</td>
			<td>{{$use->course}}</td>
			<td>{{$use->address}}</td>
			<td>OLFU - {{$use->campus}}</td>
			
		</tr>
		@endforeach
	</table>
</center>

</body>
</html>