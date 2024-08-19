<!DOCTYPE html>
<html>
<head>
  <title>PHP Razorpay Payment Gateway Integration Example</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <style>
    .card-product .img-wrap {
      border-radius: 3px 3px 0 0;
      overflow: hidden;
      position: relative;
      height: 220px;
      text-align: center;
    }
    .card-product .img-wrap img {
      max-height: 100%;
      max-width: 100%;
      object-fit: cover;
    }
    .card-product .info-wrap {
      overflow: hidden;
      padding: 15px;
      border-top: 1px solid #eee;
    }
    .card-product .bottom-wrap {
      padding: 15px;
      border-top: 1px solid #eee;
    }
    .label-rating { margin-right:10px; color: #333; display: inline-block; vertical-align: middle; }
    .card-product .price-old { color: #999; }
  </style>
</head>
<body>
<div class="container">
  <br><br><br>
  <div class="row">
    <div class="col-md-4">
      <figure class="card card-product">
        <div class="img-wrap"><img src="//www.tutsmake.com/wp-content/uploads/2019/03/c05917807.png"></div>
        <figcaption class="info-wrap">
          <h4 class="title">Mouse</h4>
          <p class="desc">Some small description goes here</p>
          <div class="rating-wrap">
            <div class="label-rating">132 reviews</div>
            <div class="label-rating">154 orders </div>
          </div>
        </figcaption>
        <div class="bottom-wrap">
          <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="1000" data-id="1">Order Now</a> 
          <div class="price-wrap h5">
            <span class="price-new">₹1000</span> <del class="price-old">₹1200</del>
          </div>
        </div>
      </figure>
    </div>
    <div class="col-md-4">
      <figure class="card card-product">
        <div class="img-wrap"><img src="//www.tutsmake.com/wp-content/uploads/2019/03/vvjghg.png"> </div>
        <figcaption class="info-wrap">
          <h4 class="title">Sony Watch</h4>
          <p class="desc">Some small description goes here</p>
          <div class="rating-wrap">
            <div class="label-rating">132 reviews</div>
            <div class="label-rating">154 orders </div>
          </div>
        </figcaption>
        <div class="bottom-wrap">
          <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="1280" data-id="2">Order Now</a> 
          <div class="price-wrap h5">
            <span class="price-new">₹1280</span> <del class="price-old">₹1400</del>
          </div>
        </div>
      </figure>
    </div>
    <div class="col-md-4">
      <figure class="card card-product">
        <div class="img-wrap"><img src="//www.tutsmake.com/wp-content/uploads/2019/03/jhgjhgjg.jpg"></div>
        <figcaption class="info-wrap">
          <h4 class="title">Mobile</h4>
          <p class="desc">Some small description goes here</p>
          <div class="rating-wrap">
            <div class="label-rating">132 reviews</div>
            <div class="label-rating">154 orders </div>
          </div>
        </figcaption>
        <div class="bottom-wrap">
          <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="1500" data-id="3">Order Now</a> 
          <div class="price-wrap h5">
            <span class="price-new">₹1500</span> <del class="price-old">₹1980</del>
          </div>
        </div>
      </figure>
    </div>
  </div>
</div>
<script>
  $('body').on('click', '.buy_now', function(e){
    var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    var options = {
      "key": "rzp_test_lYvxHUQLOcVL4E", // Your Razorpay key id
      "amount": (totalAmount * 100), // Convert amount to paise
      "name": "Tutsmake",
      "description": "Payment",
      "image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
      "handler": function (response){
        $.ajax({
          url: 'https://www.tutsmake.com/Demos/php/razorpay/payment-proccess.php',
          type: 'post',
          dataType: 'json',
          data: {
            razorpay_payment_id: response.razorpay_payment_id,
            totalAmount: totalAmount,
            product_id: product_id,
          },
          success: function (msg) {
            window.location.href = 'https://www.tutsmake.com/Demos/php/razorpay/success.php';
          }
        });
      },
      "theme": {
        "color": "#528FF0"
      }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
  });
</script>
</body>
</html>
