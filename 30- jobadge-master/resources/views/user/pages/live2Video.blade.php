@extends('master')
@section('styles')
        {{--   style  --}}
        <style>


            .vedio-display{
                border: 2px solid #ccc;
                min-height: 338px;
                max-height: 500px;
                max-width: 100%;
            }
            .vedio-display{
                border: 2px solid #ccc;
                
                max-width: 100%;
            }
            .vedio-display#locat-call{
                min-height: 223px;
            }
        
        .vedio-display#remote-call{
            min-height: 463px;
        }

            #chat-message{
                padding: 20px;
            }
            
            .message .content {
                color: #ddd;
                display: inline-block;
                border-radius: 7px;
                min-width: 200px;
                background-color: #2d3824;
            }
           
            .message  .content {
                padding: 10px;
            }
            .message.left-msg .content{
                margin-left: 20px;
               
             
            }
    
            .message.right-msg{
                text-align: right;
            }
            .message.right-msg .content{
                margin-right: 20px
            }
    
        </style>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     

        {{-- script --}}
        <script src="{{asset('site/js/util/RTCMultiConnection.min.js')}}"></script>
        <script src="{{asset('site/js/util/adapter.js')}}"></script>
        <script src="{{asset('site/js/util/getUserMedia.js')}}"></script>
        <script src="{{asset('site/js/util/socket.io.js')}}"></script>
        <script src="{{asset('site/js/util/hark.js')}}"></script>
        <script src="{{asset('site/js/util/alert.js')}}"></script>


@endsection
@section('body')
<div class="container-blog-posts mb-5">
    
    <div style="display: none;" >
        <span id="room-num">{{$channel_name}}</span>
    </div>

    <div class="container mt-5 mb-5" >
        
        <div id="videos-container">
            <div class="row">
                <div class="col-md-8">
                    <div class="controller  mb-1 text-left">
                        <button class="btn btn-primary" id="fullscreen"><i class="fas fa-compress"></i></button>
                        <button  class="btn btn-danger" id="btn"><i class="fas fa-sign-out-alt"></i></button>
                    </div> 
                    
                    <div  class="vedio-display" id="remote-call">
                        <img src="user.jpg" class="img-fluid"   style="width: 100%;max-height: 407px; display: none;">
                    </div>

                     
                </div>
                <div class="col-md-4">
                    <div class="controller mb-1 text-right">
                        <button  class="btn btn-info " data-type="muted" id="mute">
                            <i class="fas fa-video-slash"></i>
                        </button>
                    </div>  
                    <div  class="vedio-display" id="locat-call">
                        <img src="user.jpg" class="img-fluid"   style="width: 100%;max-height: 407px; display: none;">
                    </div>
                    <hr>
                    <div class="chat mt-2 mb-2 ">
                        <h3 class="text-center">Chat <i class="fa fa-comment"></i></h3>
                        <div id="chat-message" style="min-height: 200px;max-height: 200px; border: 2px solid #eee; overflow-y: scroll;"></div>
                        <div class="text-center">
                            <textarea class="form-control" id="message"></textarea>
                            <button class="btn btn-success mt-2" id="send">Send <i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div> 
                </div>
                
            </div>
        </div>

        
        
    </div>


</div>
@endsection
@section('scripts')
<script>
    @if($isUser)
        var info  = {
            fullName: "{{ auth('user')->user()->full_name }}",
            photo:  " {{  auth('user')->user()->getUserImage()  }}",
            id  : " {{  'user_'.auth('user')->id()}}",
        };
    @else
      var info  = {
            fullName: "{{ auth('company')->user()->name }}",
            photo:  " {{  auth('company')->user()->getCompanyLogo()  }}",
            id  : " {{  'company_'.auth('user')->id()}}",
        };
    @endif

    const turnServerIPAddress = "{{env('TURN_SERVER_IP_ADDRESS','52.22.36.88')}}";
    const turnServerPort = "{{ env('TURN_SERVER_PORT', '3478')}}";
    const turnServerUserName = "{{ env('TURN_SERVER_USER_NAME', 'safwat') }}";
    const turnServerPassword = "{{ env('TURN_SERVER_PASSWORD','123456')}}";
    const linkSocket         = "{{ env('LINK_SOCKET','https://node.jobadge.com:3001/')}}";
    
</script>
<script src="{{asset('site/js/util/mediaElment.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('site/js/util/interview.js')}}"></script>

@endsection