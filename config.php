<?php
session_start();

$connection = new mysqli("localhost", "root", "root", "vtdml");

if ($connection->connect_errno) {
    die("Connection error: " . $connection->connect_errno);
}
// ================================= END CONNECTION TO DATABASE =================================

define('ROOT_PATH', realpath(dirname(__FILE__)));

// ================================= END DEFINE GLOBAL CONSTANTS=================================
/* * * * * * * * * * * * * * *
 * Returns formated results
 * * * * * * * * * * * * * * */
function showResults($value)
{
    echo "<pre>", print_r($value, true), "</pre";
    die();
}
/* * * * * * * * * * * * * * *
 * Returns the result of the executed query
 * * * * * * * * * * * * * * */
function executeQuery($sql, $data)
{
    //Prevent Fatal error: Call to a memeber function bind_param() on boolean
    global $connection;
    $stmt = $connection->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $connection->error);
    }

    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $result = $stmt->bind_param($types, ...$values);

    if (!$result) {
        die("Binding failed: " . $stmt->error);
    }

    $stmt->execute();

    return $stmt;
}
/* * * * * * * * * * * * * * *
 * Returns all the selected records of the database
 * * * * * * * * * * * * * * */
function selectAll($nameTable, $conditions = [])
{
    global $connection;

    $sql = "SELECT * FROM $nameTable";

    if (empty($conditions)) {
        //returns all records from $nameTable when $conditions is empty
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $connection->error);
        }
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        //returns records that match $conditions
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

}
/* * * * * * * * * * * * * * *
 * Returns a selected record of the database
 * * * * * * * * * * * * * * */
function selectOne($nameTable, $conditions)
{
    global $connection;

    $sql = "SELECT * FROM $nameTable";

    //returns records that match $conditions
    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    $sql = $sql . " LIMIT 1";

    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}
/* * * * * * * * * * * * * * *
 * Returns all the selected records of joined tables user, post_topic, topics
 * * * * * * * * * * * * * * */
function joined_post_id($conditions = [])
{
    global $connection;

    $sql =
        "SELECT p.id AS p_id,p.user_id,p.title,p.slug AS p_slug,p.image,p.body,p.featured,p.published,p.created_at,u.id AS u_id,u.fname,u.lname,u.username,u.email,u.admin,u.password,pt.id AS pt_id,pt.post_id,pt.topic_id,t.id AS t_id,t.name,t.slug AS t_slug, i.image_text, i.image AS i_image
        FROM posts p
        LEFT JOIN users u ON p.user_id=u.id
        LEFT JOIN post_topic pt ON p.id=pt.post_id
        LEFT JOIN topics t ON pt.topic_id=t.id
        LEFT JOIN images i ON i.image_text=p.title";

    if (empty($conditions)) {
        //returns all records from tables when $conditions is empty
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $connection->error);
        }
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        //returns records that match $conditions
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE p.$key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}
/* * * * * * * * * * * * * * *
 * Returns all the selected records of joined tables post_topic, posts and topics
 * * * * * * * * * * * * * * */
function joined_topic_id($conditions = [])
{
    global $connection;

    $sql =
        "SELECT pt.post_id,pt.topic_id,p.id AS id_posts,t.id AS id_topics, t.name
        FROM post_topic pt
        LEFT JOIN posts p ON pt.post_id=p.id
        LEFT JOIN topics t ON pt.topic_id=t.id";

    if (empty($conditions)) {
        //returns all records from tables when $conditions is empty
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $connection->error);
        }
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        //returns records that match $conditions
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE p.$key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}
/* * * * * * * * * * * * * * *
 * Returns all the selected records of joined tables post_topic and topics
 * * * * * * * * * * * * * * */
