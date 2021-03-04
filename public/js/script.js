// //-------------------------------------------------------

// // For DOM edit and add
// $(function() {
//     //we're also doing it for Add Data Note, because if we just do it for edit it'll overwrite both of them. So we need to overwrite again
//     //take class adddatabtn
//     // $('.adddatabtn').on("click", () => {
//     //     //take id forModallabel
//     //     $('#forModalLabel').html('Add Data Note.');
            
//     //     //To make the button for submit in Add data note
//     //     //css selctor
//     //     $('.modal-footer button[type=submit]').html('Add Data');
//     // })


//     //find the a tag with a class 'showeditmodal; for edit in display > index.php
//     $('.showeditmodal').on("click", function() {
//         // //take id forModallabel
//         // $('#forModalLabel').html('Edit Data Note.');
            
//         // //To make the button for submit in Edit data note
//         // //css selctor
//         // $('.modal-footer button[type=submit]').html('Edit Data');

//         // //change the action in views > display > index
//         // //class: modal-body from views > display > index
//         // $('.modal-body form').attr('action', 'http://localhost/project-blog-mvc/public/display/edit')


        
//         //catch $datum['id']
//         //'this' is the button you clicked
//         const id = $(this).data('id');

//         //do the ajax
//         $.ajax({
//             url: 'http://localhost/project-note-mvc/public/display/getedit', 
//             data: {id : id}, 
//             method: 'post',
//             dataType: 'json',
//             success: function(data) {
//                 $('#titlenote').val(data.titlenote);
//                 $('#contentnote').val(data.contentnote);
//             }
//         })

//     })

// })