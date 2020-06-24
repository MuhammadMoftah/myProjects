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
    });

    $(document).on('change', 'input[name="relationable[]"]', function(){
        $checkbox = $(this);
        $is_checked = $checkbox.is(':checked');
        if ($is_checked) {
            $checkbox.parent().parent().parent().find('.relation-section').removeClass('hidden');
        }else{
            $checkbox.parent().parent().parent().find('.relation-section').addClass('hidden');
        }
    })


     /**
      * Override for custom functionality
     * Start Area of Elements Duplicator
     * Elements Duplicator By Mark Rady
     */
    $(document).on('click','[data-toggle="duplicate-input-database"]',function(e){
        $item = $(this).data('duplicate');
        $item = $($item).last().clone();

        $item.find('input:not([type="checkbox"]) :not([type="radio"])').val('');
        $item.find('textarea').val('');
        $item.find('input[type="checkbox"]').prop('checked',false);
        $item.find('input[type="radio"]').prop('checked',false);

        $target = $(this).data('target'); //get target

        $item.find('[data-toggle="duplicate-input-database"]')
            .children().first()
            .replaceWith($(this).data('toggledata'));

        $item.find('[data-toggle="duplicate-input-database"]')
            .toggleClass($(this).data('toggleclass'))
            .attr('data-toggle','remove-input');
        $item.find('.relation-section').addClass('hidden');

        $randId = Math.floor(Math.random() * 20000);;
        $item.find('.modal-database-configration-btn').attr('href',`#modal-database-configration-btn-${$randId}`);
        $item.find('.modal-database-configration').attr('id',`modal-database-configration-btn-${$randId}`);

        $randId = Math.floor(Math.random() * 20000);;
        $item.find('.modal-ui-view-configration-btn').attr('href',`#modal-ui-view-configration-btn-${$randId}`);
        $item.find('.modal-ui-view-configration').attr('id',`modal-ui-view-configration-btn-${$randId}`);



        $($target).append($item);
    });

    /**
     * Override for custom functionality
     * End Area of Elements Duplicator
     * Elements Duplicator By Mark Rady
     */

});
