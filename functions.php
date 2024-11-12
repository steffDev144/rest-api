<?php

function getUsers($connect) {
    $users = mysqli_query($connect, "SELECT * FROM `users`");

    $usersList = [];
    
    while($user = mysqli_fetch_assoc($users)) {
        $usersList[] = $user;
    }
    
    echo json_encode($usersList);
}

function getUser($connect, $id) {
    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
    if(mysqli_num_rows($user) < 1) {
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "User not found"
        ];
        echo json_encode($res);
    } else {
        $user = mysqli_fetch_assoc($user);
        echo json_encode($user);
    }
}

function addUser($connect, $data) {
    $name = $data['name'];
    $login = $data['login'];
    $password = $data['password'];

    mysqli_query($connect, "INSERT INTO `users`(`id`, `name`, `login`, `password`) VALUES (NULL,'$name','$login','$password')");

    http_response_code(201);

    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];

    echo json_encode($res);
}

function updateUser($connect, $id, $data) {
    $name = $data['name'];
    $password = $data['password'];

    mysqli_query($connect, "UPDATE `users` SET `name` = '$name', `password` = '$password' WHERE `users`.`id` = '$id';");

    http_response_code(200);

    $res = [
        "status" => true,
        "message" => "User is updated"
    ];

    echo json_encode($res);
}

function deleteUser($connect, $id) {
    mysqli_query($connect, "DELETE FROM `users` WHERE `id` = '$id'");

    http_response_code(200);

    $res = [
        "status" => true,
        "message" => "User is deleted"
    ];

    echo json_encode($res);
}