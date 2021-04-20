// Check off achievement or habit
$(".circle").click(function() {
    //$(this).toggleClass("clicked");

    if (/^-?\d+$/.test($(this).attr('id'))) {
        var itemID = parseInt($(this).attr('id'));
        $.post( 
            '../php/completeAdder.php', // location of your php script
            {goalID: itemID}, // any data you want to send to the script
            function( data ){  // a function to deal with the returned information
                // Reload the page
                location.reload();
            });

    } else {
        var itemName = $.trim($(this).siblings()[0].childNodes[0].data);
    $.post( 
        '../php/completeAdder.php', // location of your php script
        {goalName: itemName}, // any data you want to send to the script
        function( data ){  // a function to deal with the returned information
            // Reload the page
            location.reload();
        });
    }
});

// Advances the day
$("#advance-the-day").click(function() {
    $.post( 
        '../php/newDayReset.php', // location of your php script
        {}, // any data you want to send to the script
        function( data ){  // a function to deal with the returned information
            // Reload the page
            location.reload();
        });
});