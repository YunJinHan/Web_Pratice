"use strict";

/* CSE326 : Web Application Development
 * Lab 11 - Maze game
 *
 */

var loser = null;  // whether the user has hit a wall

window.onload = function() {

    document.getElementById("start").onclick = startClick;
    document.getElementById("end").onmouseover = overEnd;

    document.body.onmousemove = overBody;

    var boundaries = $$("div#maze div.boundary");
    for (var i = 0; i < boundaries.length; i ++){
        boundaries[i].onmouseover = overBoundary;
    }

};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
    if (loser === false){
        loser = true;

        $("status").textContent = "You lose! :(";

        var boundaries = $$("div#maze div.boundary");
        for (var i = 0; i < boundaries.length; i ++){
            boundaries[i].addClassName("youlose");
        }
    }
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick(event) {
    loser = false;

    $("status").textContent = "Find the end!";

    var boundaries = $$("div#maze div.boundary");
    for (var i = 0; i < boundaries.length; i ++){
        boundaries[i].removeClassName("youlose");
    }
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd(event) {
    if (loser === false){
        $("status").textContent = "You win! :)";
        loser = null;
    }
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    if (loser === false && event.target == document.body){
        overBoundary(event);
    }
}
