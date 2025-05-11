<?php

setcookie('user_name', null, time() - 3600, '/');

header("Location: http://127.0.0.1/DABTAP");
die();