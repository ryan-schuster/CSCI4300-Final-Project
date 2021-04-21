
$(".achieve").click(function() {

    var clickedGoal = $.trim($(this).children()[0].childNodes[0].data);


    $.post( 
        '../../php/goalListAdder.php', // location of your php script
        {goalName: clickedGoal}, // any data you want to send to the script
        function( data ){  // a function to deal with the returned information
            // Reload the page
            //window.location.href = "../tracker.php";
        });
});