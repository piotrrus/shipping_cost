@extends('layouts.app')

@section('content')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $content = $response->getContent();
                            $array   = json_decode($content, true);
                            ?>
                            <h2>Calculation Total: {{$calculations['calculationData']->totalPrice}} €</h2>
                            @if ( $array['success']==1)
                            <div class="alert alert-success" role="alert">
                                {{$array['message']}}
                            </div>
                            @endif
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
                        <td>order amount</td>
                        <td>{{$calculations['calculationData']->orderAmount}}</td>
                    </tr>
                    <tr>
                        <td>long product</td>
                        @if ($calculations['calculationData']->longProduct)
                        <td>yes</td>
                        @else
                        <td>no</td>
                        @endif
                    </tr>
                    <tr>
                        <td>post code</td>
                        <td>{{$calculations['calculationData']->postcode}}</td>
                    </tr>
                    <tr>
                        <td>discount</td>
                        <td>{{$calculations['calculationData']->discount * 100}} %</td>
                    </tr>

                </tbody>
            </table>
        </div>

@endsection
