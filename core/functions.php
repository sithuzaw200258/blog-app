<?php

//=============  Common Functions  =============

function user($id)
{
    $sql = "SELECT * FROM users WHERE id='$id'";
    return fetch($sql);
}

function alert($data, $color)
{
    return "<p class='alert alert-$color'>$data</p>";
}

function runQuery($sql)
{
    $conn = conn();
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        //alert('Database Error','danger');
        die("Query Fail " . mysqli_error($conn));
    }
}

//=============  Text to short  =============
function shortText($text, $length = 30)
{
    if ($length <= 30) {
        return substr($text, 0, $length);
    } else {
        return substr($text, 0, $length) . "...";
    }
}

//=============  Text Filter  =============
function textFilter($text)
{
    $text = trim($text);
    $text = htmlentities($text, ENT_QUOTES);
    $text = stripslashes($text);
    return $text;
}


//=============  Count Something  =============

function countPosts($table, $condition = 1)
{
    if ($_SESSION['user']['role'] == 2) {

        //=============  For User  =============
        $current_user_id = $_SESSION['user']['id'];
        // $sql = "SELECT * FROM posts WHERE user_id='$current_user_id'";
        $sql = "SELECT COUNT(id) FROM $table WHERE user_id = $current_user_id";
        $total = fetch($sql);
        return $total['COUNT(id)'];
    } else {

        //=============  For Admin and Editor  =============
        $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
        $total = fetch($sql);
        return $total['COUNT(id)'];
    }
}

function countTotal($table, $condition = 1)
{
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $total = fetch($sql);
    return $total['COUNT(id)'];
}

//=============  Page Links  =============
function redirect($location)
{
    header("location:$location");
}

function linkTo($location)
{
    echo "<script>location.href='$location'</script>";
}


//=============  Get Data from Database  =============
function fetch($sql)
{
    $query = mysqli_query(conn(), $sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql)
{
    $query = mysqli_query(conn(), $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($rows, $row);
    }
    return $rows;
}

//=============  Time Format  =============
function showTime($timestamp, $format = "d-m-Y")
{
    return date($format, strtotime($timestamp));
}


//=============  Start User Authentication  =============

//=============  Register  =============
function register()
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $secure_password = password_hash($password, PASSWORD_DEFAULT);

    if ($password !== $cpassword) {
        return alert("Password doesn't match !!!", 'danger');
    } else {
        $sql = "INSERT INTO users (name,email,password) VALUES ('$username','$email','$secure_password')";
        if (runQuery($sql)) {
            // redirect("dashboard.php");
            return alert('You are registered successfully', 'success');
            // return alert('Password are created successfully', 'success');
        }
    }
}


//=============  Login  =============

function login()
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query(conn(), $sql);
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        //=============  Login or Email Fail  =============
        return alert("Email or Password doesn't match !!!", 'danger');
    } else {

        //=============  Login Success  =============

        if (!password_verify($password, $row['password'])) {

            //=============  Login Password Fail  =============
            return alert("Email or Password doesn't match !!!", 'danger');
        } else {

            //=============  Login Password Success  =============
            session_start();
            $_SESSION['user'] = $row;
            redirect("dashboard.php");
            //return alert("User is correct",'success');

        }
    }
}


//=============  End User Authentication  =============



//=============  Start Users  =============
//=============  =============  =============


//=============  Show User  =============
function showUser($id)
{
    $sql = "SELECT * FROM users WHERE id='$id'";
    return fetch($sql);
}

//=============  Show All User  =============
function showAllUser()
{
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}


//=============  Delete User  =============
function userDelete($id)
{
    $sql = "DELETE FROM users where id='$id'";
    return runQuery($sql);
}

//=============  Update User  =============
function userUpdate()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    // die(var_dump($role));
    
    $sql = "UPDATE users SET name='$name', email='$email', role='$role' where id='$id'";
    return runQuery($sql);
}


//=============  End Users  =============
//=============  =============  =============



//=============  Start Category  =============
//=============  =============  =============

//=============  Create Category  =============
function categoryadd()
{
    $title = textFilter(strip_tags($_POST['title']));
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO categories (title,user_id) VALUES ('$title','$user_id')";
    if (runQuery($sql)) {
        linkTo("category_add.php");
    }
}


//=============  Show Category  =============
function showCategory($id)
{
    $sql = "SELECT * FROM categories WHERE id='$id'";
    return fetch($sql);
}

//=============  Show All Category  =============
function showAllCategory()
{
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

//=============  Delete Category  =============
function categoryDelete($id)
{
    $sql = "DELETE FROM categories where id='$id'";
    return runQuery($sql);
}

//=============  Update Category  =============
function categoryUpdate()
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $sql = "UPDATE categories SET title='$title' where id='$id'";
    return runQuery($sql);
}

function isCategory($id) {
    if (showCategory($id)) {
        return $id;
    }else{
        die("Category is invalid");
    }
}

//=============  End Category  =============
//=============  =============  =============



//=============  Start Post  =============
//=============  =============  =============


//=============  Create Post  =============
function postAdd()
{
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = isCategory( $_POST['category_id']);
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO posts (title,description,category_id,user_id) VALUES ('$title','$description','$category_id','$user_id')";
    if (runQuery($sql)) {
        //linkTo("post_add.php");
        return alert('Your post is created successfully', 'success');
    }
}

//=============  Show Category  =============
function showPost($id)
{
    $sql = "SELECT * FROM posts WHERE id='$id'";
    return fetch($sql);
}

