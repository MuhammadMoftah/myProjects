<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title>Ultronic</title>
<!-- SEO Meta
  ================================================== -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="distribution" content="global">
<meta name="revisit-after" content="2 Days">
<meta name="robots" content="ALL">
<meta name="rating" content="8 YEARS">
<meta name="Language" content="en-us">
<meta name="GOOGLEBOT" content="NOARCHIVE">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS
  ================================================== -->
{!! Html::style('frontend/css/font-awesome.min.css') !!}
{!! Html::style('frontend/css/bootstrap.css') !!}

{!! Html::style('frontend/css/jquery-ui.css') !!}
{!! Html::style('frontend/css/owl.carousel.css') !!}
{!! Html::style('frontend/css/fotorama.css') !!}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" /> --}}
{!! Html::style('frontend/css/themify-icons.css') !!}
{!! Html::style('frontend/css/main.css') !!}
<link rel="shortcut icon" href="">
{{-- <link rel="apple-touch-icon" href="http://aaryaweb.info/html/ultronic/ult001/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="http://aaryaweb.info/html/ultronic/ult001/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="http://aaryaweb.info/html/ultronic/ult001/images/apple-touch-icon-114x114.png">
 --}}</head>
<body class="@yield('body_class','homepage')">

     <!-- HEADER START -->
  <header class="navbar navbar-custom container-full-sm" id="header">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <div class="top-link top-link-left">
              <fieldset>
                <select name="speed" class="country">
                  <option selected="selected">English</option>
                  <option>Frence</option>
                  <option>German</option>
                </select>
                <select name="speed" class="currency">
                  <option selected="selected">USD</option>
                  <option>EURO</option>
                  <option>POUND</option>
                </select>
              </fieldset>
            </div>
          </div>
          <div class="col-6">
            <div class="top-right-link right-side">
              <ul>
                <li class="login-icon content">
                  <a class="content-link">
                  <span class="content-icon ti-lock"></span>
                  </a>
                  <a href="login.html" title="Login">Login</a> or
                  <a href="register.html" title="Register">Register</a>
                  <div class="content-dropdown">
                    <ul>
                      <li class="login-icon"><a href="login.html" title="Login"><i class="fa fa-user"></i> Login</a></li>
                      <li class="register-icon"><a href="register.html" title="Register"><i class="fa fa-user-plus"></i> Register</a></li>
                    </ul>
                  </div>
                </li>
                <li class="track-icon">
                  <a href="" title="Track your order"><span class="ti-truck"></span> Track your order</a>
                </li>
                <li class="gift-icon">
                  <a href="" title="Gift card"><span class="ti-gift"></span> Gift card</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle">
      <div class="container">
        <hr>
        <div class="row">
          <div class="col-xl-3 col-md-3 col-lgmd-20per">
            <div class="header-middle-left">
              <div class="navbar-header float-none-sm">
                <a class="navbar-brand page-scroll" href="index.html">
                  <img alt="Ultronic" src="{{ url('frontend/images/logo.png') }}">
                </a>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 col-lgmd-60per">
            <div class="header-right-part">
              <div class="main-search">
                <div class="header_search_toggle desktop-view">
                  <form>
                    <div class="search-box">
                      <input class="input-text" type="text" placeholder="Search entire store here...">
                      <button class="search-btn">
                        <span class="ti-search"></span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="category-dropdown">
                <select id="search-category" name="search-category">
                  <option value="">All Categories</option>
                  <option value="20">Electronics</option>
                  <option value="26">■ PC</option>
                  <option value="43">&nbsp;&nbsp;&nbsp;- Dell Inspiron</option>
                  <option value="44">&nbsp;&nbsp;&nbsp;- Hp Notebook</option>
                  <option value="47">&nbsp;&nbsp;&nbsp;- Sony Vio</option>
                  <option value="55">&nbsp;&nbsp;&nbsp;- Samsung Tablet</option>
                  <option value="27">■ Mac</option>
                  <option value="48">&nbsp;&nbsp;&nbsp;- Desktop Mac</option>
                  <option value="49">&nbsp;&nbsp;&nbsp;- Laptop Mac</option>
                  <option value="50">&nbsp;&nbsp;&nbsp;- Samsung Mac</option>
                  <option value="38">&nbsp;&nbsp;&nbsp;- Android tablets</option>
                  <option value="51">■ Laptops</option>
                  <option value="52">&nbsp;&nbsp;&nbsp;- Accer laptop</option>
                  <option value="56">&nbsp;&nbsp;&nbsp;- apple ipad</option>
                  <option value="53">&nbsp;&nbsp;&nbsp;- HP Laptop</option>
                  <option value="54">&nbsp;&nbsp;&nbsp;- DELL Laptop</option>
                  <option value="18">jewellery</option>
                  <option value="25">Components</option>
                  <option value="29">■ Mice and Trackballs</option>
                  <option value="28">■ Monitors</option>
                  <option value="35">&nbsp;&nbsp;&nbsp;- Desktop</option>
                  <option value="36">&nbsp;&nbsp;&nbsp;- LED</option>
                  <option value="30">■ Printers</option>
                  <option value="31">■ Scanners</option>
                  <option value="32">■ Web Cameras</option>
                  <option value="57">Books</option>
                  <option value="17">Interior</option>
                  <option value="24">Fashion</option>
                  <option value="33">House Hold</option>
                  <option value="34">Accessories</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-3 col-lgmd-20per">
            <div class="right-side float-left-xs header-right-link">
              <ul>
                <li class="compare-icon">
                  <a href="compare.html">
                    <span class="ti-bar-chart"></span>
                  </a>
                </li>
                <li class="wishlist-icon">
                  <a href="wishlist.html">
                    <span class="ti-heart"></span>
                  </a>
                </li>
                <li class="cart-icon"> <a href="index.html#"> <span class="ti-shopping-cart"> <small class="cart-notification">2</small> </span> </a>
                  <div class="cart-dropdown header-link-dropdown">
                    <ul class="cart-list link-dropdown-list">
                      <li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                        <div class="media"> <a class="pull-left"> <img alt="Ultronic" src="{{ url('frontend/images/1.jpg') }}"></a>
                          <div class="media-body"> <span><a href="index.html#">Black African Print Skirt</a></span>
                            <p class="cart-price">$14.99</p>
                            <div class="product-qty">
                              <label>Qty:</label>
                              <div class="custom-qty">
                                <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                        <div class="media"> <a class="pull-left"> <img alt="Ultronic" src="{{ url('frontend/images/2.jpg') }}"></a>
                          <div class="media-body"> <span><a href="index.html#">Black African Print Skirt</a></span>
                            <p class="cart-price">$14.99</p>
                            <div class="product-qty">
                              <label>Qty:</label>
                              <div class="custom-qty">
                                <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <p class="cart-sub-totle"> <span class="pull-left">Cart Subtotal</span> <span class="pull-right"><strong class="price-box">$29.98</strong></span> </p>
                    <div class="clearfix"></div>
                    <div class="mt-20"> <a href="cart.html" class="btn-color btn">Cart</a> <a href="checkout.html" class="btn-color btn right-side">Checkout</a> </div>
                  </div>
                </li>
                <li class="side-toggle">
                  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <div class="row position-r">
          <div class="col-xl-7 col-lg-6 col-lgmd-60per">
            <div class="bottom-inner">
              <div class="position-r">
                <div class="nav_sec position-r">
                  <div class="mobilemenu-title mobilemenu">
                    <span>Menu</span>
                    <i class="fa fa-bars pull-right"></i>
                  </div>
                  <div class="mobilemenu-content">
                    <ul class="nav navbar-nav" id="menu-main">
                      <li class="active">
                        <a href="index.html"><span>Home</span></a>
                      </li>
                      <li>
                        <a href="shop.html"><span>Shop</span></a>
                      </li>
                      <li>
                        <a href="about.html"><span>About Us</span></a>
                      </li>
                      <li>
                        <a href="blog.html"><span>Blog</span></a>
                      </li>
                      <li>
                        <a href="contact.html"><span>Contact</span></a>
                      </li>
                      <li class="level dropdown ">
                        <span class="opener plus"></span>
                        <a href="index.html#" class="page-scroll"><span>Pages</span></a>
                        <div class="megamenu mobile-sub-menu">
                          <div class="megamenu-inner-top">
                            <ul class="sub-menu-level1">
                              <li class="level2">
                                <ul class="sub-menu-level2 ">
                                  <li class="level3"><a href="account.html"><span>■</span>Account</a></li>
                                  <li class="level3"><a href="checkout.html"><span>■</span>Checkout</a></li>
                                  <li class="level3"><a href="compare.html"><span>■</span>Compare</a></li>
                                  <li class="level3"><a href="wishlist.html"><span>■</span>Wishlist</a></li>
                                  <li class="level3"><a href="404.html"><span>■</span>404 Error</a></li>
                                  <li class="level3"><a href="single-blog.html"><span>■</span>Single Blog</a></li>
                                  <li class="level3"><a href="product-page.html"><span>■</span>Product Details</a></li>
                                </ul>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-lgmd-20per">
            <div class="right-side float-left-xs header-right-link">
            <div class="right-side">
              <div class="help-num" >Need Help? : 03 233 455 55</div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="popup-links ">
      <div class="popup-links-inner">
        <ul>
          <li class="categories">
            <a class="popup-with-form" href="index.html#categories_popup"><span class="ti-menu"></span><span class="icon-text">Categories</span></a>
          </li>
          <li class="cart-icon">
            <a class="popup-with-form" href="index.html#cart_popup"><span class="ti-shopping-cart"></span><span class="icon-text">Cart</span></a>
          </li>
          <li class="account">
            <a class="popup-with-form" href="index.html#account_popup"><span class="ti-user"></span><span class="icon-text">Account</span></a>
          </li>
          <li class="search">
            <a class="popup-with-form" href="index.html#search_popup"><span class="ti-search"></span><span class="icon-text">Search</span></a>
          </li>
          <li class="scroll scrollup">
            <a href="index.html#"><span class="ti-arrow-up"></span><span class="icon-text">Scroll-top</span></a>
          </li>
        </ul>
      </div>
      <div id="popup_containt">
        <div id="categories_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>categories</span></h2>
          </div>
          <div class="popup-detail">
            <ul class="cate-inner">
              <li class="level sub-megamenu">
                <span class="opener plus"></span>
                <a href="shop.html" class="page-scroll"><i class="fa fa-female"></i>Fashion (10)</a>
                <div class="megamenu  mega-sub-menu">
                  <div class="megamenu-inner-top">
                    <ul class="sub-menu-level1">
                      <li class="level2">
                        <ul class="sub-menu-level2 ">
                          <li class="level3"><a href="shop.html"><span>■</span>Blazer & Coat</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Skirts</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Tops</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Sleepwear</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Jeans</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-camera-retro"></i>Cameras (70)</a>
              </li>
              <li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-desktop"></i>computers (10)</a>
              </li>
              <li class="level sub-megamenu">
                <span class="opener plus"></span>
                <a href="shop.html" class="page-scroll"><i class="fa fa-clock-o"></i>Wathches (15)</a>
                  <div class="megamenu mega-sub-menu">
                    <div class="megamenu-inner-top">
                      <ul class="sub-menu-level1">
                        <li class="level2">
                          <ul class="sub-menu-level2">
                            <li class="level3"><a href="shop.html"><span>■</span>Dresses</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sport Jeans</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Skirts</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Tops</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sleepwear</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Jeans</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Blazer & Coat</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Phone Cases</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
              </li>
              <li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-shopping-bag"></i>Bags (18)</a>
              </li>
              <li class="level sub-megamenu ">
                <span class="opener plus"></span>
                <a href="shop.html" class="page-scroll"><i class="fa fa-tablet"></i>Smartphones (20)</a>
                <div class="megamenu mega-sub-menu">
                    <div class="megamenu-inner-top">
                      <ul class="sub-menu-level1">
                        <li class="level2">
                          <ul class="sub-menu-level2">
                            <li class="level3"><a href="shop.html"><span>■</span>Dresses</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sport Jeans</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Skirts</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Tops</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sleepwear</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Jeans</a></li>
                          </ul>
                        </li>
                        <li class="level2">
                          <ul class="sub-menu-level2 ">
                            <li class="level3"><a href="shop.html"><span>■</span>Blazer & Coat</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Phone Cases</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                </div>
              </li>
              <li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-heart"></i>Software</a>
              </li>
              <li class="level "><a href="shop.html" class="page-scroll"><i class="fa fa-headphones"></i>Headphone (12)</a></li>
              <li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-microphone"></i>Accessories (70)</a>
              </li>
              <li class="level"><a href="shop.html" class="page-scroll"><i class="fa fa-bolt"></i>Printers & Ink</a></li>
              <li class="level"><a href="shop.html" class="page-scroll"><i class="fa fa-plus-square"></i>More Categories</a></li>
            </ul>
          </div>
        </div>
        <div id="cart_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>cart</span></h2>
          </div>
          <div class="popup-detail">
            <div class="cart-dropdown ">
              <ul class="cart-list link-dropdown-list">
                <li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                  <div class="media"> <a class="pull-left"> <img alt="Ultronic" src="{{ url('frontend/images/1.jpg') }}"></a>
                    <div class="media-body"> <span><a href="index.html#">Black African Print Skirt</a></span>
                      <p class="cart-price">$14.99</p>
                      <div class="product-qty">
                        <label>Qty:</label>
                        <div class="custom-qty">
                          <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                  <div class="media"> <a class="pull-left"> <img alt="Ultronic" src="{{ url('frontend/images/2.jpg') }}"></a>
                    <div class="media-body"> <span><a href="index.html#">Black African Print Skirt</a></span>
                      <p class="cart-price">$14.99</p>
                      <div class="product-qty">
                        <label>Qty:</label>
                        <div class="custom-qty">
                          <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <p class="cart-sub-totle"> <span class="pull-left">Cart Subtotal</span> <span class="pull-right"><strong class="price-box">$29.98</strong></span> </p>
              <div class="clearfix"></div>
              <div class="mt-20"> <a href="cart.html" class="btn-color btn">Cart</a> <a href="checkout.html" class="btn-color btn right-side">Checkout</a> </div>
            </div>
          </div>
        </div>
        <div id="account_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>Account</span></h2>
          </div>
          <div class="popup-detail">
            <div class="row">
              <div class="col-lg-4">
                <a href="account.html">
                  <div class="account-inner mb-30">
                    <i class="fa fa-user"></i><br/>
                    <span>Account</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="register.html">
                  <div class="account-inner mb-30">
                    <i class="fa fa-user-plus"></i><br/>
                    <span>Register</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="cart.html">
                  <div class="account-inner mb-30">
                    <i class="fa fa-shopping-bag"></i><br/>
                    <span>Shopping</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="account.html#step4">
                  <div class="account-inner">
                    <i class="fa fa-key"></i><br/>
                    <span>Change Pass</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="account.html#step3">
                  <div class="account-inner">
                    <i class="fa fa-history"></i><br/>
                    <span>history</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="login.html">
                  <div class="account-inner">
                    <i class="fa fa-share-square-o"></i><br/>
                    <span>log out</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="search_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>Search</span></h2>
          </div>
          <div class="popup-detail">
            <div class="main-search">
              <div class="header_search_toggle desktop-view">
                <form>
                  <div class="search-box">
                    <input class="input-text" type="text" placeholder="Search entire store here...">
                    <button class="search-btn"></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- HEADER END -->


    @yield('content')

  <!-- FOOTER START -->
  <div class="footer">
    <div class="container">
      <div class="footer-inner">
        <div class="footer-middle">
          <div class="row">
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <div class="f-logo">
                  <a href="index.html" class="">
                    <img src="{{ url('frontend/images/footer-logo.png') }}" alt="Ultronic">
                  </a>
                </div>
                <div class="footer-block-contant">
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life. Always remember in the jungle there’s a lot of they in.</p>
                    <p>It’s on you how you want to live your life. Everyone has a choice.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Help <span></span></h3>
                <ul class="footer-block-contant link">
                  <li><a href="index.html#">Gift Cards</a></li>
                  <li><a href="index.html#">Order Status</a></li>
                  <li><a href="index.html#">Free Shipping</a></li>
                  <li><a href="index.html#">Return & Exchange </a></li>
                  <li><a href="index.html#">International</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Guidance <span></span></h3>
                <ul class="footer-block-contant link">
                  <li><a href="index.html#"> Delivery information</a></li>
                  <li><a href="index.html#"> Privacy Policy</a></li>
                  <li><a href="index.html#"> Terms & Conditions</a></li>
                  <li><a href="index.html#"> Contact</a></li>
                  <li><a href="index.html#"> Sitemap</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">address<span></span></h3>
                <ul class="footer-block-contant address-footer">
                  <li class="item"> <i class="fa fa-map-marker"> </i>
                    <p>150-A Appolo aprtment, opp. Hopewell Junction, <br>Allen st Road, new york-405001.</p>
                  </li>
                  <li class="item"> <i class="fa fa-envelope"> </i>
                    <p> <a href="index.html#">infoservices@ultronic.com </a> </p>
                  </li>
                  <li class="item"> <i class="fa fa-phone"> </i>
                    <p>(+91) 9834567890</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="footer-bottom ">
          <div class="row mtb-30">
            <div class="col-lg-6 ">
              <div class="copy-right ">© 2017  All Rights Reserved. Design By <a href="index.html#">Aaryaweb</a></div>
            </div>
            <div class="col-lg-6 ">
              <div class="footer_social pt-xs-15 center-sm">
                <ul class="social-icon">
                  <li><div class="title">Follow us on :</div></li>
                  <li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                  <li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                  <li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
                  <li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
                  <li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <hr>
          <div class="row align-center mtb-30 ">
            <div class="col-12 ">
              <div class="site-link">
                <ul>
                  <li><a href="index.html#">About Us</a></li>
                  <li><a href="index.html#">Contact Us</a></li>
                  <li><a href="index.html#">Customer </a></li>
                  <li><a href="index.html#">Service</a></li>
                  <li><a href="index.html#">Privacy</a></li>
                  <li><a href="index.html#">Policy </a></li>
                  <li><a href="index.html#">Accessibility</a></li>
                  <li><a href="index.html#">Directory </a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row align-center">
            <div class="col-12 ">
              <div class="payment">
                <ul class="payment_icon">
                  <li class="visa"><a href="index.html#"><img src="{{ url('frontend/images/pay1.png') }}" alt="Ultronic"></a></li>
                  <li class="discover"><a href="index.html#"><img src="{{ url('frontend/images/pay2.png') }}" alt="Ultronic"></a></li>
                  <li class="paypal"><a href="index.html#"><img src="{{ url('frontend/images/pay3.png') }}" alt="Ultronic"></a></li>
                  <li class="vindicia"><a href="index.html#"><img src="{{ url('frontend/images/pay4.png') }}" alt="Ultronic"></a></li>
                  <li class="atos"><a href="index.html#"><img src="{{ url('frontend/images/pay5.png') }}" alt="Ultronic"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-top">
    <div class="scrollup"></div>
  </div>
  <!-- FOOTER END -->
</div>
{!! Html::script('frontend/js/jquery-1.12.3.min.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
{!! Html::script('frontend/js/bootstrap.min.js') !!}
{!! Html::script('frontend/js/jquery.downCount.js') !!}
{!! Html::script('frontend/js/jquery-ui.min.js') !!}
{!! Html::script('frontend/js/fotorama.js') !!}
{!! Html::script('frontend/js/jquery.magnific-popup.js') !!}
{!! Html::script('frontend/js/owl.carousel.min.js') !!}
{!! Html::script('frontend/js/custom.js') !!}

<script>
  /* ------------ Newslater-popup JS Start ------------- */
  // $(window).load(function() {
  //   $.magnificPopup.open({
  //     items: {src: '#newslater-popup'},type: 'inline'}, 0);
  // });
    /* ------------ Newslater-popup JS End ------------- */
</script>

</body>
</html>


