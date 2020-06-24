@extends('site.master')
@section('body')
<section class="all-projects">
    <div class="container">

        <div class="title mb-5">
            <h1>{{trans('lang.projects')}}</h1>
        </div>
        <form action="{{route('user.search.projects',app()->getLocale())}}" method="GET" id="search_projects">

            <div class="row">
                <div class="col-sm-4 wow fadeInUp my-2" data-wow-duration="1s">
                    <select title="{{trans('lang.all developers')}}" class="custom-select" name="developer_id" id="developer">
                        <option {{!request('developer_id')?'selected':''}} value="">{{trans('lang.all developers')}}</option>
                        @foreach($developers as $developer)
                        <option {{request('developer_id')&&$developer->id==request('developer_id')?'selected':''}} value="{{$developer->id}}">
                            {{$developer->name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-4 wow fadeInUp my-2" data-wow-duration="1s">
                    <select title="{{trans('lang.select city')}}" class="custom-select" name="city_id" id="city">
                        <option {{!request('city_id')?'selected':''}} value="">{{trans('lang.select city')}}</option>
                        @foreach($cities as $city)
                        <option {{request('city_id')&&$city->id==request('city_id')?'selected':''}} value="{{$city->id}}">
                            @if(app()->getLocale()=='en') {{$city->name_en}} @else {{$city->name_ar}} @endif
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-4 wow fadeInUp my-2" data-wow-duration="1s">
                    <select title="{{trans('lang.select district')}}" class="custom-select" name="district_id" id="district">
                        <option {{!request('district_id')?'selected':''}} value="">{{trans('lang.select district')}}</option>
                        @foreach($districts as $district)
                        <option {{request('district_id')&&$city->id==request('district_id')?'selected':''}} value="{{$district->id}}">
                            @if(app()->getLocale()=='en') {{$district->name_en}} @else {{$district->name_ar}} @endif
                        </option>
                        @endforeach
                    </select>
                </div>
                @if(count($projects)>0)
                @foreach($projects as $project)
                <a title="@if(app()->getLocale()=='en') {{$project->title_en}} @else {{$project->title_ar}} @endif" href="{{route('user.project.get',['id'=>$project->id,'lang'=>app()->getLocale(),'project_title'=>str_replace('+','-',urlencode(str_replace('/','',$project->title_en)))])}}" class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="card">
                        <img class="card-img-top" src="{{env('AWS_URL') .$project->getThumbnailAttribute()}}" alt="@if(app()->getLocale()=='en') {{$project->title_en}} @else {{$project->title_ar}} @endif">
                        <div class="card-body">
                            <h5 class="card-title text-info" id="project-title">
                                @if(app()->getLocale()=='en') {{$project->title_en}} @else {{$project->title_ar}} @endif
                            </h5>
                            <div class="card-text text-black-50 non-capital" id="project-description" style="height:100px; overflow:hidden;">
                                @if(app()->getLocale()=='en') {!! $project->description_en !!} @else {!! $project->description_ar !!} @endif
                            </div>
                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                        </div>
                    </div>
                </a>
                @endforeach
                <div class="col-md-12 wow fadeInUp" data-wow-duration="1s"></div>
                <div style="margin:auto;">
                    {{ $projects->appends(getRequestBetweenPages())->render("pagination::bootstrap-4") }}
                </div>
                @else
                <div>
                    <p>{{trans('lang.no projects')}}</p>
                </div>
                @endif
            </div>
        </form>

    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection
@section('scripts')
<script type="text/javascript" src="{{url('site')}}/js/projects.js"></script>
@endsection