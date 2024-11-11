<?php

include_once '../composant/bddConn.inc.php';

$res = $conn->query("select * from Entrainements");
    while ($row = $res->fetch_assoc()) {