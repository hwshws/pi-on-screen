<?php echo file_get_contents('http://www.zitate-online.de/zitatdestages.txt'); ?>
<script type="text/javascript">
    let author = document.querySelector('#zitatdestages > strong > a').innerHTML;
    document.getElementById('zitatdestageslink').remove();
    document.querySelector('#zitatdestages > strong').remove();
    let message = document.getElementById('zitatdestages').innerHTML;
    message = message.substring(2, message.length - 2);
    message = message.replace(/<br>/g, '');
    document.getElementById('zitat').innerHTML = '<p class="blockquote" style="font-size: 1.75rem !important;">' + message + '<br><span class="blockquote-footer">' + author + '</span></p>';
</script>
