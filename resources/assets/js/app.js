(function ($, errors) {

    $('[type="checkbox"]')
        .iCheck({checkboxClass: 'icheckbox_square-blue'})
        .on('ifChanged', function () {
            $(this).change();
        })
        .closest('label')
        .css('cursor', 'pointer');

    $('.autoexpand').autoExpand({animationTime: 0});

    $(":input").inputmask();

    for(i in errors) {

        if(!errors.hasOwnProperty(i)) continue;

        var $target = $('[data-check="' + i + '"]');

        if($target.length) {

            var $help = $('<i class="fa fa-fw fa-warning text-danger"></i>');

            $target.addClass('has-error');

            $target.prepend($help);

            $help.attr('title', errors[i].join(' ')).tooltip();

            $target.one('change', 'input, select, textarea', function() {

                $target.removeClass('has-error');

                $help.remove();

            });

        }

    }

})(jQuery, input_errors);