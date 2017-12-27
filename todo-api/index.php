<?php

    include("connect.php");

    $method = $_SERVER["REQUEST_METHOD"];

    switch ($method) {
        case 'GET':

            if ($_GET['task_id']) {
                $sth = $conn->prepare("SELECT * FROM tasks WHERE id = ".$_GET['task_id']);
            } else {
                $sth = $conn->prepare("SELECT * FROM tasks");
            }

            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_KEY_PAIR);
            echo json_encode($result);
            break;

        case 'POST':

            $task = $_POST['task_name'];
            $sth = $conn->prepare("INSERT INTO tasks (action) VALUES ('".$task."')");
            $sth->execute();

            echo "success";
            break;

        case 'PUT':

            parse_str(file_get_contents("php://input"),$post_params);

            $sth = $conn->prepare("UPDATE tasks SET action = :task_name WHERE id = :task_id");
            $sth->bindParam(':task_name', $post_params['task_name']);
            $sth->bindParam(':task_id', $post_params['id']);
            $sth->execute();

            echo "success";
            break;

        case 'DELETE':

            if ($_GET['task_id']) {
                $sth = $conn->prepare("DELETE FROM tasks WHERE id = ".$_GET['task_id']);
            } else {
                $sth = $conn->prepare("TRUNCATE TABLE tasks");
            }
            $sth->execute();

            echo "success";
            break;

        default:
            header("HTTP/1.0 405 Method Not Allowed");
            break;
    }

?>
