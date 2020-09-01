<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
        <script src="{{ asset('public/js/app.js') }}" defer></script>

    </head>
    <body>
         @include('navigation')
        <div class="container">
           
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Calculation Total: {{$calculations['calculationTotal']}} €</h2>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Position</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>price</td>
                        <td>{{$calculations['calculationData']->price}} €</td>
                    </tr>
                    <tr>
                        <td>order amount</td>
                        <td>{{$calculations['calculationData']->orderAmount}}</td>
                    </tr>
                    <tr>
                        <td>long product</td>
                        @if ($calculations['calculationData']->longProduct)
                        <td>{{$calculations['calculationData']->longProduct}}</td>
                        @else
                        <td>No</td>
                        @endif
                    </tr>
                    <tr>
                        <td>post code</td>
                        <td>{{$calculations['calculationData']->postcode}}</td>
                    </tr>
                    <tr>
                        <td>discount</td>
                        <td>{{$calculations['discount']}} %</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </body>
</html>
