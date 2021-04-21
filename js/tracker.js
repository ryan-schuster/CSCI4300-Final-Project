// Check off achievement or habit
$(".circle").click(function() {
    $(this).toggleClass("clicked");

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

var cntrlIsPressed = false;
$(document).keydown(function(e){
    if(e.keycode = 17) {
        cntrlIsPressed = true;
    }
});

$(document).keyup(function(e){
    if(e.keycode != 17) {
        cntrlIsPressed = false;
    }
});

// Trigger action when the contexmenu is about to be shown
$(document).bind("contextmenu", function (event) {
    
    if(cntrlIsPressed) {return;}
    console.log(cntrlIsPressed);

    // Avoid the real one
    event.preventDefault();
    

    // ---------

    // Show contextmenu
    $(".custom-menu").finish().toggle(100).
    
    // In the right position (the mouse)
    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
});


// If the document is clicked somewhere

$(document).bind("mousedown", function (e) {
    
    // If the clicked element is not the menu
    if (!$(e.target).parents(".custom-menu").length > 0) {
        
        // Hide it
        $(".custom-menu").hide(100);
    }
});


// If the menu element is clicked
$(".custom-menu li").click(function(){
    
    // This is the triggered action name
    switch($(this).attr("data-action")) {
        
        // A case for each action. Your actions here
        case "delete": alert("first"); break;
    }
  
    // Hide it AFTER the action was triggered
    $(".custom-menu").hide(100);
  });
