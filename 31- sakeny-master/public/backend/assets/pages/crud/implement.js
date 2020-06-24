$(document).ready(function() {

    $('input[name="name"]').keyup(function(){
        $val = $(this).val();

        $plural = $val.plural();
        $titled = $val.titled();
        if ($val.length > 0) {
            $('input[name="controller_name"]').val($titled+"Controller");
            $('input[name="table_name"]').val($plural.toLowerCase());
            $('input[name="route_name"]').val($val.toLowerCase());
        }
        else {
             $('input[name="controller_name"]').val('');
            $('input[name="table_name"]').val('');
            $('input[name="route_name"]').val('');
        }
    })
});
