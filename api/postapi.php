<?php
header('Access-Control-Allow-Origin = *');
header('Content-type: application/json');
require ('../config/Database.php');
require ('../modules/Post.php');

$database = new Database();

$db = $database->connect();

$getposts = new Post($db);

$res = $getposts->getposts();

$num = $res->rowCount();

if ($num > 0)
{
    $postarr = array();

    $postarr['data'] = array();

    while ($row = $res->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);

        $post = array(
            'id' => @$id,
            'title'=> @$title,
            'body'=> html_entity_decode(@$body),
            'author'=> @$author,
            'created_at'=> @$created_at,
            'category_name'=> @$category_name
        );

        array_push($postarr['data'], $post);

        echo json_encode($postarr);
    }
}
else
{
    $err = array('msg'=>'No posts found');

    echo json_encode($err);
}

