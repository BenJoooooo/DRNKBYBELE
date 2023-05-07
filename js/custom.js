// -----------------------------------------------
// -------------------USER PAGE-------------------
// -----------------------------------------------

// Deletes Users and Admin Permanently
$(document).ready(function() {

  $(document).on('click', '.delete_user_permanent_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "User will be deleted permanently",
          icon: "error",
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
                  'delete_user_permanent_btn': true
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

// Recovers User and Admin from archives
$(document).ready(function() {

  $(document).on('click', '.recover_user_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "You will recover this data",
          icon: "info",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {

            $.ajax({
              method: "POST",
              url: "../functions/codes.php",
              data: {
                  'user_id': id,
                  'recover_user_btn': true
              },
              success: function(response) {
                  if(response == 200) {
                      swal("Success!", "User recovered successfully", "success");
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

// Deletes Users and Admin
$(document).ready(function() {

    $(document).on('click', '.delete_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Confirmation",
            text: "User will be removed",
            icon: "error",
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

// -----------------------------------------------
// -------------------COVER PAGE------------------
// -----------------------------------------------

// Deletes Photos
$(document).ready(function() {

    $(document).on('click', '.deletephoto_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Confirmation",
            text: "Cover photo will be removed",
            icon: "info",
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

// Deletes Photos Permanently
$(document).ready(function() {

  $(document).on('click', '.delete_permanent_photo_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Cover Photo will be deleted permanently",
          icon: "error",
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
                  'delete_permanent_photo_btn': true
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

// Recovers Photos Permanently
$(document).ready(function() {

  $(document).on('click', '.recover_photo_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Cover Photo will be recovered",
          icon: "info",
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
                  'recover_photo_btn': true
              },
              success: function(response) {
                  if(response == 200) {
                      swal("Success!", "Cover Photo recovered Successfully", "success");
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

// -----------------------------------------------
// -----------------PRODUCTS PAGE-----------------
// -----------------------------------------------

// Deletes Products
$(document).ready(function() {

    $(document).on('click', '.delete_product_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Confirmation",
            text: "Product will be removed",
            icon: "info",
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

// Deletes Products Permanent
$(document).ready(function() {

  $(document).on('click', '.delete_product_permanent_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Product will be deleted permanently",
          icon: "error",
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
                  'delete_product_permanent_btn': true
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

// Recover Products
$(document).ready(function() {

  $(document).on('click', '.recover_product_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Product will be recovered",
          icon: "info",
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
                  'recover_product_btn': true
              },
              success: function(response) {
                  if(response == 200) {
                      swal("Success!", "Product recovered successfully", "success");
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

// -----------------------------------------------
// ----------------CATEGORIES PAGE----------------
// -----------------------------------------------


// Deletes Categories
$(document).ready(function() {

    $(document).on('click', '.delete_category_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Confirmation",
            text: "Category will be removed",
            icon: "info",
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

// Recover Categories
$(document).ready(function() {

  $(document).on('click', '.recover_category_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Category will be recovered",
          icon: "info",
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
                  'recover_category_btn': true
              },
              success: function(response) {
                  if(response == 200) {
                      swal("Success!", "Category recovered Successfully", "success");
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

// Delete Categories Permanently
$(document).ready(function() {

  $(document).on('click', '.delete_category_permanent_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Category will be deleted permanently",
          icon: "error",
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
                  'delete_category_permanently_btn': true
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

// -----------------------------------------------
// -----------------ABOUT BLOG PAGE---------------
// -----------------------------------------------

// Delete about blogs
$(document).ready(function() {

  $(document).on('click', '.delete_blogs_about', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Blog will be removed",
          icon: "error",
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

// Recovers about blogs
$(document).ready(function() {

  $(document).on('click', '.recover_aboutblogs_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Blog will be recovered",
          icon: "info",
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
                  'recover_aboutblogs_btn': true
              },
              success: function(response) {
                  if(response == 200) {
                      swal("Success!", "Blog Recovered Successfully", "success");
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

// Delete about blogs permanently
$(document).ready(function() {

  $(document).on('click', '.delete_permanent_aboutblogs_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Blog will be deleted permanently",
          icon: "error",
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
                  'delete_permanent_aboutblogs_btn': true
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

// -----------------------------------------------
// --------------INDUSTRY BLOG PAGE---------------
// -----------------------------------------------

// Delete industry blogs 
$(document).ready(function() {

  $(document).on('click', '.delete_blogs_industry', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Blog will be removed",
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {

            $.ajax({
              method: "POST",
              url: "../functions/codes.php",
              data: {
                  'industry_blog_id': id,
                  'delete_blogs_industry': true
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

// Recovers industry blogs
$(document).ready(function() {

  $(document).on('click', '.recover_industryblogs_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Blog will be recovered",
          icon: "info",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {

            $.ajax({
              method: "POST",
              url: "../functions/codes.php",
              data: {
                  'industry_blog_id': id,
                  'recover_industryblogs_btn': true
              },
              success: function(response) {
                  if(response == 200) {
                      swal("Success!", "Blog Recovered Successfully", "success");
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

// Delete industry blogs permanently
$(document).ready(function() {

  $(document).on('click', '.delete_permanent_industryblogs_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Blog will be deleted permanently",
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {

            $.ajax({
              method: "POST",
              url: "../functions/codes.php",
              data: {
                  'industry_blog_id': id,
                  'delete_permanent_industryblogs_btn': true
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

// -----------------------------------------------
// ----------------CLIENT BLOG PAGE---------------
// -----------------------------------------------

// Delete client blogs
$(document).ready(function() {

  $(document).on('click', '.delete_espress', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Blog will be removed",
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {

            $.ajax({
              method: "POST",
              url: "../functions/handleEspress.php",
              data: {
                  'espress_id': id,
                  'delete_espress': true
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

// Delete Client blogs permanently
$(document).ready(function() {

  $(document).on('click', '.delete_permanent_espress_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Blog will be deleted permanently",
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {

            $.ajax({
              method: "POST",
              url: "../functions/handleEspress.php",
              data: {
                  'espress_id': id,
                  'delete_permanent_espress_btn': true
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

// Recovers Photos Permanently
$(document).ready(function() {

  $(document).on('click', '.recover_espress_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();

      swal({
          title: "Confirmation",
          text: "Blog will be recovered",
          icon: "info",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {

            $.ajax({
              method: "POST",
              url: "../functions/handleEspress.php",
              data: {
                  'image_id': id,
                  'recover_espress_btn': true
              },
              success: function(response) {
                  if(response == 200) {
                      swal("Success!", "Cover Photo recovered Successfully", "success");
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

// Alerts Admin for new orders
// $(document).ready(function () {

//   $(document).on('click', '.update_admin_orders', function () {

//     $(".body-wrapper").load(location.href + ".body-wrapper");

//   });

// });