<ol class="breadcrumb">
	<li> <a href="{{ url('') }}">@lang('lang.dashboard')</a> </li>
	@yield('breadcrumb','<li class="active">'.(@$module_name ? $module_name : 'Module').'</li>')
</ol>
