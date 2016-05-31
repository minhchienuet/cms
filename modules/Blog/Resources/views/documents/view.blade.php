@extends('blog::layouts.master')
@section('content')
<div>
	<embed width="100%" height="100%" name="plugin" src="{{$url}}" type="{{$file->mime}}">
</div>

@stop