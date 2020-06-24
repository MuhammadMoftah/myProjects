@extends('frontend.showrooms.dashboard')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">   
<style>
    form.form-message {
        overflow: hidden;
        position: relative;
    }
    form .note-editable {
        background-color: #f4f4f4;
        border: none;
        border-radius: 20px;
        padding: 15px 42px;
        width: calc(100% - 70px);
    }
    form i {
        top: 20px;
        position: absolute;
        right: 90px;
    }
    div.my-text p  { 
        color: #FFF
    }
</style>
@endsection
@section('dashboard-main')
<div class="container dash-chat" id="dash-chat">
    <div class="row bg-white rounded py-2">
        <div class="modal fade bd-example-modal-lg show message-image-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center" id="dynamic-content">
                        <img src="" style="width:auto;height:auto;" class="img-fluid message-image" alt="" />
                    </div>
                </div>
            </div>
        </div>
        
        {{-- chat Users --}}
        <div class="col-4 chat-left d-fle align-items-center">
            <hgroup class="row px-3">
                {{-- filter the messages --}}
                <select class="form-control col-lg-4 col-sm-12 px-1 mb-lg-0 mb-2" name="" id="read">
                    <option value="" disabled>Filter messages</option> 
                    <option value="All" >All</option> 
                    <option value="Read" 
                    @if(request()->segment(5) !== null && request()->segment(5) === 'Read') selected @endif>
                        Read
                    </option>
                    <option value="UnRead" @if(request()->segment(5) !== null && request()->segment(5) === 'UnRead') selected @endif>UnRead</option>
                    <option value="Pinned" @if(request()->segment(5) !== null && request()->segment(5) === 'Pinned') selected @endif>Pinned</option>
                </select>
                <form class='col-lg-7 col-sm-12 offset-lg-1 px-0' method="GET" action="{{route('user.my.dashboardChat', $showroom->id)}}">
                    <input class="form-control px-1" type="text"   name="search" placeholder="Search ..." value="@if(request()->has('search')){{request('search')}} @endif">
                </form>
            </hgroup>

            <aside class="chat-list py-3">
                <div class="nav flex-column nav-pills">

                    @if ($MessagesUsers)
                    {{-- href="{{ route('user.my.dashboardChat',[$showroom->id,$item->id]) }}" --}}
                        @foreach ($MessagesUsers as $MessagesUser) 
                            @if ($message_user_id == $MessagesUser->id) 
                                <a style="font-style: bold"
                                    class="nav-link pl-1 {{ count($Showroom_Messages) > 0 ? 'active':'' }}"
                                    href="{{ route('user.my.dashboardChat',[$showroom->id,$MessagesUser->id]) }}">
                                    <aside class="chat-user d-flex align-items-center">
                                        <figure class="img mb-0 mr-2"
                                            style="background-image: url({{ $MessagesUser->image }})"></figure> 
                                        <h6 class="mb-0 mr-2 text-secondary">{{ $MessagesUser->first_name . '-' . $MessagesUser->last_name }}</h6> 
                                    </aside>
                                </a>
                            @else 
                                <a class="nav-link pl-1 " href="{{ route('user.my.dashboardChat',[$showroom->id,$MessagesUser->id]) }}">
                                    <aside class="chat-user d-flex align-items-center button-message">
                                        <figure class="img mb-0 mr-2"  style="background-image: url({{ $MessagesUser->image }})">
                                        </figure>  
                                        
                                        @if ($all_messages)    
                                            @foreach ($all_messages as $message) 
                                                @if ($message->user_id == $MessagesUser->id &&  $message->read == 0 &&  $message->reply == 0 )  
                                                    <?php $flag[$MessagesUser->id] = 0 ?>   
                                                @endif  
                                            @endforeach  
                                          
                                            @if (isset($flag[$MessagesUser->id])) 
                                                <h6 class="mb-0 mr-2 text-secondary font-weight-bold">
                                                    {{ $MessagesUser->first_name }} - {{ $MessagesUser->last_name }}   
                                                </h6>
                                                <span style="height:10px; width:10px; background-color: limegreen;"
                                                    class="rounded-circle badge-info ">
                                                </span> 
                                            @else  
                                                <h6 class="mb-0 mr-2 text-secondary "> 
                                                    {{ $MessagesUser->first_name }} - {{ $MessagesUser->last_name }}
                                                </h6><aside></aside>     
                                            @endif  
                                           
                                        @endif    
                                    </aside>
                                </a>
                            @endif {{-- end the $message_user_id == $item->id  --}}
                        @endforeach {{--  for loop default messages --}}
                    @endif  {{-- if default messages   --}}
                </div> 
            </aside>
        </div>

        {{-- Chat Messages --}}
        <div class="col-8 chat-right border-left"> 
            @if($MessagesUsers)
                @foreach ($MessagesUsers as $MessagesUser)
                <hgroup class="row">
                    @if ($MessagesUser->id == $message_user_id && $MessagesUser->nonBlocked($showroom->id)) 
                    <aside class="chat-user d-flex align-items-center col-8">
                    <figure class="img mb-0 mr-2"
                        style="background-image: url({{ $MessagesUser->image  }})">
                    </figure>  
                    <a class="h6 mt-2 text-secondary" href="{{route('user.view.profile' , ['id' => $MessagesUser->id ])}}">
                        {{ $MessagesUser->first_name . '-' . $MessagesUser->last_name }}
                    </a> 
                    </aside>
                    <aside class="chat-icons d-flex justify-content-end align-items-center pl-0 col-4">
                        @if($MessagesUser->isPinned() !== null) 
                        <i class="main-link fas fa-star mx-1 pin-chat" 
                           title="pin Chat" 
                           data-type="user"
                           data-id="{{$MessagesUser->id}}"
                           data-action="unpin"></i>   
                        @else
                        <i class="main-link far fa-star mx-1 pin-chat" 
                            title="unpin Chat" 
                            data-type="user"
                            data-id="{{$MessagesUser->id}}" 
                            data-action="pin"></i> 
                        @endif
                        {{-- <a href=""><i class="main-link far fa-envelope mx-2"></i></a>  --}} 
                        <i class="main-link fas fa-trash-alt mx-1 delete-chat" title="Delete Chat"  data-type="delete">
                        </i>  
                        <i class="main-link far fa-envelope mx-1 unread-chat"
                            title="UnRead Chat" data-type="unread"></i>  
                        <i class="main-link fa fa-ban mx-1 block-chat"
                            title="Block Chat" data-type="block"></i>  
                    </aside> 
                    @endif
                </hgroup> 
                @endforeach 
            @endif
            <div class="tab-content border-top mt-2" id="v-pills-tabContent">
                @if ($Showroom_Messages && count($Showroom_Messages))
                <div class="tab-pane chat-pane fade show active">
                    @foreach ($Showroom_Messages as $message)
                    @if ($message->reply == 1 && $message->user->nonBlocked($showroom->id))
                    <div class="my-1 d-flex flex-row-reverse">
                        <div class="my-text">
                            {!! $message->message_body !!} 
                            @if (count($message->images) > 0)
                            @foreach ($message->images as $img)
                            <a href="#" role="button" data-image="{{$img->image}}" class="d-block show-message-image" data-toggle="modal">
                                <img src="{{ $img->image }}" style="width:auto;height:auto;max-width:70%;max-height:400px" class="mt-3 rounded" alt="" />
                            </a>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    @elseif($message->user->nonBlocked($showroom->id))
                    <div class="my-1 d-flex ">
                        <div class="not-my-text">
                            {!! $message->message_body !!} 
                            @if (count($message->images) > 0 )
                                @foreach ($message->images as $img)
                                <a href="#" role="button" data-image="{{$img->image}}" class="d-block show-message-image" data-toggle="modal">
                                    <img src="{{ $img->image }}" style="width:auto;height:auto;max-width:70%;max-height:400px" class="mt-3 rounded" alt="" />
                                </a>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @if ($message_user_id)
                    <div class="text-input">
                        <figure class="mb-3" id='upload-message-image-display'>
                            {{-- <img src="" style="width:100px; height: 100px; border-radius:5%;"
                                id="profileImage" alt="" />
                            <button class="btn btn-danger ">X</button> --}}
                        </figure>
                        <form class="form-message" action="{{ route('showroom.store.message') }}" id="form-message" method="post" enctype="multipart/form-data" multiple>
                            @csrf
                            <input class="form-control mr-2 ali chat-message-input" id="message" type="text" placeholder="Type a message"   name="body">

                            <input type="hidden" name="showroom_id" value="{{ $showroom->id }}">
                            <input type="hidden" name="user_id" value="{{ $message_user_id }}">
                            <label for="chooseImg">
                                <i class="far fa-lg fa-images main-link2"></i>
                                {{-- onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])" --}}
                                <input name="image[]" id="chooseImg" type="file" class="d-none upload-message-image" multiple>
                            </label>
                        </form> 
                    </div>
                    @else
                    <h3 style="text-align: center">No Messages Found</h3>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@push('scripts_stack')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>   
