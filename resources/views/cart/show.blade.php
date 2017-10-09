@extends('layouts.master') 

@section('title') 
    Carrito 
@stop 

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">


            <div class="x_content">
                <!-- title row -->

                <div class="row">
                    <div class="col-xs-12 invoice-header">
                        <h1>Invoice. <small class="pull-right">Date:
                        16/08/2016</small></h1>
                    </div><!-- /.col -->
                </div><!-- info row -->

                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From

                        <address>
                            <strong>Iron Admin, Inc.</strong><br />
                            795 Freedom Ave, Suite 600<br />
                            New York, CA 94107<br />
                            Phone: 1 (804) 123-9876<br />
                            Email: ironadmin.com
                        </address>
                    </div><!-- /.col -->

                    <div class="col-sm-4 invoice-col">
                        To

                        <address>
                            <strong>John Doe</strong><br />
                            795 Freedom Ave, Suite 600<br />
                            New York, CA 94107<br />
                            Phone: 1 (804) 123-9876<br />
                            Email: jon@ironadmin.com
                        </address>
                    </div><!-- /.col -->

                    <div class="col-sm-4 invoice-col">
                        <b>Invoice #007612</b><br />
                        <br />
                        <b>Order ID:</b> 4F3S8J<br />
                        <b>Payment Due:</b> 2/22/2014<br />
                        <b>Account:</b> 968-34567
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- Table row -->

                <div class="row">
                    <div class="col-xs-12 table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Imagen</th>

                                    <th>Producto</th>

                                    <th>Precio</th>

                                    <th>Cantidad</th>

                                    <th>Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($cart as $item)
                                    <tr>
                                        <td><img src="{{ $item->image }}" alt=""></td>

                                        <td>{{ $item->name }}</td>

                                        <td>{{ number_format($item->price,2) }}</td>

                                        <td>{{ $item->quantity }}</td>

                                        <td>{{ number_format($item->price * $item->quantity,2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->

                    <div class="col-xs-6">
                        <p class="lead">Payment Methods:</p><img src=
                        "images/visa.png" alt="Visa" /> <img src=
                        "images/mastercard.png" alt="Mastercard" /> <img src=
                        "images/american-express.png" alt="American Express" />
                        <img src="images/paypal2.png" alt="Paypal" />

                        <p class="text-muted well well-sm no-shadow" style=
                        "margin-top: 10px;">Etsy doostang zoodles disqus groupon
                        greplin oooj voxy zoodles, weebly ning heekya handango imeem
                        plugg dopplr jibjab, movity jajah plickers sifteo edmodo
                        ifttt zimbra.</p>
                    </div><!-- /.col -->

                    <div class="col-xs-6">
                        <p class="lead">Amount Due 2/22/2014</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>

                                        <td>$250.30</td>
                                    </tr>

                                    <tr>
                                        <th>Tax (9.3%)</th>

                                        <td>$10.34</td>
                                    </tr>

                                    <tr>
                                        <th>Shipping:</th>

                                        <td>$5.80</td>
                                    </tr>

                                    <tr>
                                        <th>Total:</th>

                                        <td>$265.24</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- this row will not appear when printing -->

                <div class="row no-print">
                    <div class="col-xs-12">
                        <button class="btn btn-default" onclick=
                        "window.print();">Print</button> <button class=
                        "btn btn-success pull-right"> Submit Payment</button>
                        <button class="btn btn-primary pull-right" style=
                        "margin-right: 5px;"> Generate PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- footer content -->

<div class="copyright-info">
    <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href=
    "https://colorlib.com">Colorlib</a></p>
</div>

<div class="clearfix"></div><!-- /footer content -->
@stop