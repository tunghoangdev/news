/**
 * Created by Pro on 7/12/2016.
 */
// Shorthand for $( document ).ready()
$(function() {
    console.log( "ready!" );
    $('div.alert').delay(3000).fadeOut();

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
