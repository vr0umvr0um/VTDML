<?php
/* * * * * * * * * * * * * * *
 * Returns all published posts that aren't featured
 * * * * * * * * * * * * * * */
function getPublishedPosts()
{
    // use global $connection object in function
    global $connection;
    $sql = "SELECT p.id AS p_id,p.user_id,p.title,p.slug AS p_slug,p.image,p.body,p.featured,p.published,p.created_at,u.id AS u_id,u.fname,u.lname,u.username,u.email,u.admin,u.password,pt.id AS pt_id,pt.post_id,pt.topic_id,t.id AS t_id,t.name,t.slug AS t_slug, i.image_text, i.image AS i_image
    FROM posts p
    LEFT JOIN users u ON p.user_id=u.id
    LEFT JOIN post_topic pt ON p.id=pt.post_id
    LEFT JOIN topics t ON pt.topic_id=t.id
    LEFT JOIN images i ON i.image_text=p.title
    WHERE p.published=true";

    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $connection->error);
    }
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
/* * * * * * * * * * * * * * *
 * Receives a post id and
 * Returns topic of the post
 * * * * * * * * * * * * * * */
function getPostTopic($post_id)
{
    global $connection;
    $sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
    $result = mysqli_query($connection, $sql);
    $topic = mysqli_fetch_assoc($result);
    return $topic;
}
/* * * * * * * * * * * * * * *
 * Returns a featured post
 * * * * * * * * * * * * * * */
function getFeaturedPosts()
{
    // use global $connection object in function
    global $connection;
    $sql = "SELECT p.id AS p_id,p.user_id,p.title,p.slug AS p_slug,p.image,p.body,p.featured,p.published,p.created_at,u.id AS u_id,u.fname,u.lname,u.username,u.email,u.admin,u.password,pt.id AS pt_id,pt.post_id,pt.topic_id,t.id AS t_id,t.name,t.slug AS t_slug, i.image_text, i.image AS i_image
    FROM posts p
    LEFT JOIN users u ON p.user_id=u.id
    LEFT JOIN post_topic pt ON p.id=pt.post_id
    LEFT JOIN topics t ON pt.topic_id=t.id
    LEFT JOIN images i ON i.image_text=p.title
    WHERE p.published=true AND p.featured=true
    LIMIT 1";
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $connection->error);
    }
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
/* * * * * * * * * * * * * * * *
 * Returns all posts under a topic
 * * * * * * * * * * * * * * * * */
function getPublishedPostsByTopic($topic_id)
{
    global $connection;
    $sql = "SELECT p.id AS p_id,p.user_id,p.title,p.slug,p.image,p.body,p.featured,p.published,p.created_at,u.id AS u_id,u.fname,u.lname,u.username,u.email,u.admin,u.password,pt.id AS pt_id,pt.post_id,pt.topic_id,t.id AS t_id,t.name,t.slug AS t_slug, i.image_text, i.image AS i_image
    FROM posts p
    LEFT JOIN users u ON p.user_id=u.id
    LEFT JOIN post_topic pt ON p.id=pt.post_id
    LEFT JOIN topics t ON pt.topic_id=t.id
    LEFT JOIN images i ON i.image_text=p.title
    WHERE p.id IN 
    (SELECT pt.post_id FROM post_topic pt 
    WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
    HAVING COUNT(1) = 1)";
    $result = mysqli_query($connection, $sql);
    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_posts = array();
    foreach ($posts as $post) {
        $post['topic'] = getPostTopic($post['p_id']);
        array_push($final_posts, $post);
    }
    return $final_posts;
}
/* * * * * * * * * * * * * * * *
 * Returns topic name by topic id
 * * * * * * * * * * * * * * * * */
function getTopicNameById($id)
{
    global $connection;
    $sql = "SELECT name FROM topics WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    $topic = mysqli_fetch_assoc($result);
    return $topic['name'];
}
/* * * * * * * * * * * * * * *
 * Returns a single post
 * * * * * * * * * * * * * * */
function getPost($slug)
{
    global $connection;
    // Get single post slug
    $post_slug = $_GET['post-slug'];
    $sql = "SELECT  p.body, p.id, p.user_id, p.title, p.slug, p.featured, p.published, p.created_at, i.id AS i_id, i.image, i.image_text,u.username, u.id
    FROM posts p
    LEFT JOIN images i ON i.image_text=p.title
    LEFT JOIN users u ON u.id=p.user_id
    WHERE slug='$slug' AND published=true";
    $result = mysqli_query($connection, $sql);

    // fetch query results as associative array.
    $post = mysqli_fetch_assoc($result);
    if ($post) {
        // get the topic to which this post belongs
        $post['topic'] = getPostTopic($post['id']);
    }
    return $post;
}
/* * * * * * * * * * * *
 *  Returns all topics
 * * * * * * * * * * * * */