function joined_topic_post($conditions = [])
{
    //function that return the selected records of the database
    global $connection;

    $sql =
        "SELECT pt.id AS pt_id,pt.post_id,pt.topic_id,t.id AS t_id,t.name,t.slug AS t_slug
        FROM post_topic pt
        LEFT JOIN topics t ON pt.topic_id=t.id";

    if (empty($conditions)) {
        //returns all records from rables  when $conditions is empty
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $connection->error);
        }
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        //returns records that match $conditions
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE p.$key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}
/* * * * * * * * * * * * * * *
 * Returns the id of inserted data
 * * * * * * * * * * * * * * */
function create($nameTable, $data)
{
    global $connection;

    $sql = "INSERT INTO $nameTable SET ";
    echo $sql;
    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}
/* * * * * * * * * * * * * * *
 * Returns the id of inserted data into table posts
 * * * * * * * * * * * * * * */
function create_post(
    $post_user_id,
    $post_title,
    $post_slug,
    $post_image,
    $post_body,
    $post_feat,
    $post_pub
) {
    global $connection;

    $sql = "INSERT INTO posts (user_id, title, slug, image, body, published, featured, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, now())";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("issssii", $post_user_id, $post_title, $post_slug, $post_image, $post_body, $post_pub, $post_feat);
    $stmt->execute();
    $id = $stmt->insert_id;
    return $id;
}
/* * * * * * * * * * * * * * *
 * Returns the id of inserted data into post_topic
 * * * * * * * * * * * * * * */
function create_post_topic(
    $post_id,
    $post_topic_id
) {
    global $connection;

    $sql = "INSERT INTO post_topic (post_id,topic_id) VALUES(?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $post_id, $post_topic_id);
    $stmt->execute();
    $id = $stmt->insert_id;
    return $id;
}
/* * * * * * * * * * * * * * *
 * Returns the id of inserted data into topic
 * * * * * * * * * * * * * * */
function create_topic(
    $top_name,
    $top_slug
) {
    global $connection;

    $sql = "INSERT INTO topics (name, slug) VALUES (?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $top_name, $top_slug);
    $stmt->execute();
    $id = $stmt->insert_id;
    return $id;
}
/* * * * * * * * * * * * * * *
 * Returns the  affected row where an update occurs based of the id
 * * * * * * * * * * * * * * */
function update($nameTable, $id, $data)
{
    global $connection;

    $sql = "UPDATE $nameTable SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}
/* * * * * * * * * * * * * * *
 * Returns the id where an update occurs into posts
 * * * * * * * * * * * * * * */
function update_post(
    $post_id,
    $post_user_id,
    $post_title,
    $post_slug,
    $post_image,
    $post_body,
    $post_feat,
    $post_pub
) {
    global $connection;

    $sql = "UPDATE posts SET user_id=?, title=?, slug=?, image=?, body=?, published=?, featured=? WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("issssiii", $post_user_id, $post_title, $post_slug, $post_image, $post_body, $post_pub, $post_feat, $post_id);
    $stmt->execute();
    $id = $stmt->insert_id;
    return $id;
}
/* * * * * * * * * * * * * * *
 * Returns the id where an update occurs into post_topic
 * * * * * * * * * * * * * * */
function update_post_topic(
    $post_id,
    $post_topic_id
) {
    global $connection;

    $sql = "UPDATE post_topic SET topic_id = ? WHERE post_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $post_topic_id, $post_id);
    $stmt->execute();
    $id = $stmt->insert_id;
    return $id;
}
/* * * * * * * * * * * * * * *
 * Returns the id where an update occurs into topics
 * * * * * * * * * * * * * * */
function update_topic(
    $top_name,
    $top_slug,
    $top_id
) {
    global $connection;

    $sql = "UPDATE topics SET name=?, slug=? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssi", $top_name, $top_slug, $top_id);
    $stmt->execute();
    $id = $stmt->insert_id;
    return $id;
}
/* * * * * * * * * * * * * * *
 * Returns the affected rows where a deletion occurs based of the id
 * * * * * * * * * * * * * * */
function delet($nameTable, $id)
{
    global $connection;

    $sql = "DELETE FROM $nameTable WHERE id=?";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}
?>