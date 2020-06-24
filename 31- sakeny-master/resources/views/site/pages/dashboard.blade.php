@extends('site.master')

@section('body')
<section class="about dashboard">
    <div class="container">
        <div class="row">
            <div class="title2 col-sm-12 py-3 rounded mb-5">
                <h1 class="text-center text-white font-weight-bold m-0">{{trans('lang.dashboard')}}</h1>
            </div>

            <div class="col-md-12">
                @include('site.layouts.message')
                @include('site.layouts.errors')
                @if (Session::get('assign'))
                <center>
                    <div class="alert alert-success align-center">
                        <strong>Success!</strong> Add Assiged Successfully.
                    </div>
                </center>
                @endif
                @if (Session::get('assign_package'))
                <center>
                    <div class="alert alert-success align-center">
                        <strong>Success!</strong> Package Assigned Successfully.
                    </div>
                </center>
                @endif
                @if (Session::get('assign_package_error'))
                <center>
                    <div class="alert alert-warning align-center">
                        <strong>Warning!</strong> Company already subscribed to package you have to cancel company old subscription.
                    </div>
                </center>
                @endif
                @if (Session::get('ad_repeat'))
                <center>
                    <div class="alert alert-success align-center">
                        <strong>Success!</strong> Ad promote to repeat.
                    </div>
                </center>
                @endif
                @if (Session::get('ad_remove_repeat'))
                <center>
                    <div class="alert alert-warning align-center">
                        <strong>Warning!</strong> Ad remove from repeat.
                    </div>
                </center>
                @endif
                @if (Session::get('ad_special'))
                <center>
                    <div class="alert alert-success align-center">
                        <strong>Success!</strong> Ad promote to special.
                    </div>
                </center>
                @endif
                @if (Session::get('ad_remove_special'))
                <center>
                    <div class="alert alert-warning align-center">
                        <strong>Warning!</strong> Ad remove from special.
                    </div>
                </center>
                @endif
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link @if(old('type')!='password_change' && old('type')!='add_agent' && old('type')!='edit_agent') active @endif" id="nav-home-tab" data-toggle="tab" href="#nav-stat" role="tab" aria-controls="nav-home" aria-selected="true" title="{{trans('lang.Company statistics')}}">
                            {{trans('lang.Company statistics')}}</a>

                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-ads" role="tab" aria-controls="nav-profile" aria-selected="false" title="{{trans('lang.manage_ads')}}">{{trans('lang.manage_ads')}}</a>

                        <a class="nav-item nav-link" id="nav-account-tab" data-toggle="tab" href="#nav-fav" role="tab" aria-controls="nav-profile" aria-selected="false" title="{{trans('lang.get_saved')}}">{{trans('lang.get_saved')}}</a>

                        <a class="nav-item nav-link @if(old('type')=='add_agent' || old('type')=='edit_agent') active @endif" id="nav-certi-tab" data-toggle="tab" href="#nav-agents" role="tab" aria-controls="nav-profile" aria-selected="false" title="{{trans('lang.manage_agents')}}">{{trans('lang.manage_agents')}}</a>

                        <a class="nav-item nav-link" id="nav-certi-tab" data-toggle="tab" href="#nav-history" role="tab" aria-controls="nav-profile" aria-selected="false" title="{{trans('lang.history')}}">{{trans('lang.history')}}</a>

                        <a class="nav-item nav-link" id="nav-certi-tab" data-toggle="tab" href="#nav-comp" role="tab" aria-controls="nav-profile" aria-selected="false" title="{{trans('lang.comparing')}}">{{trans('lang.comparing')}}</a>

                        <a class="nav-item nav-link @if(old('type')=='password_change') active @endif" id="nav-certi-tab" data-toggle="tab" href="#nav-pass" role="tab" aria-controls="nav-profile" aria-selected="false" title="{{trans('lang.reset_password')}}">{{trans('lang.reset_password')}}</a>

                        <a class="nav-item nav-link" id="nav-certi-tab" data-toggle="tab" href="#nav-subs" role="tab" aria-controls="nav-profile" aria-selected="false" title="{{trans('lang.subscription')}}">{{trans('lang.subscription')}}</a>
                    </div>
                </nav>

                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

                    <div class="tab-pane fade @if(old('type')!='password_change' && old('type')!='add_agent' && old('type')!='edit_agent') show active @endif" id="nav-stat" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="col-md-12 bg-main p-5 stati">

                            {{--<h3 class="font-weight-bold mb-4">Total Number of View: 60</h3>--}}

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 border border-dark py-3">
                                        <h4>{{trans('lang.no_of_ads')}}: {{$all_ads}}</h4>
                                    </div>

                                    <div class="col-md-6 border border-dark py-3">
                                        <h4>{{trans('lang.no_of_active_ads')}}: {{$valid_active}}</h4>
                                    </div>

                                    <div class="col-md-6 border border-dark py-3">
                                        <h4>{{trans('lang.no_of_premium_ads')}}: {{$premium}}</h4>
                                    </div>

                                    <div class="col-md-6 border border-dark py-3">
                                        <h4>{{trans('lang.no_of_active_premium_ads')}}: {{$premium_active}}</h4>
                                    </div>

                                    <div class="col-md-6 border border-dark py-3">
                                        <h4>{{trans('lang.no_of_agents')}}: {{$available_agents}}</h4>
                                    </div>

                                    <div class="col-md-6 border border-dark py-3">
                                        <h4>{{trans('lang.no_of_active_agents')}}: {{$active_agents}}</h4>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-ads" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <nav class="mb-4">
                            <div class="nav nav-tabs nav-fill" id="nav-tab2" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#active-ads" role="tab" aria-controls="nav-home" aria-selected="true">
                                    {{trans('lang.active')}}</a>

                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#expired-ads" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    {{trans('lang.expired_ads')}}</a>

                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#repeated-ads" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    {{trans('lang.repeated_ads')}}</a>

                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#special-ads" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    {{trans('lang.special_ads')}}</a>
                            </div>
                        </nav>

                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent2">

                            <div class="tab-pane fade show active" id="active-ads">
                                <div class="row py-0">
                                    @foreach($active_ads_data as $ad)
                                    <div class="col-md-4 my-3">
                                        <div class="card">
                                            <span class="sale bg-danger">@if(app()->getLocale()=='en')
                                                {{$ad->offer_type->title_en}} @else {{$ad->offer_type->title_ar}}
                                                @endif</span>
                                            @if(count($ad->images)>0)
                                            <a title="{{$ad->title}}" href="{{route('user.ad.get',['id'=>$ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$ad->title)))])}}">
                                                <img style="height: 300px;" class="card-img-top" src="{{env('AWS_URL') .$ad->images[0]['image']}}" alt="{{$ad->title}}">
                                            </a>
                                            @endif
                                            <div class="card-body">
                                                <p title="{{$ad->title}}" class="text-secondary text-center m-0">
                                                    {{$ad->title}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <a title="{{trans('lang.edit')}}" href="{{ route('company.ad.edit',['id'=>$ad->id,'lang'=>app()->getLocale()]) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i>@if(app()->getLocale()=='en')
                                                    {{$ad->city->name_en}} @else {{$ad->city->name_ar}} @endif</small>
                                                <small class="text-muted float-right"><span class="text-success font-weight-bold">{{$ad->price}}</span>
                                                    @if(app()->getLocale()=='en') {{$ad->country->currency_en}} @else
                                                    {{$ad->country->currency_ar}} @endif
                                                </small>
                                            </div>

                                            <div class="card-footer">
                                                <label class="switch">
                                                    <input title="" data-href="{{route('user.change.status',$ad->id)}}" type="checkbox" {{$ad->user_active==1?'checked':''}}>
                                                    <span class="slider round"></span>
                                                </label>
                                                <form class="form-inline" action="{{ route('company.ad.assign',$ad->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <select required name="agent_id" class="btn btn-secondary dropdown-toggle">
                                                        @if(!$ad->agent_id)
                                                        <option disabled selected value>Select Agent</option>
                                                        @endif
                                                        <option value="">Agent</option>
                                                        @foreach ($agents as $agent)
                                                        <option {{$agent->id==$ad->agent_id?'selected':''}} value="{{ $agent->id }}">{{ $agent->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    <button title="{{trans('lang.edit')}}" type="submit" class="btn btn-success ml-5" style="color: white">Assign</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if(count($active_ads_data)==0)
                                    <p>{{trans('lang.no ads')}}</p>
                                    @endif
                                </div>

                            </div>

                            <div class="tab-pane fade show" id="expired-ads">
                                <div class="row py-0">
                                    @foreach($expired_ads_data as $ad)
                                    <div class="col-md-4 my-3">
                                        <div class="card">
                                            <span class="sale bg-danger">@if(app()->getLocale()=='en')
                                                {{$ad->offer_type->title_en}} @else {{$ad->offer_type->title_ar}}
                                                @endif</span>
                                            @if(count($ad->images)>0)
                                            <img title="{{$ad->title}}" style="height: 300px;" class="card-img-top" src="{{env('AWS_URL') .$ad->images[0]['image']}}" alt="{{$ad->title}}">
                                            @endif
                                            <div class="card-body">
                                                <p title="{{$ad->title}}" class="text-secondary text-center m-0">
                                                    {{$ad->title}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i>@if(app()->getLocale()=='en')
                                                    {{$ad->city->name_en}} @else {{$ad->city->name_ar}} @endif</small>
                                                <small class="text-muted float-right"><span class="text-success font-weight-bold">{{$ad->price}}</span>
                                                    @if(app()->getLocale()=='en') {{$ad->country->currency_en}} @else
                                                    {{$ad->country->currency_ar}} @endif
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if(count($expired_ads_data)==0)
                                    <p>{{trans('lang.no ads')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="repeated-ads">
                                <div class="row py-0">
                                    <p>{{trans('lang.no ads')}}</p>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="special-ads">
                                <div class="row py-0">
                                    <p>{{trans('lang.no ads')}}</p>
                                </div>
                            </div>

                        </div>

                        <a class="btn btn-success" title="{{trans('lang.Add_ad')}}" href="{{route('company.ad.create.get',app()->getLocale())}}">{{trans('lang.Add_ad')}}</a>
                    </div>

                    <div class="tab-pane fade" id="nav-fav" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row py-0">

                            @foreach($favourites as $favourite)
                            <div class="col-md-4 my-3">
                                <div class="card">
                                    <span class="sale bg-danger">@if(app()->getLocale()=='en')
                                        {{$favourite->ad->offer_type->title_en}} @else
                                        {{$favourite->ad->offer_type->title_ar}} @endif</span>
                                    @if(count($favourite->ad->images)>0)
                                    <img title="{{$favourite->ad->title}}" style="height: 300px;" class="card-img-top" src="{{env('AWS_URL') .$favourite->ad->images[0]['image']}}" alt="{{$favourite->ad->title}}">
                                    @endif
                                    <div class="card-body">
                                        <p title="{{$favourite->ad->title}}" class="text-secondary text-center m-0">
                                            {{$favourite->ad->title}}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i>@if(app()->getLocale()=='en')
                                            {{$favourite->ad->city->name_en}} @else {{$favourite->ad->city->name_ar}}
                                            @endif</small>
                                        <small class="text-muted float-right"><span class="text-success font-weight-bold">{{$favourite->ad->price}}</span>
                                            @if(app()->getLocale()=='en') {{$favourite->ad->country->currency_en}} @else
                                            {{$favourite->ad->country->currency_ar}} @endif
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @if(count($favourites)==0)
                            <p>{{trans('lang.no ads')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="tab-pane fade @if(old('type')=='add_agent' || old('type')=='edit_agent') show active @endif" id="nav-agents" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="container">
                            <div class="agents row">

                                <!-- Add-agent-modal -->
                                <div class="fade modal" id="add-agent-modal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">{{trans('lang.add_agent')}}</h4>
                                            </div>
                                            @if(old('type')=='add_agent')
                                            @include('site.layouts.errors')
                                            @endif
                                            <form action="{{route('company.agent.create.post')}}" method="POST" enctype="multipart/form-data" class="form-row">
                                                <!-- Modal body -->
                                                <div class="modal-body row">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="type" value="add_agent" />
                                                    <div class="form-group  col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">*
                                                            {{trans('lang.email')}}</label>
                                                        <input value="{{old('email')}}" type="text" name="email" class="form-control {{ $errors->has('email') && old('type')=='add_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.email')}}">
                                                        @if(old('type')=='add_agent'){!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}@endif
                                                    </div>

                                                    <div class="form-group col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">* {{trans('lang.name')}}</label>
                                                        <input value="{{old('name')}}" type="text" name="name" class="form-control {{ $errors->has('name') && old('type')=='add_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.name')}}">
                                                        @if(old('type')=='add_agent'){!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}@endif
                                                    </div>

                                                    <div class="form-group  col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">*
                                                            {{trans('lang.password')}}</label>
                                                        <input type="password" name="password" class="form-control {{ $errors->has('password') && old('type')=='add_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.password')}}">
                                                        @if(old('type')=='add_agent'){!! $errors->first('password', '
                                                        <div class="invalid-feedback">:message</div>') !!}@endif
                                                    </div>

                                                    <div class="form-group  col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">*
                                                            {{trans('lang.password_confirmation')}}</label>
                                                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') && old('type')=='add_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.password_confirmation')}}">
                                                        @if(old('type')=='add_agent'){!! $errors->first('password', '
                                                        <div class="invalid-feedback">:message</div>') !!}@endif
                                                    </div>

                                                    <div class="form-group col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">*
                                                            {{trans('lang.phone')}}</label>
                                                        <input value="{{old('phone')}}" type="text" name="phone" class="form-control {{ $errors->has('phone') && old('type')=='add_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.phone')}}">
                                                        @if(old('type')=='add_agent'){!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}@endif
                                                    </div>

                                                    <div class="form-group col-md-6 custom-file" data-wow-duration="1s" style="height: 90px;">* {{trans('lang.addimages')}}
                                                        .png,jpg,jpeg
                                                        <input type="file" id="image" name="image" class="custom-file-input {{ $errors->has('image') && old('type')=='add_agent' ? 'is-invalid' : ''}} {{ $errors->has('image') ? 'is-invalid' : ''}}" id="customFile">
                                                        @if(old('type')=='add_agent'){!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}@endif
                                                        <label style="margin-left: 15px;width: 90%;top:32px" class="custom-file-label" for="customFile">@if(app()->getLocale()=='en') Choose file @endif</label>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <input type="submit" title="{{trans('lang.add')}}" class="btn btn-primary px-5" value="{{trans('lang.add')}}">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @foreach($agents as $agent)
                                <!-- Edit-agent-modal -->
                                <div class="fade modal" id="edit-agent-modal-{{$agent->id}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">{{trans('lang.edit_agent')}}</h4>
                                            </div>

                                            <form action="{{route('company.agent.edit.post',$agent->id)}}" method="POST" enctype="multipart/form-data">
                                                <!-- Modal body -->
                                                <div class="modal-body row">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="type" value="edit_agent" />
                                                    <input type="hidden" name="modal" value="{{$agent->id}}" />
                                                    <div class="form-group  col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">*
                                                            {{trans('lang.email')}}</label>
                                                        <input value="{{$agent->email}}" type="text" name="email" class="form-control {{ $errors->has('email') && old('modal')==$agent->id && old('type')=='edit_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.email')}}">
                                                        @if(old('modal')==$agent->id && old('type')=='edit_agent'){!!
                                                        $errors->first('email', '<div class="invalid-feedback">:message
                                                        </div>') !!}@endif
                                                    </div>

                                                    <div class="form-group col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">* {{trans('lang.name')}}</label>
                                                        <input value="{{$agent->name}}" type="text" name="name" class="form-control {{ $errors->has('name') && old('modal')==$agent->id && old('type')=='edit_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.name')}}">
                                                        @if(old('modal')==$agent->id && old('type')=='edit_agent'){!!
                                                        $errors->first('name', '<div class="invalid-feedback">:message
                                                        </div>') !!}@endif
                                                    </div>

                                                    <div class="form-group  col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">*
                                                            {{trans('lang.password')}}</label>
                                                        <input type="password" name="password" class="form-control {{ $errors->has('password') && old('modal')==$agent->id && old('type')=='edit_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.password')}}">
                                                        @if(old('modal')==$agent->id && old('type')=='edit_agent'){!!
                                                        $errors->first('password', '<div class="invalid-feedback">
                                                            :message</div>') !!}@endif
                                                    </div>

                                                    <div class="form-group  col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">*
                                                            {{trans('lang.password_confirmation')}}</label>
                                                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') && old('modal')==$agent->id && old('type')=='edit_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.password_confirmation')}}">
                                                        @if(old('modal')==$agent->id && old('type')=='edit_agent'){!!
                                                        $errors->first('password', '<div class="invalid-feedback">
                                                            :message</div>') !!}@endif
                                                    </div>

                                                    <div class="form-group col-md-6" data-wow-duration="1s">
                                                        <label for="exampleCompanyName">*
                                                            {{trans('lang.phone')}}</label>
                                                        <input value="{{$agent->phone}}" type="text" name="phone" class="form-control {{ $errors->has('phone') && old('modal')==$agent->id && old('type')=='edit_agent' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.phone')}}">
                                                        @if(old('modal')==$agent->id && old('type')=='edit_agent'){!!
                                                        $errors->first('phone', '<div class="invalid-feedback">:message
                                                        </div>') !!}@endif
                                                    </div>

                                                    <div class="form-group col-md-6 custom-file" data-wow-duration="1s" style="height: 90px;">* {{trans('lang.addimages')}}
                                                        .png,jpg,jpeg
                                                        <input type="file" id="image" name="image" class="custom-file-input {{ $errors->has('image') && old('modal')==$agent->id && old('type')=='edit_agent' ? 'is-invalid' : ''}} {{ $errors->has('image') ? 'is-invalid' : ''}}" id="customFile">
                                                        @if(old('modal')==$agent->id && old('type')=='edit_agent'){!!
                                                        $errors->first('image', '<div class="invalid-feedback">:message
                                                        </div>') !!}@endif
                                                        <label style="margin-left: 15px;width: 90%;top:32px" class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" title="{{trans('lang.save')}}" class="btn btn-primary px-5">{{trans('lang.save')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 my-2">
                                    <div class="agent">
                                        <img title="{{$agent->name}}" src="{{env('AWS_URL') .$agent->image}}" alt="{{$agent->name}}">
                                        <h5 class="font-weight-bold"><a href="{{route('company.agent.ads.get',['id'=>$agent->id,'lang'=>app()->getLocale()])}}">{{$agent->name}}</a>
                                        </h5>
                                        <h6 class="py-1">{{$agent->email}}</h6>
                                        <h6>{{$agent->phone}}</h6>
                                        <a title="{{trans('lang.delete')}}" href="{{route('company.agent.delete',$agent->id)}}" class="btn btn-danger m-2 d-inline-block"><i class="far fa-trash-alt"></i></a>
                                        <a title="{{trans('lang.edit')}}" href="" data-toggle="modal" data-target="#edit-agent-modal-{{$agent->id}}" class="btn btn-info m-2 d-inline-block"><i class="far fa-edit"></i></a>
                                    </div>
                                </div>
                                @endforeach


                                <div class="col-md-12 text-center">
                                    <button title="{{trans('lang.add_agent')}}" class="btn text-white bg-primary px-5 py-2 my-5" data-toggle="modal" data-target="#add-agent-modal">{{trans('lang.add_agent')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            @foreach($history_ads as $ad)
                            <div class="col-md-4 my-3">
                                <a class="card">
                                    <span class="sale bg-danger">@if(app()->getLocale()=='en') {{$ad->offer_type->title_en}}
                                        @else {{$ad->offer_type->title_ar}} @endif</span>
                                    @if(count($ad->images)>0)
                                    <img title="{{$ad->title}}" style="height: 300px;" class="card-img-top" src="{{env('AWS_URL') .$ad->images[0]['image']}}" alt="{{$ad->title}}">
                                    @endif
                                    <div class="card-body">
                                        <p title="{{$ad->title}}" class="text-secondary text-center m-0">{{$ad->title}}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i>@if(app()->getLocale()=='en')
                                            {{$ad->city->name_en}} @else {{$ad->city->name_ar}} @endif</small>
                                        <small class="text-muted float-right"><span class="text-success font-weight-bold">{{$ad->price}}</span>
                                            @if(app()->getLocale()=='en') {{$ad->country->currency_en}} @else
                                            {{$ad->country->currency_ar}} @endif
                                        </small>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @if(count($history_ads)==0)
                        <p>{{trans('lang.no ads')}}</p>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="nav-comp" role="tabpanel" aria-labelledby="nav-profile-tab">
                        @if(count($compare_ads)>0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    @foreach($compare_ads as $ad)
                                    <th scope="col" style="line-height: 35px;">{{$ad->title}} <a class="btn btn-danger {{app()->getLocale()=='en'? 'float-right': 'float-left'}} text-white" href="{{route('user.compare.delete',$ad->id)}}"> X </a></th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{trans('lang.description')}}</th>
                                    @foreach($compare_ads as $ad)
                                    <td style="word-break: break-word;">{!! $ad->description !!}</td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <th scope="row">{{trans('lang.images')}}</th>
                                    @foreach($compare_ads as $ad)
                                    <td style="text-align:center"><img title="{{$ad->title}}" style="max-width:250px; max-height:250px;" src="{{env('AWS_URL') .$ad->images[0]['image']}}" alt="{{$ad->title}}"></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th scope="row">{{trans('lang.price')}}</th>
                                    @foreach($compare_ads as $ad)
                                    <td>{{$ad->price}} @if(app()->getLocale()=='en') {{$ad->country->currency_en}} @else
                                        {{$ad->country->currency_ar}} @endif</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th scope="row">{{trans('lang.size')}}</th>
                                    @foreach($compare_ads as $ad)
                                    <td>{{$ad->size}} m²</td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <th scope="row">{{trans('lang.beds')}}</th>
                                    @foreach($compare_ads as $ad)
                                    <td>{{$ad->bedrooms_num}}</td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <th scope="row">{{trans('lang.building_year')}}</th>
                                    @foreach($compare_ads as $ad)
                                    <td>{{$ad->building_year}}</td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <th scope="row">{{trans('lang.bathrooms')}}</th>
                                    @foreach($compare_ads as $ad)
                                    <td>{{$ad->bathrooms_num}}</td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <th scope="row">{{trans('lang.level_of_finishing')}}</th>
                                    @foreach($compare_ads as $ad)
                                    <td>@if(app()->getLocale()=='en') {{$ad->level_of_finished->name_en}} @else {{$ad->level_of_finished->name_ar}} @endif</td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <th scope="row">{{trans('lang.view_of_unit')}}</th>
                                    @foreach($compare_ads as $ad)
                                    <td>@if(app()->getLocale()=='en') {{$ad->unit_view->name_en}} @else {{$ad->unit_view->name_ar}} @endif</td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <th scope="row">{{trans('lang.features')}}</th>
                                    @foreach($compare_ads as $ad)
                                    @if(count($ad->amenities)>0)
                                    <td>
                                        <ul class="features list-unstyled wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                            @foreach($ad->amenities as $feature)
                                            <li><i class="fas fa-check my-2"></i> <b>@if(app()->getLocale()=='en') {{$feature->name_en}} @else {{$feature->name_ar}} @endif</b></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    @endif
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <p>{{trans('lang.no ads')}}</p>
                        @endif
                    </div>

                    <div class="tab-pane fade @if(old('type')=='password_change') show active @endif" id="nav-pass" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="col-md-12 bg-main p-5">
                            <form action="{{route('company.changepassword')}}" class="form-row justify-content-end" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="type" value="password_change" />
                                <div class="form-group offset-md-3 col-md-6 ">
                                    <input class="form-control @if(old('type')=='password_change'){{ $errors->has('old_password') ? 'is-invalid' : ''}}@endif" name="old_password" type="password" placeholder="{{trans('lang.old_password')}}">
                                    @if(old('type')=='password_change'){!! $errors->first('old_password', '<div class="invalid-feedback">:message</div>') !!}@endif
                                </div>
                                <div class="form-group offset-md-3 col-md-6">
                                    <input class="form-control @if(old('type')=='password_change'){{ $errors->has('password') ? 'is-invalid' : ''}}@endif" name="password" type="password" placeholder="{{trans('lang.new_password')}}">
                                    @if(old('type')=='password_change'){!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}@endif
                                </div>
                                <div class="form-group offset-md-3 col-md-6">
                                    <input class="form-control @if(old('type')=='password_change'){{ $errors->has('password') ? 'is-invalid' : ''}}@endif" name="password_confirmation" type="password" placeholder="{{trans('lang.confirmpassword')}}">
                                    @if(old('type')=='password_change'){!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}@endif
                                </div>

                                <div class="form-group offset-md-3 col-md-6">
                                    <input class="form-control text-white btn  bg-main2" type="submit" value="{{trans('lang.changepassword')}}">
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-subs" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <section class="plans">
                            <div class="title" style="display:block; width:auto;">
                                <h1 style='font-size: 33px !important;font-weight: 900 !important;padding-top: 25px !important;'>
                                    {{trans('lang.packages')}}</h1>
                            </div>
                            <div class="container" style="width:100% !important">
                                <div class="row pb-4 border-bottom">
                                    @foreach($packages as $key => $package)
                                    <div class="col-xl col-lg-3 col-md-4 col-sm-6 p-0">
                                        <div class="@if($key==0) normal @endif @if($key==1) average @endif @if($key==2) gold @endif @if($key==3) superduper @endif @if($key==4) special @endif" style="margin: 10px 5px;">
                                            <div class="price-package">
                                                <div class="package-name">
                                                    <h2>@if(app()->getLocale()=='en') {{$package->name_en}} @else
                                                        {{$package->name_ar}} @endif</h2>
                                                </div>
                                                <div class="package-price">
                                                    <div class="package-arrow"></div>
                                                    <div class="price">
                                                        <span>{{$package->price}}</span>
                                                    </div>
                                                    <div class="package-features">
                                                        <div class="package-arrow"></div>
                                                        <ul>
                                                            <li>{{trans('lang.regular_ads')}} :
                                                                {{$package->adtype->no_of_normal_ads}}</li>
                                                            <li>{{trans('lang.premium_ads')}} :
                                                                {{$package->adtype->no_of_special_ads}}</li>
                                                            <li>{{trans('lang.repost_ads')}} :
                                                                {{$package->adtype->no_of_repeated_ads}}</li>
                                                            <li>{{trans('lang.facebook_ads')}} :
                                                                {{$package->adtype->no_of_seo_ads}}</li>
                                                        </ul>
                                                    </div>
                                                    <!--package-features-->
                                                </div>
                                                <!--package-price-->
                                            </div>
                                            <!--price-package-->
                                        </div>
                                        @if(auth('user')->user()->company->activesubscription)
                                        <div class="row">
                                            <form action="{{route('company.packages.subscribe')}}" method="POST">
                                                {{csrf_field()}}
                                                <input type="hidden" value="{{$package->id}}" name="package_id" />
                                                <input class="form-control text-white btn  bg-main2" type="submit" value="{{trans('lang.subscribe')}}">
                                            </form>
                                        </div>
                                        @endif
                                        <!--Economical-->
                                    </div>
                                    @endforeach
                                </div>
                            </div>



                        </section>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var dialog_type = "{{old('type')?old('type'):''}}";

        if (dialog_type == "add_agent") {
            $('#add-agent-modal').modal('show');
        } else if (dialog_type == "edit_agent") {
            $("#edit-agent-modal-{{old('modal')}}").modal('show');
        }

        $('input[type="checkbox"]').change(function() {
            if (!$(this).hasClass('check_all') && !$(this).hasClass('ads_check')) {
                var link = $(this).attr('data-href');
                $(this).prop('disabled', true);
                window.location.replace(link);
            } else if ($(this).hasClass('check_all')) {
                if ($("#check_all").prop('checked')) {
                    $('.ads_check').each(function(i) {
                        $(this).prop('checked', true);
                    });
                } else {
                    $('.ads_check').each(function(i) {
                        $(this).prop('checked', false);
                    });
                }
            }
        });

        $("#promote_to_repeat_form").submit(function(e) {
            var ids = '';
            var count = 0;
            $('input[type="checkbox"].ads_check').each(function() {
                if ($(this).prop('checked')) {
                    count++;
                    if (ids == '') {
                        ids = $(this).val();
                    } else {
                        ids += ',' + $(this).val();
                    }
                }
            });
            if (count == 0) {
                alert('Please Select Ads');
                e.preventDefault();
                return false;
            }
            //            alert(ids);
            $("#repeat_ids").val(ids);
            //            e.preventDefault();
            //            return false;
            $("#promote_to_repeat_form").submit();
        });

        $("#promote_to_special_form").submit(function(e) {
            var ids = '';
            var count = 0;
            $('input[type="checkbox"].ads_check').each(function() {
                if ($(this).prop('checked')) {
                    count++;
                    if (ids == '') {
                        ids = $(this).val();
                    } else {
                        ids += ',' + $(this).val();
                    }
                }
            });
            if (count == 0) {
                alert('Please Select Ads');
                e.preventDefault();
                return false;
            }
            //            alert(ids);
            $("#special_ids").val(ids);
            //            e.preventDefault();
            //            return false;
            $("#promote_to_special_form").submit();
        });
    });
</script>
@endsection