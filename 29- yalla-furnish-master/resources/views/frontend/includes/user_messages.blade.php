@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('assets/site/css/jquery.fancybox.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">  
<style>
    form  { 
        overflow: hidden;
        position: relative!important;
    }
    /* form  label {  
        position: absolute;
    } */
    form .note-editable {
        background-color: #f4f4f4;
        border: none;
        border-radius: 20px;
        padding: 15px 42px;
        width: calc(100% - 70px);
    }
    form .choosing-message-image {
        bottom: 52px; 
        position: absolute;
        right: 90px;
    }
    div.my-text p  { 
        color: #FFF
    }
</style>
@endsection
@section('body')
<center>
    @if(old('type')!='edit-board' && old('type')!='add-board')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @endif
</center>
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
<div class="container dash-chat dashboard" id="user-chat-content">
        <div class="row bg-white rounded py-2"> 

            <div class="col-4 chat-left d-fle align-items-center" id="con">
                <aside class="chat-list py-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                       @if ($showrooms && count($showrooms) > 0)
                           @foreach ($showrooms as $showroom)
                           <a class="nav-link pl-1 " href="{{ route('user.my.messages',['showroom_id'=>$showroom->id]) }}">
                                <aside class="chat-user d-flex align-items-center">
                                    <figure class="img mb-0 mr-2" style="background-image: url({{ $showroom->showroom_image }});height:50px;">
                                    </figure>
                                    {{-- <h6 class="mb-0 mr-2 text-secondary">{{ $showroom->name_en }}</h6>   --}}
                                    {{-- <i class="fas fa-star text-warning"></i> --}} 
                                    @if ($showrooms_messages)    
                                        @foreach ($showrooms_messages as $message) 
                                            @if ($message->showroom_id == $showroom->id &&  $message->read == 0 &&  $message->reply == 1 )  
                                                <?php $flag[$showroom->id] = 0 ?>   
                                            @endif  
                                        @endforeach  
                                    
                                        @if(isset($flag[$showroom->id])) 
                                            <h6 class="mb-0 mr-2 text-secondary font-weight-bold">
                                                {{ $showroom->name_en }}
                                            </h6>
                                            <span style="height:10px; width:10px; background-color: limegreen;"
                                                class="rounded-circle badge-info ">
                                            </span> 
                                        @else  
                                            <h6 class="mb-0 mr-2 text-secondary "> 
                                                {{ $showroom->name_en }}
                                            </h6><aside></aside>     
                                        @endif  
                                   
                                    @endif  
                                </aside>
                            </a>
                           @endforeach
                       @endif 
                    </div>
                </aside>
            </div>
 
            <div class="col-8 chat-right border-left" id="chat-con">
                <hgroup class="row">
                    @if ($messages && count($messages) > 0)
                        <aside class="chat-user d-flex align-items-center col-8"> 
                            <figure class="img mb-0 mr-2" style="background-image: url({{$messages[0]->showroom->showroom_image}});height:50px;">
                            </figure>
                            <h6>{{ $messages[0]->showroom->name_en }}</h6> 
                        </aside>
                        
                        <aside class="chat-icons d-flex align-items-center  justify-content-end  pl-0 col-4"> 
                            @if($messages && $messages[0]->showroom->isPinned() !== null) 
                            <i class="main-link fas fa-star mx-1 pin-chat" 
                            title="pin Chat" 
                            data-type="showroom"
                            data-id="{{$messages[0]->showroom->id}}"
                            data-action="unpin"></i>   
                            @elseif($messages)
                            <i class="main-link far fa-star mx-1 pin-chat" 
                                title="unpin Chat" 
                                data-type="showroom"
                                data-id="{{$messages[0]->showroom->id}}" 
                                data-action="pin"></i> 
                            @endif
                            {{-- <a href=""><i class="main-link far fa-envelope mx-2"></i></a>  --}} 
                            <i class="main-link fas fa-trash-alt mx-1 delete-chat" 
                            title="Delete Chat"  
                            data-id="{{$messages[0]->showroom->id}}" 
                            data-type="delete">
                            </i>  
                            <i class="main-link far fa-envelope mx-1 unread-chat"
                                title="UnRead Chat"
                                data-id="{{$messages[0]->showroom->id}}" 
                                data-type="unread"></i>  
                            <i class="main-link fa fa-ban mx-1 block-chat"
                                data-id="{{$messages[0]->showroom->id}}" 
                                title="Block Chat" data-type="block"></i>  
                        </aside> 
                    @endif 
                </hgroup> 
               
                <div class="tab-content border-top mt-2" id="v-pills-tabContent">
                    <div class="tab-pane chat-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        @if ($messages && count($messages) > 0)
                            @foreach ($messages as $message)
                                @if ($message->reply == 1)
                                        <div class="my-1 d-flex">
                                            <div class="not-my-text">
                                                {!! $message->message_body !!} 
                                                @if ($message->images)
                                                @foreach ($message->images as $img)
                                                <a href="#" role="button" data-image="{{$img->image}}" class="d-block show-message-image" data-toggle="modal">
                                                    <img src="{{ $img->image }}" style="width:auto;height:auto;max-width:70%;max-height:400px" class="mt-3 rounded" alt="" />
                                                </a>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @else 
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <div class="my-text">
                                            {!! $message->message_body !!} 
                                            @if ($message->images)
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
                        @endif
                   
                   @if ($messages && count($messages) > 0) 
                   <div class="text-input">
                        <form class="text-input" action="{{ route('user.store.message') }}" method="POST" id="form-message" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="showroom_id" value="{{ $messages[0]->showroom->id }}">
                            <figure class="mb-3 img-preview">
                                {{-- <img src="" style="width:100px; height: 100px; border-radius:5%;" id="profileImg" alt="" /> --}}
                            </figure>
                            <input class="form-control mr-2 ali" name="body" id="message" type="text" placeholder="Type a message">
                            <label for="chooseImg" class="choosing-message-image">
                                <i class="far fa-lg fa-images main-link2"></i>
                                <input name="image" id="chooseImg" type="file" class="d-none" 
                                    onchange="document.getElementById('profileImg').src = window.URL.createObjectURL(this.files[0])">
                            </label>
                        </form>
                   </div>
                        </div>
                    @endif
                    
                </div>
            </div>

    </div>
{{-- {{dd('ok')}} --}}
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>   
<!-- load more library --> 
<script>

$(document).ready(function(){

    $('#message').summernote({ 
        airMode: true,
        toolbar: false,
        popover: {
            image: [],
            link: [],
            air: []
        } 
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.tab-pane').scrollTop($('.tab-pane')[0].scrollHeight);

    function deleteImage() {
        $('.remove-logo').click(function() {
            $('.img-preview').html(" ");
            $("#chooseImg").val('');
        });
    }

    $('#chooseImg').on('change', function() {
        $('.img-preview').append('<div class="m-1 d-inline-block"><label style="cursor:pointer" class="uploadimg"><div class="close-overlay"><span class="btn btn-danger fas fa-trash-alt remove-logo"></span></div>' +
            '<img src="' + URL.createObjectURL(event.target.files[0]) + '" alt="">' + '</label></div>');
        deleteImage();
    });

    $("#form-message").on('submit', function(e) { 
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
            var form = $("#form-message").submit();     
        }
    });
    
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
                        
                    }
                });
            } 
        });
    }

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
                        
                    }
                });
            } 
        });
    }
       
    $(document).on('click', '.unread-chat', function(e) {  
        let showroom_id = $(this).attr('data-id')
        let actionUrl   =  "{{route('user.showroom.unreadChat')}}"; 
        let actionData = {
            "user_id" :"{{ CurrentUser()->id }}", 
            "type" : 1, // type of user message
            "showroom_id" : showroom_id
        }   
       
        let successRedirectUrl = "{{route('user.my.messages')}}";
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
        let showroom_id = $(this).attr('data-id')
        let actionData = {
            "user_id" :"{{ CurrentUser()->id }}", 
            "showroom_id" : showroom_id
        }   
        let successRedirectUrl = "{{route('user.my.messages')}}";
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
        let showroom_id = $(this).attr('data-id')
        let actionData = {
            "user_id" :"{{ CurrentUser()->id }}", 
            "showroom_id" : showroom_id
        }   
        let successRedirectUrl = "{{route('user.my.messages')}}";
        deletChatAjax(actionUrl , actionData , successRedirectUrl)
    });

    $('body').on('click', '.show-message-image', function (e) {
        var image_src = $(this).attr('data-image');
        $('.message-image').attr('src', image_src);
        $('.message-image-modal').modal('show');
    });

     
})

</script>
@endsection
<!--User chat-->