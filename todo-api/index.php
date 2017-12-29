<?php

    include("connect.php");

    $method = $_SERVER["REQUEST_METHOD"];

    switch ($method) {
        case 'GET':

            $sql = "SELECT * FROM tasks";

            if ($_GET['task_id']) {
                $sql = $sql." WHERE id = ".$_GET['task_id'];
            }

            try {
                $sth = $conn->prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_KEY_PAIR);
                echo json_encode($result);
            } catch (Exception $e) {
                die("ERROR");
            }
            break;

        case 'POST':

            $task = $_POST['task_name'];
            $sql = "INSERT INTO tasks (action) VALUES ('".$task."')";

            try {
                $sth = $conn->prepare($sql);
                $sth->execute();
            } catch (Exception $e) {
                die("ERROR");
            }
            break;

        case 'PUT':

            parse_str(file_get_contents("php://input"),$post_params);

            $sql = "UPDATE tasks SET action = :task_name WHERE id = :task_id";

            try {
                $sth = $conn->prepare($sql);
                $sth->bindParam(':task_name', $post_params['task_name']);
                $sth->bindParam(':task_id', $post_params['id']);
                $sth->execute();
            } catch (Exception $e) {
                die("ERROR");
            }
            break;

        case 'DELETE':

            if ($_GET['task_id']) {
                $sql = "DELETE FROM tasks WHERE id = ".$_GET['task_id'];
            } else {
                $sql = "TRUNCATE TABLE tasks";
            }

            try {
                $sth = $conn->prepare($sql);
                $sth->execute();
            } catch (Execute $e) {
                die("ERROR");
            }
            break;

        default:
            header("HTTP/1.0 405 Method Not Allowed");
            break;
    }

?>
