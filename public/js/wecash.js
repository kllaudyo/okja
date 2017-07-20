/**
 * Created by claudio on 19/07/17.
 */
$(document).ready(function(e){
    $("[name=check_confirmacao]").change(function(e){
        if($(this).is(':checked')){
            $(this).val("on");
        }else{
            $(this).val("off");
        }
        $(this).closest("form").submit();
    });
});