
(function ($) {
    $(document).ready(function () {

        // Close Button JQuery Dialog Close
        $("#btnDone").on('click', function () {
            // Remove is mandatory as Dialog Close WILL not dispose thr IFrame and the Video still runs in the background.
            $('#vimeo').remove();
            $('#dialog').dialog('close');
        });

        function createIFrame() {
            $('#dialog').append('<iframe id="vimeo"></iframe>');
            $('#vimeo').attr("src", "http://player.vimeo.com/video/12505092?autoplay=true");
            $('#vimeo').attr("width", "100%");
            $('#vimeo').attr("height", "90%");
            $('#vimeo').attr("frameborder", "0");
            $('#vimeo').attr("webkitallowfullscreen", true);
            $('#vimeo').attr("mozallowfullscreen", true);
            $('#vimeo').attr("allowfullscreen", true);
        }
        $(document).click(function (e) {
            var element = $(".chember-1:visible");
            var target = e.target;
            if (target && (!target.className || (target.className && target.className.toLowerCase() !== "menyitem" &&
                target.className.toLowerCase() !== "chember-1"))) {
                (element.length > 0) ? (element[0].style.display = "none") : "";
                $(".desktop-menu .menyItem").each(function (index, elementItem) {
                    $(elementItem).removeAttr('style');
                });
            }
        });

        $(".menyItem").click(function (e) {
            var element = $(".chember-1:visible");
            if (element.length > 0) {
                element[0].style.display = "none";
                element.parent().children()[0].style["background"] = "#000000";
            }
            var parent = $(e.target).parent();
            var childElementArr = $(parent).children();
            if (childElementArr.length === 2) {
                childElementArr[0].style.background = "#333333";
                childElementArr[1].style.display = "block";
            }
        });

        /* Template Part:: for opaque DIV */

        $("#open_close").mouseenter(function () {
            $("#open_close .open-container").toggle();
        });

        $("#open_close").mouseleave(function () {
            $("#open_close .open-container").toggle();
        });

        // Opaque Div on click
        $("#open_close .close-container").click(function () {
            var url = 'http://www.google.com';
            window.location.href = url;
        });

        $('.testimonial').on('click', function (e) {

            $("#dialog").dialog({
                autoOpen: true,
                modal: true,
                resizable: false,
                position: { my: "50%", at: "50%" },
                maxWidth: 600,
                maxHeight: 500,
                width: 600,
                height: 500,
                closeOnEscape: true
            });

            // Hide the Jquery Dialog Title Bar.
            $(".ui-dialog-titlebar").hide();

            // Open Dialog
            createIFrame();
            $("#dialog").dialog("open");
            $(".ui-dialog-title").hide();
            $('.ui-widget-overlay').css();

            return false;
        });


        $("#open_close .case_study").click(function () {
            alert('Case Study');
            return false;
        });

    });
})(jQuery);

