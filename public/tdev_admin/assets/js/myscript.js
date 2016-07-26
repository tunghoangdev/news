/**
 * Created by Pro on 7/12/2016.
 */
// Shorthand for $( document ).ready()
$(function() {
    $('div.alert').delay(5000).fadeOut();
    $(".checkbox-slider").change(function(){
        if($(this).prop("checked") == true){
            alert('on');
        }else{
            alert('off');
        }
    });
    $('a#del_img').on('click',function () {
        var url = 'http://localhost/shoponline/admin/product/delimg/';
        var _token = $('form[name="frmEditProduct"]').find('input[name="_token"]').val();
        var idimg = $(this).parent().find('img').attr('id');
       // var img = $(this).parent().find('img').attr('src');
        $.ajax({
            url: url+idimg,
            type: 'GET',
            cache: false,
            data:{_token:_token,idimg:idimg},
            success: function (data) {
                if(data == 'Ok'){
                    $('p#img_'+idimg).remove();
                }else {
                    alert('Có lỗi xảy ra!');
                }
            }
        });
    });
});
function config_action(msg) {
    if (window.confirm(msg)){
        return true;
    }
    return false;
}
