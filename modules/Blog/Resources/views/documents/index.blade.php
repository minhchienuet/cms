@extends('blog::layouts.master')
@section('content')
 
 	{!! Form::open(['url' => Route('documents.upload'), 'class' => 'form-horizontal container-web', 'files'=> true]) !!}
 		{!! Form::file('file_field') !!}
 		<button type="submit" class="btn btn-primary">Lưu lại</button>
 	{!! Form::close() !!}

 <h1> Pictures list</h1>
 
 <div class="row">
 
    <ul class="thumbnails">
		@foreach($documents as $doc)
			<div class="col-md-2">
				<a href="{{ URL::route('documents.download',$doc->filename)}}"> {{ $doc->filename }}</a>
		    </div>
		 @endforeach
 	</ul>
 </div>
 
@endsection
 