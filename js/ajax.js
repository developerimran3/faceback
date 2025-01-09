$(document).ready(function () {
  /**
   * New Data enty
   */
  $("#create_post").submit(function (e) {
    e.preventDefault();
    //get form data
    const form_data = new FormData(e.target);

    console.log(form_data);

    const { name, photo, content, post_photo, post_video } =
      Object.fromEntries(form_data);

    //form valadition
    if (!name || !photo || !content) {
      Swal.fire("Fields Are Requerd !");
    } else {
      $.ajax({
        url: "./ajax/ajax_work.php?action=create_data",
        method: "POST",
        data: form_data,
        contentType: false,
        processData: false,
        success: (data) => {
          console.log(data);
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Data Create Sucessful",
            showConfirmButton: false,
            timer: 2000,
          });
          e.target.reset();
          const close = setInterval(() => {
            $(".btn-close").click();
            clearInterval(close);
          }, 2500);
        },
      });
    }
  });
});
