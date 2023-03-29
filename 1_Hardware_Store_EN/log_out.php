<?php
session_start();
unset($_SESSION);
session_destroy();
echo '<meta http-equiv="refresh" content="0; URL=index.php">';