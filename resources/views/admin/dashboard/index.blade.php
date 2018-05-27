@extends('admin/index')
       
@section('section')
    <div class="col-lg-4 col-md-4 dashboard-box">
    	<a href="{{ url('admin/slider') }}">
    		<div>
	    		<i class="fas fa-bookmark"></i> slider
	    	</div>
	    	<div>
	    		{{ $Data['SliderCnt'] }}
	    	</div>
    	</a>
    </div>
    <div class="col-lg-4 col-md-4 dashboard-box">
    	<a href="{{ url('admin/services') }}">
    		<div>
	    		<i class="fas fa-taxi"></i> services
	    	</div>
	    	<div>
	    		{{ $Data['ServicesCnt'] }}
	    	</div>
    	</a>
    </div>
    <div class="col-lg-4 col-md-4 dashboard-box">
    	<a href="{{ url('admin/subscribers') }}">
    		<div>
    			<i class="fas fa-users"></i> subscribers
	    	</div>
	    	<div>
	    		{{ $Data['SubscCnt'] }}
	    	</div>
    	</a>
    </div>
@endsection
        
