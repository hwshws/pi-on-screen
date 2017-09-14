<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <script language="JavaScript" type="text/javascript">

        function imgRefresh() {
            if (document.images) {
                document.images['refreshSpot'].src = 'https://www.urspringschule.de/assets/img/logo.jpg';
            }
            setTimeout('imgRefresh()', 1 * 1000);

        }

    </script>
</head>
<body onload="imgRefresh()">
<img src="https://www.urspringschule.de/assets/img/logo.jpg" name="refreshSpot"></body>
</html>
<!-- forums.devshed.com/html-programming-1/auto-refresh-picture-12071.html -->
