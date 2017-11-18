@extends('layouts.master_admin')
@section('title')
	Dashboard
@stop

@section('content')

	<div class="row">
        <div class="col-md-12">
         	<div class="x_panel">
            	<div class="x_content">
					@foreach($users as $user)
						<div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
						    <div class="well profile_view">
						        <div class="col-sm-12">
						          	<h4 class="brief">

										@if($user->profile == null)
											<i>Peril no completado</i>
									  	@else
											<i>{{ $user->profile->first_name }} {{ $user->profile->first_surname }}</i>
									  	@endif
				
						          	</h4>
						          	<div class="left col-xs-12">
						            	<ul class="list-unstyled">
						              		<li>
						              			<i class="fa fa-phone"></i> {{ $user->profile->number_phone or 'No proporcionado'}}
						              		</li>
						              		<li>
						              			<i class="fa fa-envelope"></i> {{ $user->email}}
						              		</li>
						            		<li>
						            			<i class="fa fa-child"></i> {{ $user->profile->hobby or 'No proporcionado'}}
						            		</li>
						            	</ul>
						          	</div>
						        </div>
								<div>j</div>
						        <div class="col-xs-12 bottom text-center" >
						          	<div class="col-xs-12 col-sm-6 emphasis">
						            	<p class="ratings">
											
						            	</p>
						          	</div>
						          	<div class="col-xs-12 col-sm-6 emphasis">

						          		@if($user->profile == null)
						          		
						          			Sin Perfil
						          		
						          		@else

						          			<a href="{{ route('profile.show', $user->profile->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Ver perfil</a>

						          		@endif
						       
						          	</div>
						        </div>
						    </div>
						</div>
					@endforeach
                </div>
			</div>
		</div>
	</div>
@stop