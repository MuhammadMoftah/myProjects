$(document).ready(function() {
    /**
     * Start Area of Elements Duplicator
     * Elements Duplicator By Mark Rady
     */
    $(document).on('click','[data-toggle="duplicate-input"]',function(e){
        $item_selector = $(this).data('duplicate'); // item need to duplicate
        $item = $($item_selector).last().clone(); // clone it


        // empty all inputs
        $item.find('input').val('');
        $item.find('input:not([type="checkbox"]) :not([type="radio"])').val('');
        $item.find('textarea').val('');
        $item.find('input[type="checkbox"]').prop('checked',false);
        $item.find('input[type="radio"]').prop('checked',false);

        // target will receive the data
        $target = $(this).data('target'); //get target

        // replace content of button such as icon
        $item.find(`[data-target="${$target}"]`)
            .children().first()
            .replaceWith($(this).data('toggledata'));

        // change button functionlity to remove instead of create
        $item.find(`[data-target="${$target}"]`)
            .toggleClass($(this).data('toggleclass'))
            .attr('data-toggle','remove-input');

        if ($($target).length == 1) {
            $($target).append($item);
        }
        else if ($($target).length > 1) {
            $(this).parents($item_selector).closest($target).append($item);
        }
    });

    $(document).on('click','[data-toggle="remove-input"]',function(e){
        $item = $(this).data('duplicate');
        $(this).closest($item).remove();
    });
    /**
     * End Area of Elements Duplicator
     * Elements Duplicator By Mark Rady
     */

});
