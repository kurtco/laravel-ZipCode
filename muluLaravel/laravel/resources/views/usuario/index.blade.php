@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@section('content')
	<h1>Agent 1</h1>
	<table class="table">
		<thead>
			<th>AgentId </th>
			<th>Contact Name</th>
			<th>Contact Zipcode</th>
		</thead>
		@foreach($users as $user)
			<tbody>
				<td>{{$user["id"]}}</td>
				<td>{{$user["name"]}}</td>
				<td>{{$user["zipcode"]}}</td>
			</tbody>
		@endforeach
	</table>
	<br><br>

	<h1>Agent 2</h1>
	<table class="table">
		<thead>
			<th>AgentId </th>
			<th>Contact Name</th>
			<th>Contact Zipcode</th>
		</thead>
		@foreach($users2 as $user2)
			<tbody>
				<td>{{$user2["id"]}}</td>
				<td>{{$user2["name"]}}</td>
				<td>{{$user2["zipcode"]}}</td>
			</tbody>
		@endforeach
	</table>


	@endsection