<?php echo file_get_contents('http://www.zitate-online.de/zufallszitat.txt'); ?>
<script type="text/javascript">
    let div = document.getElementById('zufallszitat');
    div.children[0].children[0].outerHTML = div.children[0].children[0].innerText;
    document.getElementById('zufallszitatlink').remove();
</script>
