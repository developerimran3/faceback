<?php
if (file_exists(__DIR__ . "/../autoload.php")) {
    require_once __DIR__ . "/../autoload.php";
}


if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case "create_data";
        $name      = $_POST['name'];
        $content   = $_POST['content'];

        //Auth User Photo uploed
        $photo = null;
        if (!empty($_FILES['photo']['name'])) {
            $photo = move([
                "tmp_name"  => $_FILES['photo']['tmp_name'],
                "name"      => $_FILES['photo']['name'],
            ], "../media/photo/");
        }

        //Post Photo uploed
        $post_photo = [];
        if (!empty($_FILES['post_photo']['name'][0])) {

            for ($i = 0; $i < count($_FILES['post_photo']['name']); $i++) {
                $post_photo_item = move([
                    "tmp_name"  => $_FILES['post_photo']['tmp_name'][$i],
                    "name"      => $_FILES['post_photo']['name'][$i],
                ], "../media/posts/");

                array_push($post_photo, $post_photo_item);
            }
        }

        //video uploed
        $post_video = null;
        if ($_FILES['post_video']['name']) {

            $post_video = move([
                "tmp_name"  => $_FILES['post_video']['tmp_name'],
                "name"      => $_FILES['post_video']['name'],
            ], "../media/video/");
        }
        store('post', [
            'name'         => $name,
            'photo'        => $photo,
            'content'      => $content,
            'post_photo'   => json_encode($post_photo),
            'post_video'   => $post_video,

        ]);
        break;
};
