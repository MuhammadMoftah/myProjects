
@php
   $preview = $showroom->userReview(auth('user')->id());
   $arr = ["one","two", "three", "four", "four"];
   $il = 0;
//    dd(session())
@endphp
<form method="POST" style="display: none" action="{{ route('user.update.review',['id'=>$showroom->id]) }}" class="review-box col-xl-8 border rounded ml-2 my-2" id="edit-review-form">
    @csrf
     <input type="hidden" name="id_review" value="{{$preview->id}}">
    <div class="d-flex justify-content-between align-items-center py-4">
        <div class="stars d-block" style="font-size:25px;">

            @for ($i = 0; $i < (int)$preview->rate; $i++)
        <i class="fas fa-star text-warning edit-rate" data-rate="{{$il + 1 }}"></i>
              @php
               $il++; 
              @endphp  
            @endfor
            @for ($i = 5; $i > (int)$preview->rate ; $i--)
                  <i class="far fa-star text-warning edit-rate" data-rate="{{$il +1 }}" ></i>
                  @php
                    $il++; 
                  @endphp  
            @endfor
        </div>
        <b>Whats your Review About This Brand?</b>
    </div>

    <div class="d-flex mycheckbox justify-content-between pb-4">
        <input type="checkbox"  name="services[]"  @if($preview->services)checked @endif value="services" if id="cb1">
        <label for="cb1" class="main-btn2"   >Custome Services</label>

        <input type="checkbox" name="services[]" @if($preview->sales)checked @endif value="sales" id="cb2">
        <label for="cb2" class="main-btn2"   >Sales Attitude</label>

        <input type="checkbox" name="services[]" @if($preview->prices)checked @endif value="prices" id="cb3">
        <label for="cb3" class="main-btn2"  >Prices</label>

        <input type="checkbox" name="services[]"  @if($preview->qualities)checked @endif value="qualities" id="cb4">
        <label for="cb4" class="main-btn2"  >Quality</label>

        <input type="checkbox" name="services[]" value="others" @if($preview->others) checked @endif  id="cb5">
        <label for="cb5" class="main-btn2" >Other</label>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="review" id="review" cols="30" rows="6" placeholder="Please Tell Us More." style="resize:none">
             {{ $preview->review}} 
        </textarea>
    </div>
<input type="hidden" name="rate" value="{{$preview->rate}}" id="edit-rate">
    <div class="form-group text-right">
        <button class="btn main-btn edit-review-submit">update</button>
        <button class="btn btn-danger cancel-review-submit">cancel</button>
        {{-- <button class="btn main-btn edit-review-submit" type="button"  id="" >Submit</button> --}}
    </div>
</form>
