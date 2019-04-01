<?php
session_start();
session_destroy();

echo <<<_END
<meta http-equiv='refresh' content='0;url=index.php'>
_END;

?>