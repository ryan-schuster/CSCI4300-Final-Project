
$(".achieve").click(function() {

        var itemID = parseInt($(this).attr('id'));
    $.post( 
        '../../php/goalListAdder.php', // location of your php script
        {goalID: itemID}, // any data you want to send to the script
        function( data ){  // a function to deal with the returned information
            // Reload the page
            //window.location.href = "../tracker.php";
        });
});