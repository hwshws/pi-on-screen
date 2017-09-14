<script type="text/javascript">

    (function ($) {
        $(document).ready(function () {
            $.ajaxSetup(
                {
                    cache: false,
                    beforeSend: function () {
                        $('#content').hide();
                        $('#loading').show();
                    },
                    complete: function () {
                        $('#loading').hide();
                        $('#content').show();
                    },
                    success: function () {
                        $('#loading').hide();
                        $('#content').show();
                    }
                });
            var $container = $("#content");
            $container.load("fahrplan.html");
            var refreshId = setInterval(function () {
                $container.load('fahrplan.html');
            }, 9000);
        });
    })(jQuery);
</script>
<!--$("#mydiv").load(location.href + " #mydiv");-->
