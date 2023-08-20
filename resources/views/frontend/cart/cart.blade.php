@extends("frontend/master/master")
@section("title", "Vietpro Store - Giỏ Hàng")
@section("main")
    <!-- main -->
    <div class="colorlib-shop">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="process-wrap">
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Giỏ hàng</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>02</span></p>
                            <h3>Thanh toán</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>03</span></p>
                            <h3>Hoàn tất thanh toán</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="product-name">
                        <div class="one-forth text-center">
                            <span>Chi tiết sản phẩm</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Giá</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Số lượng</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Tổng</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Xóa</span>
                        </div>
                    </div>
                    @if($cart && count($cart)>0)
                        @foreach($cart as $product)
                    <div class="product-cart">
                        <div class="one-forth">
                            <div class="product-img">
                                <img class="img-thumbnail cart-img" src="../uploads/{{$product->options->image}}">
                            </div>
                            <div class="detail-buy">
                                <h4>Mã : {{$product->options->code}}</h4>
                                <h5>{{$product->name}}</h5>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">{{$product->price}}đ</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <input onclick="updateCart('{{$product->rowId}}', this.value)" type="number" id="quantity" name="quantity"
                                       class="form-control input-number text-center" value="1">
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">{{$product->price * $product->qty}} đ</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <a onclick="deleteCart('{{$product->rowId}}')" href="#" class="closed"></a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @endif


                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-3 col-md-push-1 text-center">
                                <div class="total">
                                    <div class="sub">
                                        <p><span>Tổng:</span> <span>{{$priceTotal}} đ</span></p>
                                    </div>
                                    <div class="grand-total">
                                        <p><span><strong>Tổng cộng:</strong></span> <span>{{$priceTotal}} đ</span></p>
                                        <a href="checkout.html" class="btn btn-primary">Thanh toán <i
                                                class="icon-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end main -->


    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <script>
        function updateCart(rowId, qty){
            $.get("/gio-hang/cap-nhat-gio-hang/"+rowId+"/"+qty, function(data, status){
                if(data=="updated"){
                    location.reload();
                }
            });
        }

        function deleteCart(rowId){
            $.get("/gio-hang/xoa-hang/"+rowId, function (data, status){
                if (data == "deleted"){
                    location.reload();
                }
                return false;
            });
        }
    </script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>

    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>



    <!-- Main -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
@endsection
