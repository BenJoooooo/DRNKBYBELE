// Deletes Users and Admin
$(document).ready(function() {

    $(document).on('click', '.delete_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {

            if (willDelete) {

              $.ajax({
                method: "POST",
                url: "../functions/codes.php",
                data: {
                    'category_id_user':id,
                    'category_id': id,
                    'delete_btn': true
                },
                success: function(response) {
                    if(response == 200) {
                        swal("Success!", "User deleted Successfully", "success");
                        $("#user_table").load(location.href + " #user_table");
                    } else if(response == 500) {
                        swal("Error!", "Something went wrong", "error");
                    }
                }
              });

            }
          });
    });

});

// Deletes Photos
$(document).ready(function() {

    $(document).on('click', '.deletephoto_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {

            if (willDelete) {

              $.ajax({
                method: "POST",
                url: "../functions/codes.php",
                data: {
                    'image_id': id,
                    'deletephoto_btn': true
                },
                success: function(response) {
                    if(response == 200) {
                        swal("Success!", "Cover Photo deleted Successfully", "success");
                        $("#coverphotos_table").load(location.href + " #coverphotos_table");
                    } else if(response == 500) {
                        swal("Error!", "Something went wrong", "error");
                    }
                }
              });

            }
          });
    });

});

// Deletes Products
$(document).ready(function() {

    $(document).on('click', '.delete_product_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {

            if (willDelete) {

              $.ajax({
                method: "POST",
                url: "../functions/codes.php",
                data: {
                    'product_id': id,
                    'delete_product_btn': true
                },
                success: function(response) {
                    if(response == 200) {
                        swal("Success!", "Product deleted Successfully", "success");
                        $("#products_table").load(location.href + " #products_table");
                    } else if(response == 500) {
                        swal("Error!", "Something went wrong", "error");
                    }
                }
              });

            }
          });
    });

});

// Deletes Categoris
$(document).ready(function() {

    $(document).on('click', '.delete_category_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {

            if (willDelete) {

              $.ajax({
                method: "POST",
                url: "../functions/codes.php",
                data: {
                    'category_id': id,
                    'delete_category_btn': true
                },
                success: function(response) {
                    if(response == 200) {
                        swal("Success!", "Category deleted Successfully", "success");
                        $("#category_table").load(location.href + " #category_table");
                    } else if(response == 500) {
                        swal("Error!", "Something went wrong", "error");
                    }
                }
              });

            }
          });
    });

});

// Delete about blogs
$(document).ready(function() {

  $(document).on('click', '.delete_blogs_about', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {

            $.ajax({
              method: "POST",
              url: "../functions/codes.php",
              data: {
                  'about_blog_id': id,
                  'delete_blogs_about': true
              },
              success: function(response) {
                  if(response == 200) {
                      swal("Success!", "Blog Deleted Successfully", "success");
                      $("#coverphotos_table").load(location.href + " #coverphotos_table");
                  } else if(response == 500) {
                      swal("Error!", "Something went wrong", "error");
                  }
              }
            });

          }
        });
  });

});