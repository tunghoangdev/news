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
});
function config_action(msg) {
    if (window.confirm(msg)){
        return true;
    }
    return false;
}
