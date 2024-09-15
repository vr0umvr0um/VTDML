<?php
require_once('../includes/public_functions.php');

$errors = array();

/* ================================= TOPICS ================================= */
$ttop = 'topics';
$topics = selectAll($ttop);
$top_id = '';
$top_name = '';
$top_slug = '';

$topic_posts = joined_topic_post();

//VALIDATE TOPICS
function validateTop($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, "Name is required");
    }

    $existingTop = selectOne('topics', ['name' => $topic['name']]);
    if ($existingTop) {
        array_push($errors, "Name already exists");
    }

    return $errors;
}
//CREATE
if (isset($_POST['add-topic'])) {

    $errors = validateTop($_POST);
    if (count($errors) === 0) {
        unset($_POST['add-topic']);

        $top_name = $_POST['name'];
        $top_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $top_name)));

        $topic_id = create_topic($top_name, $top_slug);

        $_SESSION['message'] = 'Topic successfully created';

        header('location: ./topic-manage.php');
        exit();
    }
}

//UPDATE
if (isset($_GET['top_up_id'])) {
    $id = $_GET['top_up_id'];

    $topic = selectOne($ttop, ['id' => $id]);

    $top_id = $topic['id'];
    $top_name = $topic['name'];
    $top_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $top_name)));
}

if (isset($_POST['edit-topic'])) {
    $id = $_POST['id'];

    $top_name = $_POST['name'];
    $top_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $top_name)));
    unset($_POST['edit-topic'], $_POST['id']);

    $topic_id = update_topic($top_name, $top_slug, $id);

    $_SESSION['message'] = 'Topic updated successfully';

    header('location: ./topic-manage.php');

    exit();
}

//DELETE
if (isset($_GET['top_del_id'])) {
    $id = $_GET['top_del_id'];

    $count = delet($ttop, $id);

    $_SESSION['message'] = 'Topic deleted successfully';

    header('location: ./topic-manage.php');

    exit();
}

/* ================================= POSTS ================================= */
$tpost = 'posts';
$posts = selectAll($tpost);
$posts_users = joined_post_id();
$posts_topic = joined_topic_id();

$post_topic_id = '';

$post_id = '';
$post_user_id = '';
$post_title = '';
$post_slug = '';
$post_image = '';
$post_body = '';
$post_feat = '';
$post_pub = '';

$post_top = '';
$pt_t_id = '';

$tpt = 'post_topic';

//VALIDATE POST
function validatePost($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, "Title is required");
    }

    if (empty($post['body'])) {
        array_push($errors, "Body is required");
    }

    /*if (empty($post['topic_id'])) {
    array_push($errors, "Post topic is required");
    }*/

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        array_push($errors, "Post already exists");
    }

    return $errors;
}
//CREATE
if (isset($_POST['add-post'])) {
    $errors = validatePost($_POST);

    if (count($errors) === 0) {

        unset($_POST['add-post']);

        $post_user_id = $_POST['user_id'];
        $post_title = $_POST['title'];
        $post_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post_title)));
        $post_image = $_POST['image'];
        $post_body = $_POST['body'];
        $post_feat = $_POST['featured'];
        $post_pub = $_POST['published'];
        $post_id = create_post(
            $post_user_id,
            $post_title,
            $post_slug,
            $post_image,
            $post_body,
            $post_feat,
            $post_pub
        );

        $post_topic_id = create_post_topic($post_id, $_POST['topic_id']);

        $_SESSION['message'] = 'Post successfully created';
        header('location: ./post-manage.php');
        exit;
    }
}

//UPDATE
if (isset($_GET['post_up_id'])) {
    $id = $_GET['post_up_id'];

    $post = selectOne($tpost, ['id' => $id]);
    $post_id = $post['id'];
    $post_title = $post['title'];
    $post_body = $post['body'];
    $post_feat = $post['featured'];
    $post_pub = $post['published'];

    $pt = selectOne($tpt, ['post_id' => $id]);
    $pt_t_id = $pt['topic_id'];
    $topic = selectOne('topics', ['id' => $pt_t_id]);
    $post_top = $topic['name'];
}

if (isset($_POST['edit-post'])) {
    $id = $_POST['id'];

    $post_user_id = $_SESSION['id'];
    $post_title = $_POST['title'];
    $post_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post_title)));
    $post_image = $_POST['image'];
    $post_body = $_POST['body'];
    $post_feat = $_POST['featured'];
    $post_pub = $_POST['published'];
    $post_id = update_post(
        $id,
        $post_user_id,
        $post_title,
        $post_slug,
        $post_image,
        $post_body,
        $post_feat,
        $post_pub
    );

    $post_topic_id = update_post_topic($_POST['id'], $_POST['topic_id']);

    $_SESSION['message'] = 'Post updated successfully';

    header('location: ./post-manage.php');

    exit();


}
//DELETE
if (isset($_GET['post_del_id'])) {
    $id = $_GET['post_del_id'];

    $count = delet($tpost, $id);

    $_SESSION['message'] = 'Post deleted successfully';

    header('location: ./post-manage.php');

    exit();
}

/* ================================= USERS ================================= */
$tuser = 'users';
$users = selectAll($tuser);
$user_id = '';
$user_admin = '';
$user_fname = '';
$user_lname = '';
$user_username = '';
$user_email = '';
$user_pass = '';

//CREATE
if (isset($_POST['add-user'])) {

    unset($_POST['add-user']);

    $errors = validateUser($_POST);

    if (count($errors) === 0) {

        unset($_POST['cpassword']);

        //Create a unique hash for password for security
        $_POST['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $user_id = create($tuser, $_POST);

        $_SESSION['message'] = 'User successfully created';

        header('location: ./user-manage.php');

        exit();
    }

}

//UPDATE
if (isset($_GET['user_up_id'])) {
    $id = $_GET['user_up_id'];

    $user = selectOne($tuser, ['id' => $id]);

    $user_id = $user['id'];
    $user_admin = $user['admin'];
    $user_fname = $user['fname'];
    $user_lname = $user['lname'];
    $user_username = $user['username'];
    $user_email = $user['email'];
    $user_pass = $user['password'];

}

if (isset($_POST['edit-user'])) {
    $id = $_POST['id'];

    unset($_POST['edit-user'], $_POST['id']);

    $user_id = update($tuser, $id, $_POST);

    $_SESSION['message'] = 'User updated successfully';

    header('location: ./user-manage.php');

    exit();

}
//DELETE
if (isset($_GET['user_del_id'])) {
    $id = $_GET['user_del_id'];

    $count = delet($tuser, $id);

    $_SESSION['message'] = 'User deleted successfully';

    header('location: ./user-manage.php');

    exit();
}
?>