// // Adds EspressYourSelf Blog 
// $(document).ready(function () {

//     $(document).on('click','.addPost', function (e) {
//         e.preventDefault();

//         var title = $(this).closest('.industry-form').find('.input-title').val();
//         var name = $(this).closest('.industry-form').find('.input-name').val();
//         var article = $(this).closest('.industry-form').find('.input-article').val();
//         var image = $(this).closest('.industry-form').find('.input-image').val();

//         // let form_data = new FormData();
//         // let img = $("#myImage")[0].files;
//         // form_data.append('my_image', img[0]);

//         $.ajax({
//             method: "POST",
//             url: "functions/handleEspress.php",
//             data: {
//                 "title": title,
//                 "name": name,
//                 "article": article,
//                 "image": image,
//                 "scope": "add"
//             },
//             success: function (response) {
//                 if(response == 201) {
//                     swal("Success!", "Post added successfully", "success");
//                     // $("#user_table").load(location.href + " #user_table");
//                 } else if(response == 500) {
//                     swal("Error!", "User Already added", "error");
//                 }
//             }
//         });
//     });

// });