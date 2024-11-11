<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('clients/images/favicon.png')}}" type="image/x-icon">

  <title>
    {{$titlePage}}
  </title>
    <style>
        .product-details {
            margin-top: 50px;
            margin-bottom: 30px;
        }
        .product-image {
            max-width: 85%;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .product-info h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .product-price {
            color: #e74c3c;
            font-size: 1.6rem;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .product-info p {
            font-size: 1.1rem;
            margin: 5px 0;
        }
        .product-info span.text-muted {
            font-weight: normal;
            color: #6c757d;
        }
        .btn-buy {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            margin-right: 10px;
        }
        .btn-buy:hover {
            background-color: #2980b9;
        }
        .product-description {
            margin-top: 30px;
        }
        .product-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .product-title {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .product-price {
            color: #e74c3c;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .product-info p {
            font-size: 1.1rem;
            margin: 5px 0;
        }

        .quantity label {
            font-weight: 500;
            margin-right: 5px;
        }

        .product-description h5 {
            font-size: 1.25rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .product-description p {
            font-size: 1rem;
            color: #555;
        }

        .button-group .btn {
            font-weight: 600;
            padding: 10px 20px;
        }

        .button-group .btn-success {
            background-color: #28a745;
            border: none;
        }

        .button-group .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .button-group .btn:hover {
            opacity: 0.9;
        }
    </style>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('clients/css/bootstrap.css')}}" />

  <!-- Custom styles for this template -->
  <link href="{{asset('clients/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('clients/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include("client/partials/header")
    <!-- end header section -->
    <!-- slider section -->
    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
    <div class="container product-details">
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6">
                <img src="{{$record->thumbnail}}" alt="Hình sản phẩm" class="product-image">
            </div>
            <!-- Thông tin sản phẩm -->
            <div class="col-md-6 product-info">
                <h1 class="product-title">{{$record->title}}</h1>
                <p class="product-price">{{$record->price}}$</p>
                <p>Trạng thái: <span class="text-success">Còn hàng</span></p>
                <p>Số lượng còn lại: <span class="text-muted">{{$record->stock}}</span></p>
                <p>Nhà sản xuất: <span class="text-muted">{{$record->producers->name}}</span></p>
                <p>Nơi sản xuất: <span class="text-muted">{{$record->producers->place}}</span></p>
                <p>Đơn vị: <span class="text-muted">{{$record->unit->title}}</span></p>
                <div class="quantity d-flex align-items-center mt-3">
                    <label for="quantity" class="me-2">Số lượng:</label>
                    <input type="number" id="quantity" value="1" min="1" class="form-control w-25">
                </div>
                <div class="button-group mt-3">
                    <button class="btn btn-success btn-lg me-2">Thêm vào giỏ hàng</button>
                    <button class="btn btn-danger btn-lg">Mua ngay</button>
                </div>
                <div class="product-description mt-4">
                    <h5>Mô tả sản phẩm</h5>
                    <p>{{$record->descriptions}}</p>
                </div>
            </div>
        </div>
    </div>

  <!-- end shop section -->





  <!-- contact section -->

  <!-- end contact section -->

   

  <!-- info section -->
    <!-- footer section -->
    @include("client/partials/footer")
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="{{asset('clients/js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('clients/js/bootstrap.js')}}"></script>
  <script src="{{asset('clients/js/fillter.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('clients/js/custom.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>