@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    Job View
                </h2>
                @include('admin.layouts.message')
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>company</th>
                            <td>{{$job->company->name}}</td>
                        </tr>
                        <tr>
                            <th>title</th>
                            <td>{{$job->title}}</td>
                        </tr>
                        <tr>
                            <th>Job Type</th>
                            <td>{{$job->jobtype->name_en}} - {{$job->jobtype->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>Job Level</th>
                            <td>{{$job->joblevel->name_en}} - {{$job->joblevel->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>Job location </th>
                            <td>
                                @if($job->city && $job->country)
                                <span class="detail-info-title">{{$job->city->name_en}}, {{$job->country->name_en}}</span>
                                @else
                                   <span class="detail-info-title">{{$job->company->city->name_en}}, {{$job->company->country->name_en}}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>gender</th>
                            <td>{{$job->gender}}</td>
                        </tr>
                        <tr>
                            <th>category</th>
                            <td>{{$job->category->name_en}} - {{$job->category->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>years of experience</th>
                            <td>{{$job->experience_years}}</td>
                        </tr>
                        <tr>
                            <th>Vacancies</th>
                            <td>{{$job->vacancies}}</td>
                        </tr>
                        <tr>
                            <th>Education Level</th>
                            <td>{{$job->education_level}}</td>
                        </tr>
                        <tr>
                            <th>Nationality</th>
                            <td>{{$job->nationality->name_en}} - {{$job->nationality->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>Job requirement</th>
                            <td>{!! $job->job_requirement !!}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $job->description !!}</td>
                        </tr>
                        <tr>
                            <th>KPI</th>
                            <td>{!! $job->KPI !!}</td>
                        </tr>
                        <tr>
                            <th>Benefits</th>
                            <td>{!! $job->benefits !!}</td>
                        </tr>
                        <tr>
                            <th>Skills</th>
                            <td>{!! $job->skills !!}</td>
                        </tr>
                        <tr>
                            <th>Apply On Company Site</th>
                            <td>
                                @if($job->apply_on_site==1)
                                <i class="material-icons">done</i>
                                @else
                                <i class="material-icons">close</i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Job Status</th>
                            <td>
                                <a href="{{route('admin.jobs.change',$job->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    @if($job->approve==1)
                                    <i class="material-icons">clear</i>
                                    @else
                                    <i class="material-icons">done</i>

                                    @endif
                            </td>
                        </tr>
                        @if($job->apply_on_site==1)
                        <tr>
                            <th>Company Url</th>
                            <td>
                                <a href="{{$job->company_url}}">{{$job->company_url}}</a>
                            </td>
                        </tr>
                        @endif
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->
@endsection