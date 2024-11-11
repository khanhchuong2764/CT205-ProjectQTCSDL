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
    {{$titlePage  }}
  </title>

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
  
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach ($record as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                <a href="/products/detail/{{$item->id}}">
                    <div class="img-box">
                    <img src="{{$item->thumbnail}}" alt="" width="100%">
                    </div>
                    <div class="detail-box">
                    <h6>
                        {{$item->title}}
                    </h6>
                    <h6>
                        Price
                        <span>
                        ${{$item->price}}
                        </span>
                    </h6>
                    </div>
                    <div class="new">
                    <span>
                        New
                    </span>
                    </div>
                </a>
                </div>
            </div>
            
        @endforeach
      {{-- <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div> --}}
    </div>
  </section>    

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

</body>

</html>