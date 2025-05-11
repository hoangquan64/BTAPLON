<?php

setcookie('user_name', null, time() - 3600, '/');

header("Location: http://baitaplon.test/btaplon");
die();