function getAllTopics()
{
    global $connection;
    $sql = "SELECT * FROM topics ORDER BY name";
    $result = mysqli_query($connection, $sql);
    $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $topics;
}
/* * * * * * * * * * * * * * *
 * Returns all information about characters
 * * * * * * * * * * * * * * */
function getCharInfo()
{
    // use global $connection object in function
    global $connection;
    $sql = "SELECT c.age, c.birthday, c.namechar AS char_namechar, c.franchise,c.groups,c.typechar,c.gender,f.namefamiliar,f.typefamiliar,f.namechar AS fran_namechar,fr.namechar AS friends_namechar,fr.namefriend,i.image,i.image_text
    FROM characters c LEFT JOIN familiar f ON f.namechar=c.namechar
    LEFT JOIN friends fr ON fr.namechar=c.namechar
    LEFT JOIN images i ON i.image_text=c.namechar
    ORDER BY c.franchise";

    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $connection->error);
    }
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
/* * * * * * * * * * * * * * *
 * Returns all information about Entertainment
 * * * * * * * * * * * * * * */
function getEnterInfo()
{
    // use global $connection object in function
    global $connection;
    $sql = "SELECT e.author, e.date, e.duration, e.franchise, e.nameentertainmenent, e.nbpages, e.typeentertainement, i.image, i.image_text
    FROM entertainment e
    LEFT JOIN images i ON i.image_text=e.nameentertainmenent
    ORDER BY e.franchise";

    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $connection->error);
    }
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
// ================================= END BLOG FUNCTIONS =================================
/* * * * * * * * * * * * * * * *
 * Returns any error when creating a user
 * * * * * * * * * * * * * * * * */
function validateUser($user)
{
    $errors = array();

    //Validating name
    if (empty($user["fname"])) {
        array_push($errors, "First Name is required");
    }
    if (empty($user["lname"])) {
        array_push($errors, "Last Name is required");
    }

    //Name requirements
    if (!preg_match("/[A-Z]/i", $user["fname"])) {
        array_push($errors, "First name must contain at least one uppercaseletter");
    }
    if (!preg_match("/[A-Z]/i", $user["lname"])) {
        array_push($errors, "Last name must contain at least one uppercaseletter");
    }

    //Validating email
    if (!filter_var($user["email"], FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Valid email is required");
    }
    ;

    //Password requirements
    if (empty($user["password"])) {
        array_push($errors, "Password is required");
    }
    //8 characters min
    if (strlen($user["password"]) < 8) {
        array_push($errors, "Password must be at least 8 characters");
    }

    //1 letter min
    if (!preg_match("/[a-z]/i", $user["password"])) {
        array_push($errors, "Password must contain at least one letter");
    }

    //1 number min
    if (!preg_match("/[0-9]/", $user["password"])) {
        array_push($errors, "Password must contain at least one number");
    }

    //Passwords need to be the same
    if ($user["password"] !== $user["cpassword"]) {
        array_push($errors, "Passwords must match");
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        array_push($errors, "Email already exists");
    }
    return $errors;
}
/* * * * * * * * * * * * * * * *
 * Returns any error when trying to log in
 * * * * * * * * * * * * * * * * */
function validateLogin($user)
{
    $errors = array();

    if (empty($user["username"])) {
        array_push($errors, "Username is required");
    }
    if (empty($user["password"])) {
        array_push($errors, "Password is required");
    }

    return $errors;
}
// ================================= END VALIDE LOGIN/REGISTER FUNCTIONS =================================
$fname = '';
$lname = '';
$username = '';
$email = '';
$password = '';
$cpassword = '';
$tuser = 'users';

$errors = array();
function userLogin($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';

    if ($_SESSION['admin']) {
        header('location: ./admin/post-manage.php');
    } else {
        header('location: index.php');
    }

    exit();
}

if (isset($_POST['register'])) {

    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['register'], $_POST['cpassword']);
        $_POST['admin'] = 0;

        //Create a unique hash for password for security
        $_POST['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $user_id = create($tuser, $_POST);
        $user = selectOne($tuser, ['id' => $user_id]);

        //Log user in
        userLogin($user);

    } else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
    }
}

if (isset($_POST['login'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($tuser, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            //Log user in
            userLogin($user);

        } else {
            array_push($errors, 'Wrong credentials');
        }

    }

    $username = $_POST['username'];
    $password = $_POST['password'];

}
// ================================= END CONNECTION FUNCTIONS =================================
?>