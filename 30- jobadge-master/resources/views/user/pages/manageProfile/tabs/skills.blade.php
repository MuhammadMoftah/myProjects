<main class="user-details bg-white rounded p-3">

    <form id="skills-form" class="add-skills bg-white border rounded mb-2 pb-3" action="{{route('user.skills.post')}}" method="POST" class="form-row">
        @csrf
        <div class="form-group col-md-12  demo-tagsinput-area">
            <label class="font-weight-bold py-3 d-block">
                Skills
                <span  style="font-size: 16px;
                color: #9e9191;
                font-weight: 500;
                font-style: italic;
                padding-left: 5px;">( If you added or removed skills must click save, else will discard the change . )</span>
            </label>
            
            <input name="skills" id="skill-mange" placeholder="enter another skill" data-old="{{$user->getSkillsForEdit()}}" type="text" value="{{$user->getSkillsForEdit()}}" data-role="tagsinput" />
        </div>

        <div class="col-12">
            <input type="submit" disabled id="Save_skills" value="save" class='btn btn-main2 btn-sm '> 
        </div>
    </form>

    <div class="form-group bg-white border rounded langu-form">
        <div class="col-12">
            <label class="font-weight-bold py-3 d-block">Languages</label>
            @foreach($user->languages as $language)
            <p class="d-inline-block mr-2">{{$language->language}}: 
                <span class="text-success"> 
                    @if($language->rate==1)
                    intermediate
                    @elseif($language->rate==2)
                    Good
                    @elseif($language->rate==3)
                    V.Good
                    @elseif($language->rate==4)
                    Excellent
                    @endif
                 </span>
                <a href="{{route('user.language.delete',$language->id)}}" class="close text-danger pl-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </p>
            @endforeach
           
        </div>
       
        <div class="col-12 pb-3">
            <button class="btn btn-main2 mt-2 btn-sm " data-toggle="modal" data-target="#addLanguModal"> <i class="fas fa-plus mr-2"></i> Add language</button>
        </div>
                       
    </div>

</main>

@push('models')
    <!-- Add new language -->
<!-- Add new language -->
<div id="addLanguModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add Language</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('user.language.post')}}" method="POST" class="form-row" >
                    @csrf
                    <input value="skills" name="tab"   type="hidden">
                    <input value="#addLanguModal" name="model" type="hidden">
                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Language</label>
                        <input value="{{old('language')}}" type="text" name="language" class="form-control {{ $errors->has('language') && old('tab')=='skills'? 'is-invalid': ''}}" placeholder="Enter your language">
                        @if(old('tab')=="skills"){!! $errors->first('language', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
    
                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Rate</label>
                        <select name="rate" class="form-control {{ $errors->has('rate') && old('tab')=='skills'? 'is-invalid': ''}}">
                            @if(!old('rate'))
                            <option selected disabled>select your rate</option>
                            @endif
                            <option {{old('rate')==4?'selected':''}} value="4">Excellent</option>
                            <option {{old('rate')==3?'selected':''}} value="3">Very Good</option>
                            <option {{old('rate')==2?'selected':''}} value="2">Good</option>
                            <option {{old('rate')==1?'selected':''}} value="1">intermediate</option>
                        </select>
                        @if(old('tab')=="skills"){!! $errors->first('rate', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-main2 my-1" value="Add language">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endpush

@push('tabsScripts')
    

<script>
    $(function(){
        var addSkillsButton  = $("#Save_skills")
        $("#skill-mange").change(function(){
            var _elm = $(this)
            handleSkillsChange(_elm)
        })

        function handleSkillsChange(_elm){
            if(_elm.val() == _elm.data("old"))
            {
                addSkillsButton.prop("disabled",true)
            }else{
                addSkillsButton.prop("disabled",false)
            }
        }
    })
</script>

@endpush