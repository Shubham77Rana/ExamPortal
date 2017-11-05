<?php

session_start();
print_r($_SESSION['answer']);

$result=0;

for($i=0;$i<sizeof($_SESSION['answer']);$i++)
{
    if($_SESSION['answer'][$i]==3)
    {
        $result++;
    }
}

echo "Your result is ".$result;

unset($_SESSION['answer']);

?>