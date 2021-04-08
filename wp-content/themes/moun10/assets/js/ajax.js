jQuery( document ).ready(function( $ ) {
  
    /*------------------------------------------------
                        Services
    ------------------------------------------------*/
    var $container = $('#our-services .section-content');

    var pageNumber = 1;

    function moun10_load_posts(){
        pageNumber++;

        $.ajax({
            type: "POST",
            dataType: "html",
            url: moun10.ajaxurl,
            data: {action: 'moun10_service_ajax_handler',
                pageNumber: pageNumber,
            },
            success: function(data){
                console.log(data);
                if( data.length > 0 ){
                    $container.append(data);
                    $("#Sloadmore").removeClass("hide");
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }



    $("#Sloadmore").click(function(e){ // When btn is pressed.
        e.preventDefault();
        $("#Sloadmore").addClass("hide");
        setTimeout(moun10_load_posts, 500)
    });

});