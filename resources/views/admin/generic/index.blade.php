@extends('admin.template')

@section('title')
	{{ $meta->plural }}
@endsection

@section('content')
	<section id="genericIndex">
		<div class="row">
			<div class="small-12 column">
				<h1>
					{!! $meta->plural !!}
					<a id="createNewButton" href="{{ $meta->addURL() }}" class="button small">
						<i class="fi-plus"></i>
						Add {{ $meta->singular }}
					</a>
				</h1>
			</div>
		</div>
		@include('admin.generic.index-search')
		<div class="pagination-centered">
			{!! $models->render(Foundation::paginate($models)) !!}
		</div>
		<div class="row">
			<div class="small-12 column">
				<table>
					<thead>
						<tr>
							<th></th>
							@foreach ($meta->indexCols as $col)
								<th>
									<a href="{{ url('admin/' . $meta->handle . '/order-by/' . $col) }}">
										{!! $meta->cols()[$col]['pretty'] !!}
										@if (session('admin.' . $meta->handle . '.order.column') == $col)
											@if (session('admin.' . $meta->handle . '.order.direction') == 'ASC')
												<i class="fi-arrow-up"></i>
											@else
												<i class="fi-arrow-down"></i>
											@endif
										@endif
									</a>
								</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach ($models as $model)
							<tr>
								<td>
									<a href="{{ url($model->editURL()) }}" class="button tiny editButton">
										<i class="fi-page-edit"></i>
									</a>
								</td>
								@foreach ($meta->indexCols as $col)
									<td>
										{{ $model->$col }}
									</td>
								@endforeach
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="pagination-centered">
			{!! $models->render(Foundation::paginate($models)) !!}
		</div>
	</section>
@endsection