@if (Session::has('flash_notification.message'))
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	    @if (Session::has('flash_notification.overlay'))
	        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
	    @else
	        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

	            {{ Session::get('flash_notification.message') }}
	        </div>
	    @endif
	</div>
@endif
