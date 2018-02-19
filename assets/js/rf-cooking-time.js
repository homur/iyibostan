/**
 * Created by FOX on 6/6/2016.
 */
jQuery(document).ready(function($) {
    "use strict";
    
    $('#recipe-min-time').datetimepicker({
        format: 'H:i',
        datepicker: false,
        step: 5,
        defaultTime: '00:00'
    });

    $('#recipe-min-time').on('change', function () {

        $('#recipe-max-time').datetimepicker('destroy');

        $('#recipe-max-time').datetimepicker({
            format: 'H:i',
            datepicker: false,
            step: 5,
            defaultTime: $('#recipe-min-time').val(),
        });
    });
})