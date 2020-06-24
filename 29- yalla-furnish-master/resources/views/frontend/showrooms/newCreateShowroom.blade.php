@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')


<section class="new-create-showroom ">
<div class="container bg-white rounded py-2 my-4">
    <div class="title head text-center">
        <h1 class="h5 text-capitalize mb-4 font-weight-bold">Create Profile For your Business</h1>
        <p class="h6">Welcome to Yalla Furnish. <br> Take your buisness to the next  level and create your  online showroom now</p>
    </div>

    <form action="" class="pb-4 px-2" style="max-width: 800px;margin: auto;">
        <div class="row mb-2">
            <div class="col-sm-6">
                <p class="h6 text-capitalize font-weight-bold" style="line-height:35px"> your brand name in english:</p>
            </div>

            <div class="col-sm-6">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Your brand name in english">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-sm-6">
                <p class="h6 text-capitalize font-weight-bold" style="line-height:35px"> your brand name in arabic:</p>
            </div>

            <div class="col-sm-6">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Your brand name in arabic">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-6 ">
                <p class="h6 text-capitalize font-weight-bold mb-n1" > upload your brand logo</p>
                <small class="text-capitalize text-muted" > best size 150 X 150 | supported files JPG, PNG, JPEG</small>
            </div>

            <div class="col-sm-6 text-right">
                <label for="profileImg" class="d-block mb-2" style="cursor:pointer">
                    <span  class="btn main-btn4">Upload Logo</span>
                </label>
                <img src="{{asset('images/white-image.png')}}" style="max-width:150px; max-height: 150px; border-radius:5px;box-shadow: 0px 0px 5px #cdcccc;" id="profileImage" alt="" />
                <input type="file" style="display:none" id="profileImg" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-6 ">
                <p class="h6 text-capitalize font-weight-bold mb-n1" > upload your brand cover</p>
                <small class="text-capitalize text-muted" > best size 1140 X 250 | supported files JPG, PNG, JPEG</small>
            </div>

            <div class="col-sm-6 text-right">
                <label for="profileImg2" class="d-block mb-2" style="cursor:pointer">
                    <span  class="btn main-btn4">Upload Cover</span>
                </label>
            </div>
            
            <div class="col-sm-12">
                <div id="profileImage2" style="width:100%;height: 250px; border-radius: 5px; background-image:url({{asset('images/white-image.png')}}); background-size: cover;background-position: center;box-shadow: 0px 0px 5px #cdcccc;">
                 </div>
                <input type="file" style="display:none" id="profileImg2" onchange="document.getElementById('profileImage2').style.backgroundImage = 'url(' + window.URL.createObjectURL(this.files[0]) + ')'" />
            </div> 
        </div>

        <div class="row mb-3 mt-4 categories">
            <div class="col-sm-12">
                <p class="h6 font-weight-bold mt-4 mb-3">What are your brand categories?</p>
            </div>
            <div class="col-md-3 col-sm-4 my-2">
                <input class="d-none" type="checkbox" id="chk1">
                <label for="chk1" class="single-cate">
                    Salons
                </label>
            </div>

            <div class="col-md-3 col-sm-4 my-2">
                <input class="d-none" type="checkbox" id="chk2">
                <label for="chk2" class="single-cate">
                    Salons
                </label>
            </div>

            <div class="col-md-3 col-sm-4 my-2">
                <input class="d-none" type="checkbox" id="chk3">
                <label for="chk3" class="single-cate">
                    Bed rooms
                </label>
            </div>

            <div class="col-md-3 col-sm-4 my-2">
                <input class="d-none" type="checkbox" id="chk4">
                <label for="chk4" class="single-cate">
                    Bed rooms
                </label>
            </div>
            <div class="col-sm-12">
                <textarea placeholder="Suggest us more categories" class="form-control mt-3"  rows="4"></textarea>
            </div>
        </div>

        <div class="row mb-3 mt-4 categories">
            <div class="col-12">
                <p class="h6 font-weight-bold mt-4 mb-3">What are your brand styles?</p>
            </div>
            <div class="col-md-3 col-sm-4 my-2">
                <input class="d-none" type="checkbox" id="schk1">
                <label for="schk1" class="single-cate">
                    Salons
                </label>
            </div>

            <div class="col-md-3 col-sm-4 my-2">
                <input class="d-none" type="checkbox" id="schk2">
                <label for="schk2" class="single-cate">
                    Salons
                </label>
            </div>

            <div class="col-md-3 col-sm-4 my-2">
                <input class="d-none" type="checkbox" id="schk3">
                <label for="schk3" class="single-cate">
                    Bed rooms
                </label>
            </div>

            <div class="col-md-3 col-sm-4 my-2">
                <input class="d-none" type="checkbox" id="schk4">
                <label for="schk4" class="single-cate">
                    Bed rooms
                </label>
            </div>

            <div class="col-sm-12">
                <textarea placeholder="Suggest us more styles" class="form-control mt-3"  rows="4"></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <p class="h6 font-weight-bold my-3">Share your brand story with our visitors:</p>
            </div>

            <div class="col-sm-12">
                <textarea placeholder="Your Bio" class="form-control"  rows="5"></textarea>
            </div>
        </div>

        <div class="row mb-3 social-row">
            <div class="col-sm-12">
                <p class="h6 font-weight-bold my-3">Your social network links:</p>
            </div>
            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <i class="fas fa-globe-americas mr-2"></i>
                <span>Brand Website:</span>
            </div>
            <div class="col-sm-7 my-1">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your website URL and paste here">
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <i class="fab fa-facebook-f mr-2"></i>
                <span>Facebook Page:</span>
            </div>
            <div class="col-sm-7 my-1">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your Facebook URL and paste here">
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <i class="fab fa-instagram mr-2"></i>
                <span>Instagram Page:</span>
            </div>
            <div class="col-sm-7 my-1">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your Instagram URL and paste here">
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <i class="fab fa-youtube mr-2"></i>
                <span>Youtube Page:</span>
            </div>
            <div class="col-sm-7 my-1">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your Youtube URL and paste here">
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <i class="fab fa-twitter mr-2"></i>
                <span>Twitter Profile:</span>
            </div>
            <div class="col-sm-7 my-1">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your Twitter URL and paste here">
            </div>

        </div>

        <div class="row mb-3 social-row">
            <div class="col-sm-12">
                <p class="h6 font-weight-bold mt-3">Branch Details:</p>
            </div>
            <div class="col-md-11 col-sm-12 py-2 offset-md-1">
               Add your first branch now and you will be able to add more branches from your dashboard after creating your showroom.
            </div>
            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <span>Bransh Title:</span>
            </div>
            <div class="col-sm-7 my-1">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Ex: Nasr City Branch, 6th of Octorber Branch">
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <span>English Address:</span>
            </div>
            <div class="col-sm-7 my-1">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Write detailed English adress">
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <span>Arabic Address:</span>
            </div>
            <div class="col-sm-7 my-1">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Write detailed Arabic adress">
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <span>Branch Location:</span>
            </div>
            <div class="col-sm-3 my-1">
                <select name="" id="" class="form-control">
                    <option value="">City</option>
                    <option value="">one</option>
                </select>
            </div>

            <div class="col-md-3 my-1 offset-md-1">
                <select name="" id="" class="form-control ">
                    <option value="">District</option>
                    <option value="">one</option>
                </select>
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <span>Phone Number:</span>
            </div>
            <div class="col-sm-3 my-1">
                <input type="number" class="form-control ml-md-0 mx-auto" placeholder="Mobile or Landline">
            </div>

            <div class="col-md-3 my-1 offset-md-1">
                <input type="number" class="form-control ml-md-0 mx-auto" placeholder="Mobile or Landline">
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <span>Google Maps:</span>
            </div>
            <div class="col-sm-7 my-1">
                <input type="text" class="form-control ml-md-0 mx-auto" placeholder="Search in map">
            </div>

            <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                <span></span>
            </div>
            <div class="col-sm-7 my-1">
                <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=cairo&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>

            <div class="col-md-4 col-sm-5 pt-3 offset-md-1">
                <span>
                    Work Schedules
                </span>
            </div>
            <div class="col-sm-7 my-1">
               <div class="row categories mb-2">
                    <div class="col-sm-4 my-1">
                        <input class="d-none" type="checkbox" id="sunday">
                        <label for="sunday" class="single-cate">
                            Sunday
                        </label>
                    </div>
                    <div class="col-sm-4 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">From</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">To</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
               </div>

               <div class="row categories mb-2">
                    <div class="col-sm-4 my-1">
                        <input class="d-none" type="checkbox" id="Monday">
                        <label for="Monday" class="single-cate">
                            Monday
                        </label>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">From</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">To</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                </div>

                <div class="row categories mb-2">
                    <div class="col-sm-4 my-1">
                        <input class="d-none" type="checkbox" id="Tuesday">
                        <label for="Tuesday" class="single-cate">
                            Tuesday
                        </label>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">From</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">To</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                </div>

                <div class="row categories mb-2">
                    <div class="col-sm-4 my-1">
                        <input class="d-none" type="checkbox" id="Wednesday">
                        <label for="Wednesday" class="single-cate">
                            Wednesday
                        </label>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">From</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">To</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                </div>

                <div class="row categories mb-2">
                    <div class="col-sm-4 my-1">
                        <input class="d-none" type="checkbox" id="Thursday">
                        <label for="Thursday" class="single-cate">
                            Thursday
                        </label>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">From</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">To</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                </div>

                <div class="row categories mb-2">
                    <div class="col-sm-4 my-1">
                        <input class="d-none" type="checkbox" id="Friday">
                        <label for="Friday" class="single-cate">
                            Friday
                        </label>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">From</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">To</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                </div>

                <div class="row categories mb-2">
                    <div class="col-sm-4 my-1">
                        <input class="d-none" type="checkbox" id="Saturday">
                        <label for="Saturday" class="single-cate">
                            Saturday
                        </label>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">From</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                    <div class="col-sm-4 col-6 mx-auto my-1">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">To</option>
                            <option value="">1 AM</option>
                            <option value="">2 AM</option>
                        </select>
                    </div>
                </div>

            </div>

        </div>

        <div class="row pt-3" style="border-top: 1px solid #dadada;">
            <div class="col-12 my-2">
                Our team will contact you to give you a full brief about how to use Yalla Furnish in the best way and handle your products and categories. Kindly provide us your contact details.
            </div>

            <div class="col-sm-4 my-1">
                <input type="text" class="form-control" placeholder="Name">
            </div>

            <div class="col-sm-4 my-1">
                <input type="number" class="form-control" placeholder="Phone Number">
            </div>

            <div class="col-sm-4 my-1">
                <input type="email" class="form-control" placeholder="Email Address">
            </div>

            <div class="col-12 text-center mt-4 mb-3">
                <button class="btn main-btn">Create My Showroom</button>
            </div>
        
        </div>

    </form>


</div>
</section>

@endsection