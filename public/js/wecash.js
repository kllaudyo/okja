/**
 * Created by claudio on 19/07/17.
 */
$(document).ready(function(e){
    $("[name=check_confirmacao]").change(function(e){
        if($(this).is(':checked')){
            $(this).parent().find("[name=fallback_confirmacao]").val("1");
        }else{
            $(this).parent().find("[name=fallback_confirmacao]").val("0");
        }
        $(this).parent().submit();
    });
});