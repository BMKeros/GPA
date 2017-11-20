@extends('layouts.master_admin')
@section('title')
	Dashboard
@stop

@section('content')

	<div class="row">
        <div class="col-md-12">
         	<div class="x_panel">
         		<h2>Usuarios</h2>
         		<a href="{{ route('products.create') }}" class="btn btn-info btn-md"><i class="fa fa-plus"></i>   Registrar Nuevo Usuario </a>
            	<div class="x_content">
					@foreach($users as $user)
						<div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
						    <div class="well profile_view">
						        <div class="col-sm-12">
						          	<h4 class="brief">

										@if($user->profile == null)
											<i>Perfil no completado</i>
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
						          	<div class="col-xs-12">

						          		@if($user->profile == null)
						          		
						          			Sin Perfil
						          		
						          		@else
											
											<a href="{{ route('profile.show', $user->profile->id) }}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-user"></i> Ver perfil</a>
										
										
											<a href="{{ route('profile.edit', $user->profile->id) }}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-edit"></i> Editar perfil</a>
											
						          			

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