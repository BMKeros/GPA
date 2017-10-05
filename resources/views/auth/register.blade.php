<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
    
        <div id="wrapper">
            <div class="animate form">
                <section class="login_content">
                    <form method="POST" action="{{ route('register') }}"">
                    {{csrf_field()}}
                        <h1>Registro</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Nombre de Usuario" required="" name="name" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Correo" required="" name="email"/>
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Contraseña" required="" name="password" />
                        </div>
                        
                        <div>
                            <input type="password" class="form-control" placeholder="Repita la contraseña" required="" name="password_confirmation" />
                        </div>

                        <div>
                            <button type="submit" class="btn btn-default submit" >Registrar</button>
                    
                        </div>
                        <div class="clearfix"></div>

                        <div class="separator">

                            <p class="change_link">Ya eres miembro ?
                            <a href="/login" class="to_register"> Entrar </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <p>©2017 Todos lo derechos reservados.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

</body>

</html>