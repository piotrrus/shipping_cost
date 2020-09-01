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
            <?php //var_dump($postcodes) ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Import result</h2>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Zone</th>
                        <th scope="col">Code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postcodes as $postcode)
                    <tr>
                        <td> {{ $postcode['zone'] }}</td>
                        <td> {{ $postcode['code'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </body>
</html>
