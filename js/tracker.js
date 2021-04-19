// Check off achievement or habit
$(".circle").click(function() {
    $(this).toggleClass("clicked");
    var itemName = $.trim($(this).siblings()[0].childNodes[0].data);
    $.post( 
        '../php/completeAdder.php', // location of your php script
        {goalName: itemName }, // any data you want to send to the script
        function( data ){  // a function to deal with the returned information
            // Reload the page
            location.reload();
        });
});