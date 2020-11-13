$(document).on('click','.delete',function() {

   
    let postid = $(this).attr('data-id');
    $('#input_id').val(postid);

    //console.log(document.getElementById(input_id).value);

    // document.getElementsById('#modal_btn_delete')[0].getAttribute('data-id');
});

// $(document).on('click','.delete',function(){
//     let id = $(this).attr('data-id');
//     $('#id').val(id);
// });