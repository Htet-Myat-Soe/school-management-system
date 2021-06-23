<?php 
    include "../vendor/autoload.php";
    use Helpers\FAUTH;

    FAUTH::check();

?>

<h1>Index.php</h1>

<a href="../_actions/logout.php">Logout</a>