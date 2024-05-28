@extends('layouts.app', ['pageTitle' => 'Destinasi'])

@section('content')
	<div class="container pt-3">
		<div class="row align-items-md-stretch" id="dataWrapper">
			@include('destination-item', ['isFirst' => true])
		</div>

		<div class="d-flex justify-content-center pt-1 mb-1 mt-3">
			<button class="btn btn-secondary" type="button" id="btnMore">Load more</button>
		</div>

	</div>
@endsection

@push('script')
	<script>
		$(function(){

			const BASEURL = "{{ route('destination') }}";
			let PAGE = 1;

			$('#btnMore').on('click', function() {
				PAGE++;
				loadMore(PAGE);
			});

			function loadMore(page)
			{
				$.ajax({
					url: BASEURL + '?page=' + page,
					type: 'post',
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					},
				})
				.done(function(response) {
					console.log(response)
					if(response.html == '') {
						$('#btnMore').addClass('d-none');
						return;
					}

					console.log('tes');

					$('#dataWrapper').append(response.html);
					if(!response.isMore) {
						$('#btnMore').addClass('d-none');
					}
				})
				.fail(function(error) {
					alert('Terjadi kesalahan : '+ error)
				})
				.always(function() {

				});
			}

		});
	</script>
@endpush