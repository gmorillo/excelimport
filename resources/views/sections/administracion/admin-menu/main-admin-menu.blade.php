@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
    	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-4">
			@include('sections.administracion.admin-menu.left-menu')
		</div>
		<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 mt-4">
			<div class="mt 5">
                    @if ( Session::has('success') )
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>{{ Session::get('success') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="mt-5">
                    @if ( Session::has('error') )
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>{{ Session::get('error') }}</strong>
                        </div>
                        @endif

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <div>
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
			@yield('adminContent')
		</div>
    </div>
</div>
@endsection