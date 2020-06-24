{!! Form::open(['method' => 'DELETE', 'url' => [ADMIN_PATH."/$route",$row->id], 'class' => 'form-horizontal']) !!}

{!! Form::hidden('id', $row->id) !!}
<a style="margin:2px;" class="btn btn-icon waves-effect btn-default waves-light" href="{{ url(ADMIN_PATH."/$route/$row->id/edit") }}"> <i class="icon-pencil"></i></a>

<a class="btn btn-icon waves-effect btn-warning waves-light" href="{{ url(ADMIN_PATH."/$route/$row->id/update-history") }}"> <i class="fa fa-history"></i></a>
@if($row->featured==0)
<a style="margin:2px;" class="btn btn-icon waves-effect btn-warning waves-light featured-toggle" href="{{ url(ADMIN_PATH."/$route/update/featured/$row->id") }}">
        Mark as Featured
</a>
@else
<a style="margin:2px;" class="btn btn-icon waves-effect btn-warning waves-light featured-toggle" href="{{ url(ADMIN_PATH."/$route/update/notfeatured/$row->id") }}">
        Mark as not Featured
</a>
@endif
<button style="margin:2px;" type="submit" class="btn btn-icon waves-effect btn-danger waves-light" onclick="return confirm('Confirm Delete operation ?');"> <i class="icon-trash"></i> </button>

{!! Form::close() !!}

<div class="modal fade" id="featured-modal">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Ads Featured Status</h4>
                        </div>
                        <div class="modal-body">
                                Are You Sure?
                        </div>
                        <div class="modal-footer">
                                <a id="featured-toggle-link" href="" class="btn btn-info">Yes</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                </div>
        </div>
</div>