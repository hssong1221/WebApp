'use strict';

/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */

var loser = null;  // whether the user has hit a wall
var click = false;

document.observe("keydown", function(){
    alert("준영 ㅄ ");
})
window.onload = function() {
    var end = $("end");
    end.onmouseover = overEnd;
    var start = $("start");
    start.onclick = startClick;

    var boundary = $$("div#maze div.boundary");
    for(var i = 0 ; i < boundary.length ; i++)
    {
        boundary[i].onmouseover = overBoundary;  
    }
    
}

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) 
{
    if(loser === null)
    {
        loser = true;
        var boundary = $$("div#maze div.boundary");
        for(var k = 0 ; k < boundary.length; k++){
            boundary[k].addClassName("youlose");
        }
        $("status").textContent = "You Lose :(";
        event.stop();   
    }
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    loser = null;
    click = true;
    
    $("status").textContent = "Click the \"S\" to begin.";

    var boundary = $$("div#maze div.boundary");
    for(var k = 0 ; k < boundary.length; k++){
        boundary[k].removeClassName("youlose");
    }

}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    $("status").textContent = "You Win :)";
    event.stop();
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    if(loser === null )
    {
        overBoundary(event);
    }
}