<script>
    var global_multi_files_input = []; 
    
    $(document).ready(function() { 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        $('.chat-message-input').summernote({ 
            airMode: true,
            toolbar: false,
            popover: {
                image: [],
                link: [],
                air: []
            } 
        });
        
        // filter messages 
        $("#read").on('change', function() {
            var read = $(this).val();
            if (read == 'All') {
                var url = "{{route('user.my.dashboardChat',['id'=>$showroom->id ] )}}";
            } else {
                var url = "{{route('user.my.dashboardChat',['id'=>$showroom->id,'u_id'=>':u_id','read'=>':read'])}}".replace(":u_id", null).replace(":read", read);
            }
            location.href = url;
        })
            // Send message 
            $(document).on('submit', "#form-message", function(e) { 
                // e.preventDefault();
                // console.log($('.image-added').val())
            if ($.trim($("#form-message .note-editable").text()) == '' && $("#chooseImg").val().length == 0) {
                $(".loader").hide();
                e.preventDefault();
                alert('enter message please');
            } 
        })

        $('form .note-editable').keyup(function (e) { 
            e.preventDefault(); 
            $("form #message").val( $(this).html()) 

            if(event.keyCode == 13 && !event.shiftKey) {  
                // let app = ""
                // for(let i = 0; i < global_multi_files_input.length; i++)  {
                //     app +=  `<input   name='image-${i}'  value="${global_multi_files_input[i]}"   class="image-added">` 
                // }
                // $('#form-message #chooseImg').remove();
                // $('#form-message').append(app);
                var form = $("#form-message").submit();     
            }
        });

        function deleteImage() {
            $(document).on('click' , '.remove-logo' ,function() {
                let parent = '#' + $(this).attr('data-parent');
                let id =  $(this).attr('data-id'); 
                // let allFiles = global_multi_files_input ; 
                delete global_multi_files_input[id]; 
                console.log( global_multi_files_input ) 
                $(parent).hide();  
                $(parent).html(" ");
                // $('.img-preview').html(" ");
                // $("#chooseImg").val('');
            });
        }
         
        // upload message image
        $('.upload-message-image').on('change', function(e) {
            e.preventDefault();
            var displayFigure = document.getElementById('upload-message-image-display');
            var filesNumber = this.files.length;  
            
            var html = '';
            for (let i = 0; i < filesNumber; i++) {
              
                global_multi_files_input[i]  =  this.files[i]
                // html += '<img src="' + window.URL.createObjectURL(this.files[i]) + '" style="width:100px; height: 100px; border-radius:5%;" id="profileImage" data-image-name="' + this.files[i].name + '" />' + ' <button class="btn btn-danger"   >X</button> ';


                html += '<div class="m-1 d-inline-block" id="image-display-'+ i +'"><label style="cursor:pointer" class="uploadimg">' + '<div class="close-overlay"><span class="btn btn-danger fas fa-trash-alt remove-logo" data-id="'+ i +'" data-parent="image-display-'+ i +'">' + ' </span></div>' +
            '<img src="' + window.URL.createObjectURL(this.files[i]) + '" alt="">' + '</label></div>';

            } 
            deleteImage();
            displayFigure.innerHTML = html;  
        }); 
    
        // ajax request for pin request
        function  pinModifyAjax(clickedElement , actionUrl , actionData, action) {
            Swal.fire({ 
                title: 'Are you sure?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) { 
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: actionData,
                        success: function(data) { 
                            if(action == 'pin') {
                                clickedElement.attr('data-action', 'unpin');
                                clickedElement.attr('title', 'unpin Chat');
                                clickedElement.removeClass('far')
                                clickedElement.addClass('fas'); 
                            } else {
                                clickedElement.attr('data-action', 'pin');
                                clickedElement.attr('title', 'pin Chat');
                                clickedElement.removeClass('fas')
                                clickedElement.addClass('far'); 
                            }
                        },
                        error: function(data) {
                            console.log('error'); 
                        }
                    });
                } 
            });
        }
        //  pin chat
        $(document).on('click', '.pin-chat', function(e) {
        
            let clickedElement = $(this); // for cache
            let pinnedId = clickedElement.attr('data-id');
            let pinnedType = clickedElement.attr('data-type') ;
            let actionUrl = '';
            let action = clickedElement.attr('data-action');
            if ( action ==  'pin') {
                actionUrl = "{{route('user.ShowroomChat.pin')}}"
            } else {
                actionUrl = "{{route('user.ShowroomChat.unpin')}}"
            }
            let actionData = {
                'pinnedId' : pinnedId, 
                'pinnedType' : pinnedType
            } 
            pinModifyAjax(clickedElement , actionUrl , actionData, action)
        });
        //  unread chat
       
        function unreadChatAjax(actionUrl , actionData, successRedirectUrl) {
            
            Swal.fire({ 
                title: 'Are you sure?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) { 
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: actionData,
                        success: function(data) {  
                            window.location.replace(successRedirectUrl); 
                        },
                        error: function(data) {
                            console.log('error'); 
                        }
                    });
                } 
            });
        }
       
        $(document).on('click', '.unread-chat', function(e) {  
            let actionUrl   =  "{{route('user.showroom.unreadChat')}}"; 
            let actionData = {
                "user_id" :"{{ request()->segment(4) }}", 
                "type" : 0, // type of user message
                "showroom_id" : "{{ $showroom->id }}" 
            }   
            let successRedirectUrl = "/dashboard/" + "{{ $showroom->id }}" + "/chat" 
            unreadChatAjax(actionUrl , actionData , successRedirectUrl)
        });

        function deletChatAjax(actionUrl , actionData, successRedirectUrl) {
            
            Swal.fire({ 
                title: 'Are you sure?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) { 
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: actionData,
                        success: function(data) {  
                            window.location.replace(successRedirectUrl); 
                        },
                        error: function(data) {
                            console.log('error'); 
                        }
                    });
                } 
            });
        }

        $(document).on('click', '.delete-chat', function(e) {  
            let actionUrl   =  "{{route('user.showroom.deleteChat')}}"; 
            let actionData = {
                "user_id" : "{{ request()->segment(4) }}",
                "showroom_id" : "{{ $showroom->id }}" 
            }   
            let successRedirectUrl = "/dashboard/" + "{{ $showroom->id }}" + "/chat" 
            deletChatAjax(actionUrl , actionData , successRedirectUrl)
        });

        function blockChatAjax(actionUrl , actionData, successRedirectUrl) {
            
            Swal.fire({ 
                title: 'Are you sure?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) { 
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: actionData,
                        success: function(data) {  
                            window.location.replace(successRedirectUrl); 
                        },
                        error: function(data) {
                            console.log('error'); 
                        }
                    });
                } 
            });
        }

        $(document).on('click', '.block-chat', function(e) {   
            let actionUrl   =  "{{route('user.chatBlock')}}"; 
            let actionData = {
                "user_id" : "{{ request()->segment(4) }}",
                "showroom_id" : "{{ $showroom->id }}" 
            }   
            let successRedirectUrl = "/dashboard/" + "{{ $showroom->id }}" + "/chat" 
            deletChatAjax(actionUrl , actionData , successRedirectUrl)
        });

        $('body').on('click', '.show-message-image', function (e) {
            var image_src = $(this).attr('data-image');
            $('.message-image').attr('src', image_src);
            $('.message-image-modal').modal('show');
        });
    }); 
</script>
@endpush {{-- end scripts Section --}}
@endsection {{-- end dashboard-main Section --}}