//=============  Show All Post  =============
function showAllPost()
{

    if ($_SESSION['user']['role'] == 2) {

        //=============  For User  =============
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id='$current_user_id'";
    } else {

        //=============  For Admin and Editor  =============
        $sql = "SELECT * FROM posts";
    }

    return fetchAll($sql);
}


//=============  Delete Category  =============
function postDelete($id)
{
    $sql = "DELETE FROM posts where id='$id'";
    return runQuery($sql);
}


//=============  Update Category  =============
function postUpdate()
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $sql = "UPDATE posts SET title='$title', description='$description', category_id='$category_id' where id='$id'";
    return runQuery($sql);
}

//=============  End Post  =============
//=============  =============  =============



//=============  Start Front Panel  =============
//=============  =============  =============

//=============  Show All Category  =============
function showAllCategoryFrontPanel()
{
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

//=============  Show All Post FrontPanel =============
function showAllPostFrontPanel($order_col = "id", $order_type = "DESC")
{
    $sql = "SELECT * FROM posts ORDER BY $order_col $order_type";
    return fetchAll($sql);
}

//=============  Show All Post By Category  =============
function showAllPostByCat($category_id, $limit = "9999", $post_id = 0)
{
    $sql = "SELECT * FROM posts WHERE category_id = $category_id AND id != $post_id  ORDER BY id DESC LIMIT $limit";
    return fetchAll($sql);
}

//=============  Show Post By Searched Keyword  =============
function showPostBySearch($keyword)
{
    $sql = "SELECT * FROM posts WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%' ORDER BY id DESC";
    return fetchAll($sql);
}

//=============  Show Post By Searched Date  =============
function showPostByDate($start_date, $end_date)
{
    $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC";
    return fetchAll($sql);
}


//=============  Pin Category  =============
function pinCategory($category_id)
{
    $sql = "UPDATE categories SET ordering ='0'";
    mysqli_query(conn(), $sql);

    $sql = "UPDATE categories SET ordering ='1' WHERE id='$category_id'";
    return runQuery($sql);
}

//=============  Unpin Category  =============
function unpinCategory()
{
    $sql = "UPDATE categories SET ordering ='0'";
    return runQuery($sql);
}

//=============  Pin Post  =============
function pinPost($post_id)
{
    $sql = "UPDATE posts SET ordering ='0'";
    mysqli_query(conn(), $sql);

    $sql = "UPDATE posts SET ordering ='1' WHERE id='$post_id'";
    return runQuery($sql);
}

//=============  Unpin Post  =============
function unpinPost()
{
    $sql = "UPDATE posts SET ordering ='0'";
    return runQuery($sql);
}

//=============  End Front Panel  =============
//=============  =============  =============


//=============  Start Viewer  =============
//=============  =============  =============


//=============  Record Viewers  =============
function recordViewer($user_id, $post_id, $device)
{
    $sql = "INSERT INTO viewers (user_id,post_id,device) VALUES ('$user_id','$post_id','$device')";
    return runQuery($sql);
}

//=============  Record Viewers By Post  =============
function countViewerByPost($post_id)
{
    $sql = "SELECT * FROM viewers WHERE post_id =$post_id";
    return fetchAll($sql);
}

//=============  Record Viewers By User  =============
function countViewerByUser($user_id)
{
    $sql = "SELECT * FROM viewers WHERE user_id =$user_id";
    return fetchAll($sql);
}

//=============  End Viewer  =============
//=============  =============  =============


//=============  Start Ads  =============
//=============  =============  =============

//=============  Show All Ads  =============
function showAllAds()
{
    $today = date('Y-m-d');
    $sql = "SELECT * FROM ads WHERE start_date <= '$today' AND end_date > '$today'";
    return fetchAll($sql);
}

//=============  End Ads  =============
//=============  =============  =============


//=============  Start Payment  =============
//=============  =============  =============

//=============  Transfer Money  =============
function transferMoney()
{
    $sender_id = $_SESSION['user']['id'];
    $receiver_id = $_POST['receiver'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    $sender = user($sender_id);
    $receiver = user($receiver_id);

    if ($sender['money'] >= $amount) {
        $new_balance = $sender['money'] - $amount;
        $sql = "UPDATE users SET money='$new_balance' WHERE id= $sender_id";
        mysqli_query(conn(), $sql);

        $income = $receiver['money'] + $amount;
        $sql = "UPDATE users SET money='$income' WHERE id= $receiver_id";
        mysqli_query(conn(), $sql);

        $sql = "INSERT INTO transactions (sender,receiver,amount,description) VALUES ('$sender_id','$receiver_id','$amount','$description')";

        if (runQuery($sql)) {
            return alert('You are transferred successfully', 'success');
        }
    }
}

//=============  Show Transactions  =============
function showAllTransaction()
{
    $sql = "SELECT * FROM transactions";
    return fetchAll($sql);
}

//=============  End Payment  =============
//=============  =============  =============


//=============  Start Dashboard  =============
//=============  =============  =============

//=============  Recent Post For Dashboard =============
function recentPosts($order = "DESC", $limit = 5)
{

    if ($_SESSION['user']['role'] == 2) {

        //=============  For User  =============
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id= '$current_user_id' ORDER BY id $order LIMIT $limit";
    } else {

        //=============  For Admin and Editor  =============
        $sql = "SELECT * FROM posts ORDER BY id $order LIMIT $limit";
    }

    return fetchAll($sql);
}

//=============  End Dashboard  =============
//=============  =============  =============