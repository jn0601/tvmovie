$(document).ready(function() {
    //$(".select2").select2();

     // Sử dụng FileReader để đọc dữ liệu tạm trước khi upload lên Server
    //  function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function (e) {
    //             $('.lvr_child-multiple-image').attr('src', e.target.result);
    //         }
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }

    // // Bắt sự kiện, ngay khi thay đổi file thì đọc lại nội dung và hiển thị lại hình ảnh mới trên khung preview-upload
    // $(".lvr_upload-btn").change(function(){
    //     readURL(this);
    // }); 

    $(".js-example-templating").select2({
        placeholder: "---"
    });

    $(".lvr_upload-btn").click(function(e){       
        $('.images_file').trigger('click'); 
        // var htmlImg = '<img class="lvr_child-multiple-image" title="" src="" >';
        // var boxUpload = $(this).closest('.lvr_box-upload-image');

        // boxUpload.find('.lvr_display-image ').html(htmlImg);
    });

    
});

function loadFile(event) {
    $('.lvr_display-image').html('');
    
    for (const file of event.target.files) {
        var html = '<li class="lvr_item-image"><img class="lvr_child-multiple-image" title="" src="" ></li>';
        $('.lvr_display-image').append(html);
        var img = $('.lvr_display-image .lvr_item-image').last().find('img')[0];
        img.src = URL.createObjectURL(file);
        img.onload = function() {
            URL.revokeObjectURL(img.src) // free memory
        }
    }
    
    $('.lvr_display-image').removeClass('d-none');
};