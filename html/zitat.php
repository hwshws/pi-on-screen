<?php echo file_get_contents('http://www.zitate-online.de/zitatdestages.txt'); ?>
<script type="text/javascript">
    let div = document.querySelector('#zitatdestages > strong > a');
    try {
        div.outerHTML = div.innerText;
    } catch (ex) {}
    document.getElementById('zitatdestageslink').remove();
</script>
