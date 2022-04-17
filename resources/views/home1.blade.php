@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
         <div id="map" style="height:500px">
	       </div>
	       
	    {{-- 以下を追加 --}}
        {!! Form::open(['route' => 'result.currentLocation','method' => 'get']) !!}
    　　 {{--隠しフォームでresult.currentLocationに位置情報を渡す--}}
    　　 {{--lat用--}}
    　　 {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
    　　 {{--lng用--}}
    　　 {!! Form::hidden('lng','lng',['class'=>'lng_input']) !!}
    　　 {{--setlocation.jsを読み込んで、位置情報取得するまで押せないようにdisabledを付与し、非アクティブにする。--}}
    　　 {{--その後、disableはfalseになるようにsetlocation.js内に記述した--}}
    　　 {!! Form::submit("周辺を表示", ['class' => "btn btn-success btn-block",'disabled']) !!}
    　　 {!! Form::close() !!}
	     
	     <script src="{{asset('https://code.jquery.com/jquery-3.5.1.js')}}" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>  
	     
	   @push('js')
	    <script src="{{ asset('/js/setLocation.js') }}"></script>
        <script src="{{ asset('/js/map.js') }}"></script> 
        @endpush
	    <script src="{{asset('https://maps.googleapis.com/maps/api/js?language=en&region=JP&key=AIzaSyB6I9Y_Q_KNO_YZs2pLZuN5-sWR95kpNII&callback=initMap')}}" async defer>
	    </script>
	    
        
@endsection
