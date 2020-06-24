@extends('admin.master')

@section('body')
   
    {{--  --}}
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div >
                @include('admin.layouts.message')
                @include('admin.layouts.errors')
            </div> 
            <div class="card">
                <div class="header">
                    <h2>
                        Uitilities Manager
                    </h2>
                </div>

                <div class="body">
                    
                    <form  method="POST" action="{{route('admin.uitilities.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" multiple name="images[]" class="form-control" >
                        <button class="btn btn-primary waves-effect  " style="margin-top:10px; ">
                            <i class="material-icons">add</i>
                            <span>Upload</span>   
                        </button>
                    </form>
                    <hr>
                    <div>
                    <form action="{{route('admin.uitilities.deleted')}}" method="POST">
                        @csrf
                            <div class="controller " style="margin-bottom: 4px ">
                                <button class="btn btn-danger waves-effect  deleted " style="margin-top:10px; ">
                                    <i class="material-icons">delete</i>
                                    <span>delete</span>   
                                </button>
                                <span class="text-danger">Be careful may be using this image </span>
                            </div>  
                            
                            <div class="table-responsive ">
                                <table  class="table">
                                      <tr>
                                          <th># </th>
                                          <th>image</th>
                                          <th>link</th>
                                          <th>Copy</th>
                                      </tr>
                                      @forelse ($images as  $image)
                                      <tr>
                                          <td>
                                                <p>
                                                    <input type="checkbox" name="deleted[]" value="{{ $image}}" id="check-{{ $loop->index+1}}">
                                                    <label for="check-{{ $loop->index+1}}">{{ $loop->index+1}}</label>
                                                </p>
                                                 
                                          </td>
                                          <td>
                                                 <img src="{{$image}}" width="150" class="img-fluid">
                                          </td>
                                          <td>
                                              {{ $image }}
                                          </td>
                                          <td>
                                              <button class="btn btn-info copy-path " data-path="{{ $image }}">
                                                <i class="material-icons">content_copy</i>
                                                <span>Copy</span>   
                                              </button>
                                          </td>
                                      </tr>  
                                      @empty
                                          <tr>
                                              <td colspan="3">
                                                <div class="alert alert-warning text-center" role="alert">
                                                            No images uploaded
                                                  </div>
                                              </td>
                                          </tr>
                                      @endforelse      
                                </table>
                            </div>

                        </form> 
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<!-- Validation Plugin Js -->
<script>
    $(function () {
        var buttonDelete = $(".deleted")
        var deltedSelect = $("input[name='deleted[]']")

        function checkIfOneSelectAtleast() {
            return $("input[name='deleted[]']:checked").length > 0
        }

        disabledBtnDelte()

        function disabledBtnDelte () {
         if(checkIfOneSelectAtleast()){
            buttonDelete.prop('disabled', false);
            console.log("diaableed")
         }else{
            buttonDelete.prop('disabled', true);
            console.log("diaableed")
         }
       }
       deltedSelect.on("change",disabledBtnDelte)
       $("body").on("click", ".copy-path", function (e) {
           e.preventDefault()
           var path = $(this).data("path")
           copyTextToClipboard(path)
       })

       // handle copy 
       function fallbackCopyTextToClipboard(text) {
                var textArea = document.createElement("textarea");
                textArea.value = text;
                
                // Avoid scrolling to bottom
                textArea.style.top = "0";
                textArea.style.left = "0";
                textArea.style.position = "fixed";

                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();

                try {
                    var successful = document.execCommand('copy');
                    var msg = successful ? 'successful' : 'unsuccessful';
                    console.log('Fallback: Copying text command was ' + msg);
                } catch (err) {
                    console.error('Fallback: Oops, unable to copy', err);
                }

                document.body.removeChild(textArea);
        }

       function copyTextToClipboard(text) {
            if (!navigator.clipboard) {
                fallbackCopyTextToClipboard(text);
                alert("copy done")
                return;
            }
            navigator.clipboard.writeText(text).then(function() {
                // console.log('Async: Copying to clipboard was successful!');
                alert("copy done")
            }, function(err) {
                console.error('Async: Could not copy text: ', err);
            });
        }
    })
</script>
@endsection 