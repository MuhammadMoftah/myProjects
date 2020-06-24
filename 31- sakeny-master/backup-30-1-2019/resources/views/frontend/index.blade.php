@extends('frontend.layouts.app')

@section('meta_title','Home')
@section('meta_description','Home')
@section('meta_keywords','Home')


@section('content')
    <!-- BANNER STRAT -->
  <section class="">
    <div class="banner">
      <div class="main-banner">
        <div class="banner-1"> <img src="{{ url('frontend/images/banner1.jpg') }}" alt="">
          <div class="banner-detail">
            <div class="container-fluid">
              <div class="row">
                <div class="col-8">
                  <div class="banner-detail-inner">
                    <span class="slogan">UP TO <span class="number">25% OFF</span></span>
                    <h1 class="banner-title">More Fashion Styles</h1>
                    <span class="offer">The latest fashion trends online.</span>
                  </div>
                  <a class="btn btn-color" href="shop.html">Shop Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-2"> <img src="{{ url('frontend/images/banner2.jpg') }}" alt="">
          <div class="banner-detail">
            <div class="container-fluid">
              <div class="row">
                <div class="col-8">
                  <div class="banner-detail-inner">
                    <span class="slogan">UP TO 25% OFF</span>
                    <h1 class="banner-title">More Fashion Styles</h1>
                    <span class="offer">The latest fashion trends online.</span>
                  </div>
                  <a class="btn btn-color" href="shop.html">Shop Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-3"> <img src="{{ url('frontend/images/banner3.jpg') }}" alt="">
          <div class="banner-detail">
            <div class="container-fluid">
              <div class="row">
                <div class="col-8">
                  <div class="banner-detail-inner">
                    <span class="slogan">UP TO 25% OFF</span>
                    <h1 class="banner-title">More Fashion Styles</h1>
                    <span class="offer">The latest fashion trends online.</span>
                  </div>
                  <a class="btn btn-color" href="shop.html">Shop Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- BANNER END -->

  <!-- CONTAIN START -->

    <!-- SUB-BANNER START -->
    <div class="sub-banner-block ">
      <div class="">
        <div class=" center-sm">
          <div class="row m-0">
            <div class="col-md-4 mt-xs-30 p-0">
              <div class="sub-banner sub-banner1" >
                <img alt="" src="{{ url('frontend/images/sub-banner1.jpg') }}">
                <div class="sub-banner-detail">
                  <div class="sub-banner-title sub-banner-title-color">Most Popular Sunglasses</div>
                  <div class="sub-banner-subtitle">Latest, Stylish and Trendy Collection</div>
                  <a class="btn btn-color" href="shop.html">Shop Now!</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-xs-30 p-0">
              <div class="">
                <div class="sub-banner sub-banner2">
                  <img alt="" src="{{ url('frontend/images/sub-banner2.jpg') }}">
                  <div class="sub-banner-detail">
                    <div class="sub-banner-title sub-banner-title-color">Shoes & Footwear</div>
                    <div class="sub-banner-subtitle"> range of footwea & shoes for men & women</div>
                    <a class="btn btn-color " href="shop.html">Shop Now!</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-xs-30 p-0">
              <div class="sub-banner sub-banner3" >
                <img alt="" src="{{ url('frontend/images/sub-banner3.jpg') }}">
                <div class="sub-banner-detail">
                  <div class="sub-banner-title sub-banner-title-color">Shop Watches Online</div>
                  <div class="sub-banner-subtitle">Latest range of Digital & Analog Watches</div>
                  <a class="btn btn-color " href="shop.html">Shop Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SUB-BANNER END -->

    <!--  New arrivals Products Slider Block Start  -->
    <section class="pt-70">
      <div class="container">
        <div class="product-listing">
          <div class="row">
            <div class="col-12">
              <div class="heading-part mb-30 mb-xs-15">
                <h2 class="main_title heading"><span>New Arrivals</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div class="owl-carousel pro-cat-slider ">
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/1.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item sold-out">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/12.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item sold-out mb-30">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/2.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/9.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/3.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/10.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/4.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item sold-out">
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/7.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/8.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/12.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/6.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/11.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/13.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/4.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/12.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/15.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/16.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/2.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/10.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                              <span class="ti-heart"></span>
                            </a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                              <span class="ti-bar-chart"></span>
                            </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/1.jpg') }}" alt=""> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  New arrivals Products Slider Block End  -->

    <!-- Top Categories Start-->
    <section class=" ptb-70">
      <div class="top-cate-bg ptb-70">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="heading-part mb-30 mb-xs-15">
                <h2 class="main_title heading"><span>Top Categories</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div id="top-cat-pro" class="owl-carousel sell-pro align-center">
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="{{ url('frontend/images/1.jpg') }}" alt="">
                      <div class="cate-detail">
                        <span>Women tops</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="{{ url('frontend/images/2.jpg') }}" alt="">
                      <div class="cate-detail">
                        <span>Men’s jackets</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="{{ url('frontend/images/3.jpg') }}" alt="">
                      <div class="cate-detail">
                        <span>watches</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="{{ url('frontend/images/4.jpg') }}" alt="">
                      <div class="cate-detail">
                        <span>shoes</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="{{ url('frontend/images/cate_5.jpg') }}" alt="">
                      <div class="cate-detail">
                        <span>sunglasses</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="{{ url('frontend/images/cate_6.jpg') }}" alt="">
                      <div class="cate-detail">
                        <span>kid's wear</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="{{ url('frontend/images/cate_7.jpg') }}" alt="">
                      <div class="cate-detail">
                        <span>Women t-shirt</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="{{ url('frontend/images/cate_2.jpg') }}" alt="">
                      <div class="cate-detail">
                        <span>Men’s jackets</span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Top Categories End-->

    <!-- perellex-banner Start -->
    <section>
      <div class="perellex-banner">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 offset-xl-2 ptb-70 client-box">
              <div class="perellex-delail align-center">
                <div class="perellex-offer"><span class="line-bottom">Up to 50% Off on Electronics</span></div>
                <div class="perellex-title ">New computer models are releasing </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <a class="btn btn-color">Shop Now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- perellex-banner End -->

    <!-- Daily Deals Start -->
    <section class=" ptb-70">
      <div class="container">
        <div class="daily-deals">
          <div class="row m-0">
            <div class="col-12 p-0">
              <div class="heading-part mb-30 mb-xs-15">
                <h2 class="main_title heading"><span>Daily Deals</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div id="daily_deals" class="owl-carousel ">
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image">
                          <a href="product-page.html">
                            <img src="{{ url('frontend/images/2.jpg') }}" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name">
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a>
                          </div>
                          <div class="price-box">
                            <span class="price">$80.00</span>
                            <del class="price old-price">$100.00</del>
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                               <span class="ti-heart"></span>
                              </a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                <span class="ti-bar-chart"></span>
                              </a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image">
                          <a href="product-page.html">
                            <img src="{{ url('frontend/images/12.jpg') }}" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name">
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a>
                          </div>
                          <div class="price-box">
                            <span class="price">$80.00</span>
                            <del class="price old-price">$100.00</del>
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                               <span class="ti-heart"></span>
                              </a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                <span class="ti-bar-chart"></span>
                              </a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image">
                          <a href="product-page.html">
                            <img src="{{ url('frontend/images/10.jpg') }}" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name">
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a>
                          </div>
                          <div class="price-box">
                            <span class="price">$80.00</span>
                            <del class="price old-price">$100.00</del>
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                               <span class="ti-heart"></span>
                              </a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                <span class="ti-bar-chart"></span>
                              </a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image">
                          <a href="product-page.html">
                            <img src="{{ url('frontend/images/1.jpg') }}" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name">
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a>
                          </div>
                          <div class="price-box">
                            <span class="price">$80.00</span>
                            <del class="price old-price">$100.00</del>
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                               <span class="ti-heart"></span>
                              </a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                <span class="ti-bar-chart"></span>
                              </a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image">
                          <a href="product-page.html">
                            <img src="{{ url('frontend/images/3.jpg') }}" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name">
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a>
                          </div>
                          <div class="price-box">
                            <span class="price">$80.00</span>
                            <del class="price old-price">$100.00</del>
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                               <span class="ti-heart"></span>
                              </a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                <span class="ti-bar-chart"></span>
                              </a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image">
                          <a href="product-page.html">
                            <img src="{{ url('frontend/images/4.jpg') }}" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name">
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a>
                          </div>
                          <div class="price-box">
                            <span class="price">$80.00</span>
                            <del class="price old-price">$100.00</del>
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                               <span class="ti-heart"></span>
                              </a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                <span class="ti-bar-chart"></span>
                              </a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Daily Deals End -->

    <!--  Site Services Features Block Start  -->
    <div class="ser-feature-block">
      <div class="container">
        <div class="center-xs">
          <div class="row">
            <div class="col-xl-3 col-md-6 service-box">
              <div class="feature-box ">
                <div class="feature-icon ti-truck"></div>
                <div class="feature-detail">
                  <div class="ser-title">Free Delivery</div>
                  <div class="ser-subtitle">From $59.89</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 service-box">
              <div class="feature-box">
                <div class="feature-icon ti-headphone-alt"></div>
                <div class="feature-detail">
                  <div class="ser-title">Support 24/7</div>
                  <div class="ser-subtitle">Online 24 hours</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 service-box">
              <div class="feature-box ">
                <div class="feature-icon ti-reload"></div>
                <div class="feature-detail">
                  <div class="ser-title">Free return</div>
                  <div class="ser-subtitle">365 a day</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 service-box">
              <div class="feature-box ">
                <div class="feature-icon ti-money"></div>
                <div class="feature-detail">
                  <div class="ser-title">Big Saving</div>
                  <div class="ser-subtitle">Weeken Sales</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  Site Services Features Block End  -->

    <!--small banner Block Start-->
    <section class="pt-70">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="sub-banner small-banner small-banner1">
              <a href="index.html#">
                <img src="{{ url('frontend/images/small-banner1.jpg') }}" alt="">
              </a>
            </div>
          </div>
          <div class="col-lg-6 mt-sm-30">
            <div class="sub-banner small-banner small-banner2">
              <a href="index.html#">
                <img src="{{ url('frontend/images/small-banner2.jpg') }}" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--small banner Block Start-->

    <!--  Special products Products Slider Block Start  -->
    <section class="ptb-70">
      <div class="container">
        <div class="product-listing">
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="row">
                <div class="col-12">
                  <div class="heading-part mb-30 mb-xs-15">
                    <h2 class="main_title heading"><span>Best seller</span></h2>
                  </div>
                </div>
              </div>
              <div class="pro_cat">
                <div class="row">
                  <div class="owl-carousel best-seller-pro">
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/1.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/2.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/3.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item sold-out">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/4.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/5.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/6.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/7.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/8.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/9.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/10.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12 mt-xs-30">
              <div class="row">
                <div class="col-12">
                  <div class="heading-part mb-30 mb-xs-15">
                    <h2 class="main_title heading"><span>New products </span></h2>
                  </div>
                </div>
              </div>
              <div class="pro_cat">
                <div class="row">
                  <div class="owl-carousel best-seller-pro">
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/12.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/11.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/10.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item sold-out">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/9.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/8.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/7.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/6.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/5.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/4.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="{{ url('frontend/images/3.jpg') }}" alt=""> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span class="ti-shopping-cart"></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist">
                                 <span class="ti-heart"></span>
                                </a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare">
                                  <span class="ti-bar-chart"></span>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  Special products Products Slider Block End  -->

    <!--Blog Block Start -->
    <section class="pb-70">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
            <div class="heading-part mb-30 mb-xs-15">
              <h2 class="main_title heading"><span>Latest News</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="blog" class="owl-carousel">
            <div class="item mb-md-30">
              <div class="blog-item">
                <div class="">
                <div class="blog-media">
                  <img src="{{ url('frontend/images/blog_img1.jpg') }}" alt="">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                </div>
                <div class="mt-30">
                  <div class="blog-detail">
                    <ul>
                      <li>
                        <a href="index.html#">
                          <span class="ti-comment"></span> 0 comment</a>
                      </li>
                      <li>
                        <a href="index.html#">
                          <span class="ti-calendar"></span> 3-3-2018</a>
                      </li>
                    </ul>
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item mb-md-30">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="{{ url('frontend/images/blog_img2.jpg') }}" alt="">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail">
                    <ul>
                      <li>
                        <a href="index.html#">
                          <span class="ti-comment"></span> 0 comment</a>
                      </li>
                      <li>
                        <a href="index.html#">
                          <span class="ti-calendar"></span> 3-3-2018</a>
                      </li>
                    </ul>
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="{{ url('frontend/images/blog_img3.jpg') }}" alt="">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail">
                    <ul>
                      <li>
                        <a href="index.html#">
                          <span class="ti-comment"></span> 0 comment</a>
                      </li>
                      <li>
                        <a href="index.html#">
                          <span class="ti-calendar"></span> 3-3-2018</a>
                      </li>
                    </ul>
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="{{ url('frontend/images/blog_img4.jpg') }}" alt="">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail">
                    <ul>
                      <li>
                        <a href="index.html#">
                          <span class="ti-comment"></span> 0 comment</a>
                      </li>
                      <li>
                        <a href="index.html#">
                          <span class="ti-calendar"></span> 3-3-2018</a>
                      </li>
                    </ul>
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="{{ url('frontend/images/blog_img5.jpg') }}" alt="">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail">
                    <ul>
                      <li>
                        <a href="index.html#">
                          <span class="ti-comment"></span> 0 comment</a>
                      </li>
                      <li>
                        <a href="index.html#">
                          <span class="ti-calendar"></span> 3-3-2018</a>
                      </li>
                    </ul>
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media">
                  <img src="{{ url('frontend/images/blog_img6.jpg') }}" alt="">
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail">
                    <ul>
                      <li>
                        <a href="index.html#">
                          <span class="ti-comment"></span> 0 comment</a>
                      </li>
                      <li>
                        <a href="index.html#">
                          <span class="ti-calendar"></span> 3-3-2018</a>
                      </li>
                    </ul>
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Blog Block End -->

    <!-- Brand logo block Start  -->
    <div class="brand-logo">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
            <div class="heading-part mb-30 mb-xs-15">
              <h2 class="main_title heading"><span>Our Brands</span></h2>
            </div>
          </div>
        </div>
        <div class="row brand">
          <div class="col-md-12">
            <div id="brand-logo" class="owl-carousel align_center">
              <div class="item"><a href="index.html#"><img src="{{ url('frontend/images/brand1.png') }}" alt=""></a></div>
              <div class="item"><a href="index.html#"><img src="{{ url('frontend/images/brand2.png') }}" alt=""></a></div>
              <div class="item"><a href="index.html#"><img src="{{ url('frontend/images/brand3.png') }}" alt=""></a></div>
              <div class="item"><a href="index.html#"><img src="{{ url('frontend/images/brand4.png') }}" alt=""></a></div>
              <div class="item"><a href="index.html#"><img src="{{ url('frontend/images/brand5.png') }}" alt=""></a></div>
              <div class="item"><a href="index.html#"><img src="{{ url('frontend/images/brand6.png') }}" alt=""></a></div>
              <div class="item"><a href="index.html#"><img src="{{ url('frontend/images/brand7.png') }}" alt=""></a></div>
              <div class="item"><a href="index.html#"><img src="{{ url('frontend/images/brand8.png') }}" alt=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Brand logo block End  -->
  <!-- CONTAINER END -->

  <!-- News Letter Start -->
  <section>
    <div class="newsletter">
      <div class="container">
        <div class="newsletter-inner center-sm">
          <div class="row">
            <div class=" col-xl-10 col-md-12 push-xl-1">
              <div class="newsletter-bg">
                <div class="row">
                  <div class="col-lg-5">
                    <div class="newsletter-title">
                      <h2 class="main_title">Subscribe to our newsletter</h2>
                      <div class="sub-title">Sign up for newsletter and Get upto 50% off</div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <form>
                      <div class="newsletter-box">
                        <input type="email" placeholder="Email Here...">
                        <button title="Subscribe" class="btn-color">Subscribe</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- News Letter End -->

@endsection
