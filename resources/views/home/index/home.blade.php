@extends('layouts.home.master')
@include('layouts.home.alert')
@section('content')
    <h1>New Product</h1>
    <div class="row previews">
        <?php echo $newProductInView; ?>
    </div>
    <h1>Best Seller</h1>
    <div class="row previews">
        <?php echo $bestSellerProduct; ?>
    </div>






@stop