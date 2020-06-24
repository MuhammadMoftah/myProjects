<div class="blogs">
    @if($blogs->get(0) )
     <div class="part my-1" style="flex:3">
         <a href="{{route("web.blog.user.details",$blogs->get(0)->slug)}}">
             <img src="{{$blogs->get(0)->image}}" alt="" style="height: 500px;">
             <p class="h5 mt-2 blog-title"> {{  str_limit($blogs->get(0)->title, 150, "...") }} </p>
             <div class="mt-1 pb-3">
                
                 <span class='text-muted d-inline-block"'>{{ $blogs->get(0)->created_at->diffForhumans() }}</span>
                 - <span class='text-muted d-inline-block"'> {{ $blogs->get(0)->views }} views </span>
             </div>
         </a>
     </div>
     @endif

     <div class="flex-column" style="flex:2">
         @if($blogs->get(1) )
         <div class="part my-1">
             <a href="{{route("web.blog.user.details",$blogs->get(1)->slug)}}">
                 <img src="{{$blogs->get(1)->image}}" alt="" style="height:200px">
                 <p class="h6 mt-2 blog-title"> {{  str_limit($blogs->get(1)->title, 150, "...") }} </p>
                 <div class="mt-1 pb-3">
                     {{-- <p class="font-weight-bold m-0 d-inline-block pr-3">Muhammad Moftah</p> --}}
                     <span class='text-muted d-inline-block"'>{{ $blogs->get(1)->created_at->diffForhumans() }}</span>
                     - <span class='text-muted d-inline-block"'> {{ $blogs->get(1)->views }} views </span>
                 </div>
             </a>
         </div>
         @endif

         @if($blogs->get(2) )
         <div class="part my-1">
             <a href="{{route("web.blog.user.details",$blogs->get(2)->slug)}}">
                 <img src="{{$blogs->get(2)->image}}" alt="" style="height:200px">
                 <p class="h6 mt-2 blog-title"> {{  str_limit($blogs->get(2)->title, 150, "...") }} </p>
                 <div class="mt-1 pb-3">
                     
                     <span class='text-muted d-inline-block"'>{{ $blogs->get(2)->created_at->diffForhumans() }}</span>
                     - <span class='text-muted d-inline-block"'> {{ $blogs->get(2)->views }} views </span>
                 </div>
             </a>
         </div>
         @endif
     </div>

 </div>