$(document).ready(function () {
  $("#post_submit").submit(function (e) {
    e.preventDefault();
    const form_data = new FormData(e.target);

    const {
      auth_user_name,
      auth_user_photo,
      post_content,
      post_photos,
      post_video,
    } = Object.fromEntries(form_data);

    //  form valadition

    if (!auth_user_name || !post_content) {
      Swal.fire("All fields are requeard!");
    } else {
      $.ajax({
        url: "./ajax/ajax_work.php?action=create_post",
        success: (data) => {},
      });
    }
  });
});
