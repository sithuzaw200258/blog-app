<?php
require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$post_id = $_GET['post_id'];

if (pinPost($post_id)) {
    linkTo("index.php");
}
