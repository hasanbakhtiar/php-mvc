<!-- Hello World -->
<?php

foreach($data['user'] as $user){
    echo $user['name']." ".$user['surname'];
}