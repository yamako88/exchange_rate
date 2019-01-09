<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">

        <form method="post" action="{{url('create') }}">

            {{ csrf_field() }}

            <h4 style="margin: 20px;">為替レート計算</h4>

            <div class="form-group{{ $errors->has('exchange') ? ' has-error' : '' }}">
                <select name="rate">
                    <option value="jpy">日本円</option>
                    <option value="cad">カナダドル</option>
                </select>
                <br>
                <label for="exchange">ドルで入力してください</label>
                <div class="col-md-6">
                    <input id="exchange" type="text" class="form-control" name="exchange" value="{{ old('exchange') }}"
                           required autofocus>ドル

                    @if ($errors->has('exchange'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('exchange') }}</strong>
                                </span>
                    @endif
                </div>
            </div>

            <button type="submit">
                {{__("変換")}} <br/>
            </button>

        </form>

        <h5>ドルから円に変換</h5>
        @if($usd)
            <p style="font-size: 6px;">{{ $usd }}ドル・・・</p>
        @endif
        @if($exchangeResult)
            <h4>{{ number_format($exchangeResult) }}円</h4>
        @endif

    </div>
</div>
</body>
</html>
