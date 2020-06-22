<?php


session_destroy();

print_r($app->auth()->userLoginToken('5037f731751c753fa52f6afdc1d94664d7a8c085', 'ff3e48e9173c004c1239413c0031e76f7b3f4ace'));
echo $_SESSION['userID'];









