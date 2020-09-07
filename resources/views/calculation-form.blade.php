@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <h2>Calculate total price</h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <p>Calculation form - shipping cost</p>
        <?php
        echo Form::open(['url' => 'calculate']);
        ?>
        <div class = "row">
            <div class = "col">
                <select class="form-control" name="price" id="price" required>
                    @foreach ($postcodes as $postcode)
                    <option value="{{$postcode['zone']}}, {{$postcode['price']}}">
                        zone: {{$postcode['zone']}} price: {{$postcode['price']}}
                    </option>
                    @endforeach
                </select>
                <label for="price">Price</label>
            </div>
        </div>

        <div class = "row">
            <div class = "col">
                <input type="text" class="form-control" name="order_amount" id="order_amount" required>
                <label for="order_amount">Order amount</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="postcode" id="postcode" required maxlength="5">
                <label for="postcode">Postcode</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="checkbox" class="form-check-input" id="long_product" name="long_product" value="1">
                <label for="long_product">Long product</label>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary submit">Submit</button>
        </div>
        <?php echo Form::close(); ?>
    </div>
</div>
@endsection
