<?php
$user = $_GET["username"]
$domain = $_GET["domain"]
@exec("sudo bash backup.sh $user $domain");
$filePath="/home/$user/backups/$domain.tar.gz";
header('Content-Length: ' . filesize($filePath));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
readfile($filePath);
?>
<html>
</html>
