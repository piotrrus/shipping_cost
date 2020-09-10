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
        echo Form::open(['url' => 'calculate', 'name' => 'calculation', 'id' => 'calculation']);
        ?>
        <div class = "row">
            <div class = "col">
                <input type="text" class="form-control" name="order_amount" id="order_amount" required readonly>
                <label for="order_amount">Order amount
                    @if($errors->has('order_amount'))
                    <span class="text-danger">{{ $errors->first('order_amount') }} </span>
                    @endif
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="postcode" id="postcode" required maxlength="5">
                <label for="postcode">Postcode
                    @if($errors->has('postcode'))
                    <span class="text-danger">{{ $errors->first('postcode') }}</span>
                    @endif
                </label>
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

<script>

    $("#postcode").change(function () {
        var postcode = $("#postcode").val();
        console.log(postcode);
        if (postcode.length ==2 && (!isNaN(postcode)) ) {
            findPricecInPostCode(postcode);
        }
    });

    function findPricecInPostCode(postcode) {
        var zone = postcode;

        $.getJSON("import", function (result) {
            zone = postcode.substring(0, 2);
            console.log(result);
            var obj = Object.values(result).find(o => o.zone === zone);
            $("#order_amount").val(obj.code);
        });

    }
</script>
@endsection
