@extends('site.master')
@section('body')
<section class="about">
    <div class="container">
        <div class="row">
            <div class="title2 col-sm-12 py-3 rounded mb-5">
                <h1 class="text-center text-white font-weight-bold m-0">{{trans('lang.comparing')}}</h1>
            </div>
            @if(count($ads)>0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        @foreach($ads as $ad)
                        <th scope="col" style="line-height: 35px;">{{$ad->title}} <a class="btn btn-danger {{app()->getLocale()=='en'? 'float-right': 'float-left'}} text-white" href="{{route('user.compare.delete',$ad->id)}}"> X </a></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{trans('lang.description')}}</th>
                        @foreach($ads as $ad)
                        <td style="word-break: break-word;">{!! $ad->description !!}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <th scope="row">{{trans('lang.images')}}</th>
                        @foreach($ads as $ad)
                        <td style="text-align:center"><img title="{{$ad->title}}" style="max-width:250px; max-height:250px;" src="{{env('AWS_URL') .$ad->images[0]['image']}}" alt="{{$ad->title}}"></td>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="row">{{trans('lang.price')}}</th>
                        @foreach($ads as $ad)
                        <td>{{$ad->price}} @if(app()->getLocale()=='en') {{$ad->country->currency_en}} @else {{$ad->country->currency_ar}} @endif</td>
                        @endforeach
                    </tr>

                    <tr>
                        <th scope="row">{{trans('lang.size')}}</th>
                        @foreach($ads as $ad)
                        <td>{{$ad->size}} m²</td>
                        @endforeach
                    </tr>

                    <tr>
                        <th scope="row">{{trans('lang.beds')}}</th>
                        @foreach($ads as $ad)
                        <td>{{$ad->bedrooms_num}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <th scope="row">{{trans('lang.building_year')}}</th>
                        @foreach($ads as $ad)
                        <td>{{$ad->building_year}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <th scope="row">{{trans('lang.bathrooms')}}</th>
                        @foreach($ads as $ad)
                        <td>{{$ad->bathrooms_num}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <th scope="row">{{trans('lang.level_of_finishing')}}</th>
                        @foreach($ads as $ad)
                        <td>@if(app()->getLocale()=='en') {{$ad->level_of_finished->name_en}} @else {{$ad->level_of_finished->name_ar}} @endif</td>
                        @endforeach
                    </tr>

                    <tr>
                        <th scope="row">{{trans('lang.view_of_unit')}}</th>
                        @foreach($ads as $ad)
                        <td>@if(app()->getLocale()=='en') {{$ad->unit_view->name_en}} @else {{$ad->unit_view->name_ar}} @endif</td>
                        @endforeach
                    </tr>

                    <tr>
                        <th scope="row">{{trans('lang.features')}}</th>
                        @foreach($ads as $ad)
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
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection