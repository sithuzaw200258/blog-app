<?php
require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

if (unpinCategory()) {
    linkTo("category_add.php");
}
