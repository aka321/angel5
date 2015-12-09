@extends('admin.template-iframe')

@section('css')
@endsection

@section('js')
	<script>
		$(function() {
			$('.deleteCategory').click(function(e) {
				if (!confirm('Really delete this category?')) e.preventDefault();
			});
		});
	</script>
@endsection

@section('content')
	<section id="editCategories">
		<div class="row">
			<div class="columns small-12">
				<h3>Categories</h3>
				<p>Changes you make to the categories are effective immediately.</p>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12">
				<table>
					<thead>
					<tr>
						<th>Name</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					@foreach ($categories as $category)
						<tr>
							<td>
								{{ $category->name }}
							</td>
							<td>
								<a class="button tiny alert deleteCategory" href="{{ url('admin/categories/delete/' . $category->id) }}">
									<i class="fi-x"></i>
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="columns small-12">
				{!! Form::open(['url' => 'admin/categories/add']) !!}
					{!! Form::hidden('Model', get_class($model)) !!}
					{!! Form::hidden('id', $model->id) !!}
					<div class="row">
						<div class="columns small-12">
							<div class="panel">
								<h4>Add a Category</h4>
								<label>
									Category
									{!! Form::select('category', ED100\Category::dropdown()) !!}
								</label>
								<p><strong><i>-or-</i></strong></p>
								<label>
									Create New Category
									{!! Form::text('category_new') !!}
								</label>
								<div class="text-right">
									<button type="submit" class="button small">
										<i class="fi-plus"></i>
										Add Category
									</button>
								</div>
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</section>
@endsection