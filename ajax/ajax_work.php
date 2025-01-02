<?php
if (file_exists(__DIR__ . "/../autoload.php")) {
    require_once __DIR__ . "/../autoload.php";
}


if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case "create_data";

        $auth_user_name      = $_POST['auth_user_name'];
        $post_content        = $_POST['post_content'];

        //Auth User Photo uploed
        $auth_user_photo = move([
            "tmp_name" => $_FILES['auth_user_photo']['tmp_name'],
            "name"      => $_FILES['auth_user_photo']['name'],
        ], "media/auth_user_photo/");
        //Post Photo uploed
        // $post_photos = [];
        // if (!empty($_FILES['post_photos']['name'][0])) {

        //     for ($i = 0; $i < count($_FILES['post_photos']['name']); $i++) {
        //         $post_photo_item = move([
        //             "tmp_name"  => $_FILES['post_photos']['tmp_name'][$i],
        //             "name"      => $_FILES['post_photos']['name'][$i],
        //         ], "media/posts/");

        //         array_push($post_photos, $post_photo_item);
        //     }
        // }

        // //video uploed
        // $post_videos = null;
        // if ($_FILES['post_video']['name']) {

        //     $post_videos = move([
        //         "tmp_name"  => $_FILES['post_videos']['tmp_name'],
        //         "name"      => $_FILES['post_videos']['name'],
        //     ], "media/videos/");
        // }



        store('post', [
            'auth_user_name'       => $auth_user_name,
            'auth_user_photo'      => $auth_user_photo ? $auth_user_photo : null,
            'post_content'         => $post_content,

        ]);

        break;

    case "received";
        $document_received  = $_POST['document_received'];
        $invoice_value      = $_POST['invoice_value'];
        $invoice_no         = $_POST['invoice_no'];
        $invoice_date       = $_POST['invoice_date'];
        $net_weight         = $_POST['net_weight'];

        update('enty', 24, [
            " document_received"    => $document_received,
            " invoice_value"        => $invoice_value,
            " invoice_no"           => $invoice_no,
            " invoice_date"         => $invoice_date,
            " net_weight"           => $net_weight,
        ]);
        break;

    case "register";
        $be_no      = $_POST['be_no'];
        $be_date    = $_POST['be_date'];
        $be_lane    = $_POST['be_lane'];

        update('enty', 24, [
            " be_no"        => $be_no,
            " be_date"      => $be_date,
            " be_lane"      => $be_lane,
        ]);
        break;

    case "assessment";
        $assessment_date    = $_POST['assessment_date'];
        $r_no               = $_POST['r_no'];
        $x_no               = $_POST['x_no'];
        $scann_document     = $_POST['scann_document'];

        update('enty', 24, [
            " assessment_date"     => $assessment_date,
            " r_no"                => $r_no,
            " x_no"                => $x_no,
            " scann_document"      => $scann_document,
        ]);
        break;

    case "delivery";
        echo "hi";
        break;
};
