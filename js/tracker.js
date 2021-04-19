$(".circle").click(function() {
    $(this).toggleClass("clicked");
    $.post( 
        '../php/completeAdder.php', // location of your php script
        {goalName: "Make bed" }, // any data you want to send to the script
        function( data ){  // a function to deal with the returned information
            // Reload the page
            // Later we can just use this section to move it to the checked off section
        });
});