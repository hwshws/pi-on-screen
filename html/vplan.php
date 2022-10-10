<?php
define('__ROOT__', dirname(__FILE__));
require(__ROOT__ . '/config.php');
$pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);

$message = $pdo->query('SELECT Nachricht from Informationen ORDER BY timestamp DESC LIMIT 1;')->fetch();
$author = $pdo->query('SELECT Name from Informationen ORDER BY timestamp DESC LIMIT 1;')->fetch();

$message = $message[0] ?? "";
$author = $author[0] ?? "";
?>
<p class="blockquote" style="font-size: 1.75rem !important;">
	<?php echo $message; ?>
	<br>
	<span class="blockquote-footer">
		<?php echo $author; ?>
	</span>
</p>

<?php $pdo = null; ?>
