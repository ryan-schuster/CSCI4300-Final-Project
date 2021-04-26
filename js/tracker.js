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

var deleteString; // Global delete variable
var deleteID;
// Trigger action when the contexmenu is about to be shown
$(document).bind("contextmenu", function (event) {
    

    var x = event.clientX, y = event.clientY;
    var msOverElement = document.elementFromPoint(x, y);
    var parent = msOverElement.parentElement;
    var clickedElement = msOverElement;

    var achieveElement = 
        (parent.className === "achieve" || 
        parent.className === "achieve-habit")
         ? parent : clickedElement;


    if(achieveElement.className === "achieve" ||
        achieveElement.className === "achieve-habit") {
        event.preventDefault();
        deleteID = achieveElement.children[0].id;
        deleteString = $.trim(achieveElement.children[1].childNodes[0].data);
    } else {
        return;
    }
    

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
        case "first":
            $.post( 
                '../php/personalGoalListDeleter.php', // location of your php script
                {goalName: deleteString}, // any data you want to send to the script
                function( data ){  // a function to deal with the returned information
                    // Nothing needed
                });

            $.post( 
                '../php/goalListDeleter.php', // location of your php script
                {goalID: deleteID}, // any data you want to send to the script
                function( data ){  // a function to deal with the returned information
                    // Nothing needed
                });

                location.reload();
            break;
    }
  
    // Hide it AFTER the action was triggered
    $(".custom-menu").hide(100);
  });

  //