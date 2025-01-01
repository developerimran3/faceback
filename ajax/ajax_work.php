<?php
if (file_exists(__DIR__ . "/../autoload.php")) {
    require_once __DIR__ . "/../autoload.php";
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case "create_post";
        $auth_user_name     = $_POST['auth_user_name'];
        $post_content       = $_POST['post_content'];

        store('post', [
            'auth_user_name'    => $auth_user_name,
            'post_content'      => $post_content,
            // 'auth_user_photo'   => $auth_user_photo,
            // 'post_video'        => $post_video,
            // 'post_photos'       => $post_photos
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
