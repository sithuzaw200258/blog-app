<?php

//=============  DB Connection  =============
function conn()
{
    return mysqli_connect("localhost", "root", "", "blog_app");
}

//=============  Project URL  =============
$url = "http://{$_SERVER['HTTP_HOST']}/blog-app";


//=============  Perission Role  =============
$roles = ["Admin", "Editor", "Users"];

//=============  Timezone Setup  =============
date_default_timezone_set('Asia/Yangon');
