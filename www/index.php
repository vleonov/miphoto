<?php

include dirname(__FILE__) . '/../init.php';

$oRouter = new Router();

$callback = $oRouter->proceed();
call_user_func($callback);

exit();

