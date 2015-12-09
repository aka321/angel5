@extends('admin.template')

@section('css')
	<link href="/js/jquery/jquery.datetimepicker.css" rel="stylesheet">
	<link href="/js/jquery/fancybox/jquery.fancybox.css" rel="stylesheet">
@endsection

@section('js')
	<script src="/js/ckeditor/ckeditor.js"></script>
	<script src="/js/jquery/jquery.datetimepicker.js"></script>
	<script src="/js/jquery/fancybox/jquery.fancybox.pack.js"></script>

	<script>
		// Date / time picker
		$('input.dateTime').datetimepicker({
			format: 'Y-m-d H:i:00'
		});

		// Date picker
		$('input.date').datetimepicker({
			timepicker:false,
			format: 'Y-m-d'
		});

		$('.fancybox').fancybox();
	</script>
@endsection

@section('content')
	<section id="genericAddOrEdit">
		<div class="row">
			<div class="columns small-12">
				<p>
					<a href="{{ $meta->indexURL() }}">
						<i class="fi-arrow-left"></i>
						Back to index
					</a>
				</p>
				<h1>{{ ucfirst($action) . ' ' . $meta->singular }}</h1>
			</div>
		</div>
		@if ($action == 'edit')
			{!! Form::model($model) !!}
		@elseif ($action == 'add')
			{!! Form::open() !!}
		@endif
			@include('admin.generic.cols', ['cols' => $meta->cols()])
			<div class="row">
				<div class="columns small-12">
					<button type="submit">
						Save
					</button>
				</div>
			</div>
		{!! Form::close() !!}
		<div class="row">
			<div class="columns small-12">
				<p>
					<a href="{{ $meta->indexURL() }}">
						<i class="fi-arrow-left"></i>
						Back to index
					</a>
				</p>
			</div>
		</div>
	</section>
@endsection