@extends('layouts.master') {{--Verificar esta linea--}}
@section('title')
    Perfil
@stop

@section('content')
    <div class="">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
            <br />
        @endif
        <div class="page-title">
            <div class="title_left">
                <h3>Perfir del usuario</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <div class="avatar-view" title="Change the avatar" style="width: 100%;height: 100%;">
                                        <img src="{{ asset('images/user.png') }}"  alt="Avatar">
                                    </div>
                                    <h3>{{ $profile->first_name }} {{ $profile->first_surname }}</h3>
                                    <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Editar perfil</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2>Datos del perifil</h2>
                                </div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <h2><b>Primer nombre:</b></h2>
                                        <h2><b>Segundo nombre:</b></h2>
                                        <h2><b>Primer apellido:</b></h2>
                                        <h2><b>Segundo apellido:</b></h2>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin-left: -13%;">
                                        <h2>{{ $profile->first_name }}</h2>
                                        <h2>{{ $profile->second_name }}</h2>
                                        <h2>{{ $profile->first_surname }}</h2>
                                        <h2>{{ $profile->second_surname }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <h2><b>CI:</b></h2>
                                        <h2><b>Numero celular:</b></h2>
                                        <h2><b>Numero telefono:</b></h2>
                                        <h2><b>Hobby:</b></h2>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin-left: -13%;">
                                        <h2>{{ $profile->cedula }}</h2>
                                        <h2>{{ $profile->number_phone }}</h2>
                                        <h2>{{ $profile->number_cellphone }}</h2>
                                        <h2>{{ $profile->hobby }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px;">
                                    <div class="profile_title">
                                        <div class="col-md-6">
                                            <h2>Actividades</h2>
                                        </div>
                                     </div>
                                
                        
                                
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                        <ul class="messages">
                                             <li>
                                                <img src="{{ asset('images/user.png') }}" class="avatar" alt="Avatar">
                                                <div class="message_date">
                    
                                                </div>
                                                <div class="message_wrapper">
                                                    <h4 class="heading">Solicitud</h4>
                                                    <blockquote class="message">3 kilogramos de maiz blanco</blockquote>
                                                    <br />
                                                    <p class="url">
                                                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
