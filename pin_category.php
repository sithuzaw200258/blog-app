<?php
require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$category_id = $_GET['category_id'];

if (pinCategory($category_id)) {
    linkTo("category_add.php");
}
