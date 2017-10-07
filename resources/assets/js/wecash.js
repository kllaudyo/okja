/**
 * Created by claudio on 19/07/17.
 */
$(document).ready(function(e){

    $("input.search").on("keyup",function(e){
        apex_search.search(e);
    });

    apex_search.init();

    $("[name=check_confirmacao]").change(function(e){
        if($(this).is(':checked')){
            $(this).parent().find("[name=fallback_confirmacao]").val("1");
        }else{
            $(this).parent().find("[name=fallback_confirmacao]").val("0");
        }
        $(this).parent().submit();
    });

    $('[data-toggle=tooltip]').tooltip();

});

window.apex_search = {};
apex_search.init = function () {

    if (document.getElementsByClassName("table").length > 0) {
        var table = document.getElementsByClassName("table")[0];
        var tbody = table.getElementsByTagName('TBODY')[0];
        this.rows = tbody.getElementsByTagName('TR');
        this.rows_length = apex_search.rows.length;
        this.rows_text = [];
        for (var i = 0; i < apex_search.rows_length; i++) {
            this.rows_text[i] = (apex_search.rows[i].innerText) ? apex_search.rows[i].innerText.toUpperCase() : apex_search.rows[i].textContent.toUpperCase();
            for (var j = 0; j < apex_search.rows[i].cells.length; j++) {
                if (apex_search.rows[i].cells[j].getAttribute('text')) {
                    this.rows_text[i] += apex_search.rows[i].cells[j].getAttribute('text').toUpperCase();
                }

            }
        }
    }
};

apex_search.lsearch = function(){
    this.term = document.getElementsByClassName('search')[0].value.toUpperCase();
    for(var i=0,row;row = this.rows[i],row_text = this.rows_text[i];i++){
        row.style.display = ((row_text.indexOf(this.term) != -1) || this.term  === '')?'':'none';
    }
    this.time = false;
};

apex_search.search = function(e){
    var keycode;
    if(window.event){keycode = window.event.keyCode;}
    else if (e){keycode = e.which;}
    else {return false;}
    apex_search.lsearch();
};