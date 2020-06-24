 {{-- reviews content --}}
 <div class="row reviews-content" id="reviews-content">
     @if(auth()->guard('user')->check())
     @if(auth()->guard('user')->user()->id != $showroom->user_id)
     @if(!$showroom->user_review(auth()->guard('user')->id()))
     <form method="POST" action="{{ route('user.store.review') }}" class="review-box col-xl-8 border rounded ml-2 my-2" id="review-form">
         @csrf
         <input type="hidden" name="showroom_id" value="{{$showroom->id}}"/>
         <div class="d-flex justify-content-between align-items-center py-4">
             <div class="stars d-block" style="font-size:25px;">
                 <i class="far fa-star text-warning" id="one-star"></i>
                 <i class="far fa-star text-warning" id="two-star"></i>
                 <i class="far fa-star text-warning" id="three-star"></i>
                 <i class="far fa-star text-warning" id="four-star"></i>
                 <i class="far fa-star text-warning" id="five-star"></i>
             </div>
             <b>Whats your Review About This Brand?</b>
         </div>

         <div class="d-flex mycheckbox justify-content-between pb-4">
             <input type="checkbox" checked name="services[]" value="services" id="cb1">
             <label for="cb1" class="main-btn2">Custome Services</label>

             <input type="checkbox" name="services[]" value="sales" id="cb2">
             <label for="cb2" class="main-btn2">Sales Attitude</label>

             <input type="checkbox" name="services[]" value="prices" id="cb3">
             <label for="cb3" class="main-btn2">Prices</label>

             <input type="checkbox" name="services[]" value="qualities" id="cb4">
             <label for="cb4" class="main-btn2">Quality</label>

             <input type="checkbox" name="services[]" value="others" id="cb5">
             <label for="cb5" class="main-btn2">Other</label>
         </div>
         <div class="form-group">
             <textarea class="form-control" name="review" id="review" cols="30" rows="6" placeholder="Please Tell Us More." style="resize:none"></textarea>
         </div>
         <input type="hidden" name="rate">
         <div class="form-group text-right">
             <input class="btn main-btn" type="button" id="review-submit" value="Submit">
         </div>
     </form>
     @else
     @include('frontend.showrooms.showroomTabs.editFormPreview')
     @endif
     @endif
     @endif
     @if(count($showroom_reviews))
     @foreach ($showroom_reviews as $showroom_review)
     <div class="topics col-xl-8 ml-2 px-0">
         <div class="lunched-post bg-white">
             <div class="card my-2">
                 <div class="card-header px-1 pt-2 bg-white border-0">
                     <figure style="background-image:url('{{ $showroom_review->user->image }}')" class="img d-inline-block mr-2"></figure>
                     <p class="font-weight-bold d-inline-block user-name">
                         {{ $showroom_review->user->first_name }} | </p>
                     @if (auth()->guard('user')->check())
                     @if (auth()->guard('user')->user()->id != $showroom_review->user->id)
                     @if ($showroom_review->user?$showroom_review->user->check_following($showroom_review->user->id , auth()->guard('user')->user()->id):'')
                     <a class="" style="color: var(--clr1);">Following</a>
                     @else
                     <a class="foll" style="color: var(--clr1);" data-count="" data-id="{{ $showroom_review->user->id }}" data-follow="follow">Follow</a>
                     @endif
                     @endif
                     @endif
                     @if ($showroom_review->rate == 5 )
                     <p class="small text-muted d-inline-block"> Highly Recommend Caracol</p>
                     @endif
                     @if ($showroom_review->rate == 4 )
                     <p class="small text-muted d-inline-block"> Recommend Caracol</p>
                     @endif
                     @if ($showroom_review->rate == 3 )
                     <p class="small text-muted d-inline-block">Thinks it's pretty good overall</p>
                     @endif
                     @if ($showroom_review->rate == 2 )
                     <p class="small text-muted d-inline-block"> Thinks it have been better</p>
                     @endif
                     @if ($showroom_review->rate == 1 )
                     <p class="small text-muted d-inline-block"> Doesn't Recommend Caracol</p>
                     @endif
                     <div class="stars" style="position: absolute;top: 42px;left: 74px;font-size: 12px;">
                         @for ($i = 0; $i < $showroom_review->rate; $i++)
                             <i class="fas fa-star text-warning"></i>
                             @endfor
                             @for ($i = 5; $i > $showroom_review->rate; $i--)
                             <i class="far fa-star text-warning"></i>
                             @endfor
                     </div>
                 </div>
                 <div class="card-body pt-0 pb-3">
                     <p class="card-text pb-3">{{ $showroom_review->review }}</p>
                 </div>
                 @if(auth('user')->check())
                 <div class="card-footer text-muted p-2 bg-white">
                     @if($showroom_review->user_id==auth('user')->user()->id)
                     <button class="btn btn-danger deleted-my-review" data-id="{{$showroom_review->id}}"> <i class=" fas fa-trash-alt  "></i> </button>
                     <button class="btn btn-info edit-my-preview"> <i class=" fas fa-edit"></i> </button>
                     @endif
                     <button class="btn p-1 mr-2 item-like" style="color: #939393;" data-href="{{route('item.like',['id'=> $showroom_review->id,'type'=>'showroom_review'])}}">
                         <i class="fas fa-thumbs-up "></i>
                         @if($showroom_review->userLike)
                         Liked
                         @else
                         Like
                         @endif
                     </button>
                     {{-- <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-reply"></i>Reply</button> --}}
                     <p class="text-info float-right p-2">{{$showroom_review->created_at->format('j F Y')}}</p>
                 </div>
                 @endif
                 {{-- comments and replies --}}
                 @include('frontend.components.comments')
             </div>
         </div>
     </div>
     @endforeach
     <div class="col-md-12 text-center my-4">
         <nav aria-label="Page navigation example">
             @include('frontend.paginators.reviews_paginator', ['reviews' => $showroom_reviews])
         </nav>
     </div>
     @else
     <h5 class="w-100 text-center text-danger mt-5">
         No Reviews Found
     </h5>
     @endif
     <form method="POST" action="{{route('user.delete.review')}}" id="deletePreview" style="display: none">
         @csrf
         @method("delete")
         <input type="hidden" name="id">
     </form>
 </div>
 {{-- @endsection --}}

 <script>
     $(function() {
         let edit_form = $("#edit-review-form")
         let delete_form = $("#deletePreview")
         $(".edit-rate").css("cursor", "pointer");
         $(document).on('click', ".edit-rate", function(e) {
             let rate = $(this).data("rate")
             $("#edit-rate").val(rate);
             $(".edit-rate").removeClass("fas").addClass("far")
             $(this).prevAll(".edit-rate").removeClass("far").addClass("fas")
                 .end().removeClass("far").addClass("fas").end();

         })

         $("body").on('click', ".edit-my-preview", function(e) {
             edit_form.fadeToggle()
         })

         $("body").on('click', ".cancel-review-submit", function(e) {
             e.preventDefault();
             edit_form.fadeOut()
         })

         $("body").on('click', ".deleted-my-review", function(e) {
             e.preventDefault();
             delete_form.find("input[name='id']").val($(this).data('id'))
             delete_form.submit();
         })
     })
 </script>


 @if(session()->has('msg'))
 <script>
     $(function() {
         Swal.fire({
             position: 'center',
             type: 'success',
             title: "{{session()->get('msg')}}",
             showConfirmButton: false,
             timer: 1500,
             showConfirmButton: false,
             confirmButtonText: 'done',
             showLoaderOnConfirm: true,
             confirmButtonColor: '#21d5de'
         });
     })
 </script>
 @endif