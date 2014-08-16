(function ($) {
    $(document).ready(function () {

        var $page_template = $('#page_template')
            , $metabox = $('#home'); // For example

        $page_template.change(function () {
            var currentSelectedValue = $(this).val();
            if (currentSelectedValue == 'page-home.php') {
                $('#cloud').hide();
                $('#retail').hide();
                $('#home').show();
            } else if (currentSelectedValue == 'page-cloud.php') {
                $('#home').hide();
                $('#retail').hide();
                $('#cloud').show();
            } else if (currentSelectedValue == 'page-retail.php') {
                $('#cloud').hide();
                $('#home').hide();
                $('#retail').show();
            } else {
                $('#home').hide();
                $('#cloud').hide();
                $('#retail').hide();
            }
        }).change();        
    });
})(jQuery);