<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

      <style type="text/css">
.db-bk-color-one {
    background-color: #f55039;
}
.db-bk-color-two {
    background-color: #46A6F7;
}
.db-bk-color-three {
    background-color: #47887E;
}
.db-bk-color-six {
    background-color: #F59B24;
}
.db-padding-btm {
    padding-bottom: 50px;
}
.db-button-color-square {
    color: #fff;
    background-color: rgba(0, 0, 0, 0.50);
    border: none;
    border-radius: 0px;
}
.db-button-color-square:hover {
    color: #fff;
    border: none;
}
.db-pricing-eleven {
    margin-bottom: 30px;
    margin-top: 50px;
    text-align: center;
    box-shadow: 0 0 5px rgba(0, 0, 0, .5);
    color: #fff;
    line-height: 30px;
}
.db-pricing-eleven ul {
    list-style: none;
    margin: 0;
    text-align: center;
    padding-left: 0px;
}
.db-pricing-eleven ul li {
    padding-top: 10px;
    padding-bottom: 10px;
    cursor: pointer;
}
.db-pricing-eleven ul li i {
    margin-right: 5px;
}
.db-pricing-eleven .price {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 40px 20px 20px 20px;
    font-size: 60px;
    font-weight: 900;
    color: #FFFFFF;
}
.db-pricing-eleven .price small {
    color: #B8B8B8;
    display: block;
    font-size: 12px;
    margin-top: 22px;
}
.db-pricing-eleven .type {
    background-color: #52E89E;
    padding: 40px 10px;
    font-weight: 900;
    text-transform: uppercase;
    font-size: 30px;
}
.db-pricing-eleven .pricing-footer {
    padding: 10px;
}
.db-pricing-eleven.popular {
    margin-top: 10px;
}
.db-pricing-eleven.popular .price {
    padding-top: 50px;
}
</style>
    </head>
    <body>
        <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
                <div class="panel-heading">Paywith Paypal</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Paypal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
</html>
