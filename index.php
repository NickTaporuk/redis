<?php
    define('RDS','php-redis-0.9/');///корень для библиотек
    require_once RDS.'lib/redis.php';
    require_once RDS.'lib/redis.pool.php';
    require_once RDS.'lib/redis.peer.php';
    require_once RDS.'lib/redis.peer.php';
    require_once RDS.'sample/channelme/config/app.php';
class note extends redis_peer
{}
//var_dump($redis_pool);exit;
//$list = [];
//redis_pool::add_servers($redis_pool);
//var_dump($redis->ping(0));
$note = new note();

# Create note, primary key is generated automatically
$id = $note->insert( array('title' => 'Hello', 'body' => 'world!') );
$id = 30;
//var_dump($id);
# Update note
//$id = $note->update( $id, array('body' => 'wwwwworld!') );
//var_dump($id);
# Get some note by primary key
//$note_data = $note->get_by_id( $id );

# Delete note
//$note->delete( $id );
//var_dump($note);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redis</title>
</head>
<body>
<div class="header"></div>
<div class="body">
    <?='its works';?>
</div>
<div class="footer"></div>
</body>
</html>