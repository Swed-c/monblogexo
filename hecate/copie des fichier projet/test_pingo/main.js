/*
(c) 2014, Vladimir Agafonkin
simpleheat, a tiny JavaScript library for drawing heatmaps with Canvas
https://github.com/mourner/simpleheat



*/



/* --------------RANGEEEE---------- */
let meter = document.getElementById('metre');

let annee = null;
const sliderValue = document.querySelector("span");
const inputSlider = document.querySelector("input");

inputSlider.oninput = (() =>{
    let value = inputSlider.value;
    
    annee = 2000 + parseInt(value * 5); 

    
    
    sliderValue.textContent = annee; 
    sliderValue.style.left = value + "%";
    sliderValue.classList.add("show");

    num = (annee - 2000) * 0.0055;
    reg = 0.26 * num;
    exp = Math.exp(num);

    result = ((reg + exp) - 0.99);
    elevation = result.toFixed(2); 

   meter.innerHTML=elevation; 

})
inputSlider.onblur = (()=>{
    sliderValue.classList.remove("show");
    
});  

/*  -------------  MAPP------ */


// Test polygones
let geojsonReg = null;
let geojsonDep = null;

// Dimension de la map
let width = 1920;
let height = 675;

let divisionX =  120;
let year = 2000; 


let request = 5;

let num = (year - 2000) * 0.0055;
let reg = 0.26 * num;
let exp = Math.exp(num);

let result = ((reg + exp) - 0.99);
let elevation = 15;/* result.toFixed(2); */
// Récupère les fichiers.geoJSON (inutile pour le test)
fetch('region.geoJSON')
.then((response) => {
    return response.json();
})
.then(function(body){
    
    geojsonReg = body;
    
    fetch('departement.geoJSON')
    .then((response) => {
        return response.json();
    })
    .then(function(body){
        
        geojsonDep = body;
        
        // Initialise la map une fois les fichiers récupérés
        launchMap();
    })
    
})
// Je sais plus
.catch((error) => {
    console.log(error);
});

// Déclaration de la fonction qui lance la map
function launchMap(){
    
    // Point de spawn de la map au lancement de la page
    var map = L.map('map').setView([48.85358230372717, 2.345392919211823], 12);
    
    // Déclare la map
    L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    className: 'map-tiles',
    minZoom: 5,
    maxZoom: 15
    
    // Affiche la map
}).addTo(map);

// Appel de la fonction gridAdd
gridAdd();

// Lance la fonction gridAdd lors de l'évênement 'moveend'
map.on('moveend', gridAdd);
inputSlider.addEventListener('mouseup',gridAdd);




// Déclaration de la fonction pour afficher la grille heatMap
function gridAdd(){
    
    // Récupère les coordonnées nord-est et sud-ouest de la carte visible
    let boundsMap = map.getBounds();
    
    // Récupère les coordonnées nord-est
    let x1 = boundsMap['_northEast']['lng']; 
    let y1 = boundsMap['_northEast']['lat'];
    
    // Récupère les coordonnées sud-ouest
    let x2 = boundsMap['_southWest']['lng'];
    let y2 = boundsMap['_southWest']['lat'];
    
    // Récupère la différence entre les 2 coordonnées
    let x3 = x1 - x2;
    let y3 = y1 - y2;
    
    // Calcule le nombre de points intermédiaires par rapport à la dimension de la page (width)
    let divisionY = Math.floor(height * divisionX / width);
    
    // Calcule la distance entre 2 points de la grille
    let x4 = x3 / divisionX;
    let y4 = y3 / divisionY;
    
    // Déclare 2 tableaux (lng: toutes les longitudes, lat: toutes les latitudes)
    let lng = [];
    let lat = [];
    
    // Push toutes les longitudes
    for (let i = 0; i <= divisionX; i++){
        lng.push(x2 + (x4 * i));
    }
    
    // Push toutes les latitudes
    for (let i = 0; i <= divisionY; i++){
        lat.push(y2 + (y4 * i));
    }
    
    let pointsPreShot = (divisionX * divisionY) + divisionX + divisionY + 1;
    
    let gridPointsDivision = Math.ceil(pointsPreShot / request);
    
    // Déclare un tableau qui rangera toutes les coordonnées de la grille
    let gridPoints = [];
    let points = [];
    
    // Push toutes les longitudes et latitudes dans le tableau 'gridPoints
    for (let j = 0; j < lat.length; j++) {      
        for (let i = 0; i < lng.length; i++) {
            
            if (points.length == gridPointsDivision){
                gridPoints.push(points);
                points = [];
            }
            
            points.push({
                latitude: lat[j],
                longitude: lng[i]
            });
        }   
    }
    
    gridPoints.push(points); 
    console.log(gridPoints);
    
    let apiAnswer = [];
    let waterPoints = [];
    
    let lowerPoint = 1000;
    let lowerPointCurrent = null;
    
    (async () => {
        const rawResponse = await fetch('https://api.open-elevation.com/api/v1/lookup', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({'locations': gridPoints[0]})
    });
    const responseApi0 = await rawResponse.json();        
    
    for (let i = 0; i < responseApi0.results.length; i++) {
        
        lowerPointCurrent = responseApi0.results[i].elevation;

        if (lowerPointCurrent < lowerPoint) {
            lowerPoint = lowerPointCurrent;        
        }

        apiAnswer.push([responseApi0.results[i].latitude, responseApi0.results[i].longitude, responseApi0.results[i].elevation])
 
    }
    
    (async () => {
        const rawResponse = await fetch('https://api.open-elevation.com/api/v1/lookup', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({'locations': gridPoints[1]})
    });
    const responseApi1 = await rawResponse.json();        
    
    for (let i = 0; i < responseApi1.results.length; i++) {
        
        lowerPointCurrent = responseApi1.results[i].elevation;

        if (lowerPointCurrent < lowerPoint) {
            lowerPoint = lowerPointCurrent;        
        }

        apiAnswer.push([responseApi1.results[i].latitude, responseApi1.results[i].longitude, responseApi1.results[i].elevation])
 
    }
    
    (async () => {
        const rawResponse = await fetch('https://api.open-elevation.com/api/v1/lookup', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({'locations': gridPoints[2]})
    });
    const responseApi1 = await rawResponse.json();        
    
    for (let i = 0; i < responseApi1.results.length; i++) {
        
        lowerPointCurrent = responseApi1.results[i].elevation;

        if (lowerPointCurrent < lowerPoint) {
            lowerPoint = lowerPointCurrent;        
        }

        apiAnswer.push([responseApi1.results[i].latitude, responseApi1.results[i].longitude, responseApi1.results[i].elevation]);  
     
    }
    
    (async () => {
        const rawResponse = await fetch('https://api.open-elevation.com/api/v1/lookup', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({'locations': gridPoints[3]})
    });
    const responseApi1 = await rawResponse.json();        
    
    for (let i = 0; i < responseApi1.results.length; i++) {
        
        lowerPointCurrent = responseApi1.results[i].elevation;

        if (lowerPointCurrent < lowerPoint) {
            lowerPoint = lowerPointCurrent;        
        }

        apiAnswer.push([responseApi1.results[i].latitude, responseApi1.results[i].longitude, responseApi1.results[i].elevation])
  
    }
    
    (async () => {
        const rawResponse = await fetch('https://api.open-elevation.com/api/v1/lookup', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({'locations': gridPoints[4]})
    });
    const responseApi1 = await rawResponse.json();
    
    for (let i = 0; i < responseApi1.results.length; i++) {
        
        lowerPointCurrent = responseApi1.results[i].elevation;

        if (lowerPointCurrent < lowerPoint) {
            lowerPoint = lowerPointCurrent;        
        }

        apiAnswer.push([responseApi1.results[i].latitude, responseApi1.results[i].longitude, responseApi1.results[i].elevation])
  
    }

        console.log(lowerPoint); 
    

        for (let i = 0; i < apiAnswer.length; i++) {
            
    
            if (apiAnswer[i][2] > lowerPoint && apiAnswer[i][2] < lowerPoint + 20) {
                waterPoints.push([apiAnswer[i][0],apiAnswer[i][1], 200]);           
            }
        
            
        }


    /* for (let i = 0; i < responseApi4.results.length; i++) {
        
        if (responseApi4.results[i].elevation < elevation) {
            waterPoints.push([responseApi4.results[i].latitude, responseApi4.results[i].longitude, 200]);
        }
        
    } */
    
    
    // Créer un groupe 'Layer' leaflet
    let group = L.featureGroup(); 
    
    // Push toutes les points de la grille dans un groupe 'group'
    var heat = L.heatLayer(waterPoints, {radius: 12}).addTo(group);
    
    gridRemove();
    
    // Affiche tout les points de la grille
    map.addLayer(group);
    
    // Lance la fonction lors de l'évênement 'movestart'
    map.on('movestart', gridRemove);
    inputSlider.addEventListener('mousedown', gridRemove);
    
    // Déclaration de la fonction pour retirer les points de la grille
    function gridRemove(){
        
        // Retire les points de la grille
        map.removeLayer(group);
    }
})();
})();
})();
})();
})();
} 
}


/* ------------GAMEEEEEEEEEEE-------------- */

var n_rows = 14;
var n_cols = 14;
var start_table = new Array (n_rows);
for (var row = 0; row < n_rows; row++) {
    start_table[row] = new Array (n_cols);
}
var colours = "blue red green yellow pink purple".split (/\s+/);

var userReact = true;
/* DOM functions. */

function create_node (type, parent)
{
    var new_node = document.createElement (type);
    parent.appendChild (new_node);
    return new_node;
}

function append_text (parent, text)
{
    var text_node = document.createTextNode (text);
    clear (parent);
    parent.appendChild(text_node);
}

function getByID (id)
{
    var element = document.getElementById (id);
    return element;
}

function clear (element)
{
    while (element.lastChild)
        element.removeChild (element.lastChild);
}

/* Flood fill game. */

var moves;
var max_moves = 25;
var finished;
var nFlooded = 0;

/* Alter a flooded element's colour. */
function colourFlooded(row, col, colour)
{
    game_table[row][col].colour = colour;
    game_table[row][col].element.className = "piece " + colour;
}

/* Mark a square as not flooded. This is for the undo function. */
function unfloodSq(row, col) {
    game_table[row][col].flooded = false;
    game_table[row][col].move = unmovedState;
}

/* Mark a square as flooded, and record the move number in the square
   so that the move can be undone. */
function floodSq(row, col, move) {
    game_table[row][col].flooded = true;
    game_table[row][col].move = move;
}

/* The square specified by row and col is adjacent to a flooded
   square, so see if we can flood this one too. */
function floodAdjacent(row, col, move) {
    if (game_table[row][col].flooded)
        return;
    if (game_table[row][col].colour == move.colour) {
        /* This is the right colour, so flood it. */
        nFlooded++;
        floodSq(row, col, move.move);
        /* Recurse to get connected neighbours. */
        floodNeighbours(row, col, move);
    }
}

/* Given a square at row, col which is flooded, look at all its
   neighbours to see if they can be flooded too. */
function floodNeighbours(row, col, move)
{
    if (row < n_rows - 1)
        floodAdjacent(row + 1, col, move);
    if (row > 0)
        floodAdjacent(row - 1, col, move);
    if (col < n_cols - 1)
        floodAdjacent(row, col + 1, move);
    if (col > 0)
        floodAdjacent(row, col - 1, move);
}

/* This returns true if the entire board is flooded, false if not. */
function all_flooded ()
{
    for (var row = 0; row < n_rows; row++) {
        for (var col = 0; col < n_cols; col++) {
            if (! game_table[row][col].flooded) {
                return false;
            }
        }
    }
    return true;
}

/* Disable one of the colour choice buttons. */
function disableChosen(colour) {
    var allbuttons = document.getElementsByClassName("button")
    for (var i = 0; i < allbuttons.length; i++) {
        if (allbuttons[i].classList.contains(colour)) {
            allbuttons[i].style = "opacity: 0%;"
        } else {
            allbuttons[i].style = "opacity: 100%;";
        }
    }
}

/* Choices made by the user. This is for the undo function. */
var choices = new Array();

/* Save the move so that it can be undone. */
function saveMove(move) {
    choices.push(move);
}

/* Do "action" on all the squares of game_table. */
function allSq(action) {
    for (var row = 0; row < n_rows; row++) {
        for (var col = 0; col < n_cols; col++) {
            action(row, col);
        }
    }
}

/* Flood the board with a new colour specified by move.colour. */
function flood(move, initial)
{
    if (finished)
        return;
    var old_colour = game_table[0][0].colour;
    /* Check this is not the same as the old colour. */
    if (! initial && move.colour == old_colour)
        return;
    /* Check how many squares have changed. */
    nFlooded = 0;
    /* Change the colour of all the already-flooded elements. */
    allSq(function(row, col) {
        if (game_table[row][col].flooded) {
            colourFlooded (row, col, move.colour);
            floodNeighbours(row, col, move);
        }
    });
    clearStatus();
    /* In the initial case only, it's OK if nothing has changed. */
    if (initial || nFlooded > 0) {
        moves++;
        saveMove(move);
        if (! initial) {
            react();
        }
    } else {
        /* Ignore this move as it was useless. */
        useless();
    }
    if (all_flooded()) {
        finished = true;
        if (moves <= max_moves) {
            winner();
        } else {
            setStatus("🥱 Terminé; enfin! 😴");
        }
    } else if (moves >= max_moves) {
        setStatus("😞 Tu as perdu 💔");
    }
    updateTurn();
    disableChosen(move.colour);
}

function remainingColours() {
    var remaining = new Object();
    allSq(function(row, col) {
        var sq = game_table[row][col];
        if (! sq.flooded) {
            remaining[sq.colour] = true;
        }
    });
    return Object.keys(remaining).length;
}

function rando(arr) {
    var r = Math.floor(Math.random()*arr.length);
    setStatus(arr[r])
}

var notLookingGood = [
    "⚕️ Prognosis: negative 😷",
    "Things are looking gloomy!",
    "There may be trouble ahead...",
    "It's not whether you win or lose, it's how you play the game.",
    "Il y a beaucoup de dangers!",
];

var previousRemaining = 6;

/* React to the user's play. */
function react() {
    if (! userReact) {
        return
    }
    var remaining = remainingColours();
    var movesLeft = max_moves - moves;
    if (remaining > movesLeft) {
        rando(notLookingGood);
        return;
    }
    if (remaining < previousRemaining) {
        setStatus("All of the " + game_table[0][0].colour + " squares have been flooded");
        previousRemaining = remaining;
        return;
    }
    /* I don't think it's possible to get more than 30 at once. */
    if (nFlooded > 25) {
        setStatus("🤯 Explosion de cerveau 🤯");
    } else if (nFlooded > 20) {
        setStatus("🐶 WOW!! 🐱");
    } else if (nFlooded > 15) {
        setStatus("🚀 Joueur Etoile ⭐");
    } else if (nFlooded > 10) {
        setStatus("🔥 En feu!");
    } else if (nFlooded > 6) {
        setStatus("😍 Trop bien!");
    } else if (nFlooded > 4) {
        setStatus("😎 Bravo");
    } else if (nFlooded > 2) {
        setStatus("👍");
    } else if (nFlooded == 1) {
        if (moves > 2) {
            setStatus("🥱");
        }
    }       
}

/* Update the "Turn" counter. */
function updateTurn() {
    append_text (getByID ("moves"), moves);
}

/* Publish a congratulatory message indicating successful
   completion. */
function winner() {
    var winner = [
        "🎉 Gagner! 🥂",
        "🎈 Félicitations 🎈",
        "🍗 Winner, winner, chicken dinner! 🍗",
        "🏆 An overwhelming victory! 🏆",
        "🎯 You have nailed it! 🎯",
        "🍒 You are the champion, my friend! 🍈",
    ];
    var r = max_moves - moves;
    if (r >= winner.length) {
        r = winner.length - 1;
    }
    setStatus(winner[r]);
}

var nUseless = 0;

/* Make a silly response when the user keeps clicking invalid
   choices. */
function useless() {
    nUseless++;
    if (nUseless < 5) {
        setStatus("Il n'y a pas de carré adjacent de la même couleur");
        return;
    }
    rando(suggest);
}

    var suggest = [
        "🍜 AMnge tes pâte",
        "🍄 Laisse tombé les champis",
        "🎓 Réfléchis!",
        "🐻 Tu n'est peux être pas le plus intelligent des ours",
        "🗿 Le secret est d'entre choqué les deux cailloux les gars!",
    ];


var statusEl

function status() {
    statusEl = getByID("status");
    return statusEl;
}

function clearStatus() {
    if (! userReact) {
        return;
    }
    clear(status());
}

function setStatus(msg) {
    if (! userReact) {
        return
    }
    var s = status();
    clear(s);
    s.innerHTML = msg;
}

function help ()
{
    setStatus ("Appuyer sur le cercle pour innondé l'image\n"+
               "avec la couleur de votre coin gauche , remplissez\n"+
               "l'image entièrement en 25 coups ou\n"+
               "un peu plus.");
}

/* Create a random colour for "createTable". */
function random_colour ()
{
    var colour_no = Math.floor (Math.random () * 6);
    return colours[colour_no];
}

/* The "state of play" is stored in game_table. */
var game_table = new Array (n_rows);
for (var row = 0; row < n_rows; row++) {
    game_table[row] = new Array (n_cols);
    for (var col = 0; col < n_cols; col++) {
        game_table[row][col] = new Object ();
    }
}

/* This square has not had anything done to it. */
const unmovedState = -1;
/* This square is part of the "initial state", it is either the top
   left square on starting the game, or a square connected to that and
   with the same colour. */
const initialState = 0;

/* Create the initial table. Set ran to true to make a random table,
   else the table is loaded from the existing values of game_table. */
function createTable(ran)
{
    moves = -1;
    finished = false;
    var game_table_element = getByID ("game-table-tbody");
    clear(game_table_element);
    for (var row = 0; row < n_rows; row++) {
        var tr = create_node ("tr", game_table_element);
        for (var col = 0; col < n_cols; col++) {
            var td = create_node ("td", tr);
            if (ran) {
                var colour = random_colour ();
                game_table[row][col].colour = colour;
            }
            td.className = "piece " + game_table[row][col].colour;
            unfloodSq(row, col);
            start_table[row][col] = colour;
            game_table[row][col].element = td;
        }
    }
    /* Mark the first element of the table as flooded. */
    floodSq(0, 0, initialState);
    var initialColour = game_table[0][0].colour;
    /* Initialize the adjacent elements with the same colour to be flooded
       from the outset. */
    flood({colour: initialColour, move: initialState}, true);
    append_text(getByID("max-moves"), max_moves);
    if (ran) {
        /* Save the initial board. */
        storeInitial();
    }
}

/* Click function for the colour buttons. */
function choose(colour) {
    flood({colour: colour, move: moves + 1});
}

/* Reset the board and variables. */
function resetBoard() {
    previousRemaining = 6;
    choices = new Array();
}

/* Start a new game. */
function newGame ()
{
    nUseless = 0;
    resetBoard();
    clearSave();
    squashed = "";
    createTable(true);
}

function clearSave() {
    var url = document.location.href;
    var parts = url.split('?');
    url = parts.shift();
    window.history.pushState('', document.title, url);
}

function sleep(delay) {
    return new Promise(resolve => setTimeout(resolve, delay));
}

/* Show the user the solver's solution, with a delay between each
   move. */
async function solution(response) {
    var sol = JSON.parse(response)
    if (! sol.ok) {
        setStatus("Solver complained as follows: " + sol.status)
        return
    }
    if (! sol.solved) {
        setStatus("L'ordi n'est pas assé intelligent pour le résoudre")
        return
    }
    setDifficulty(sol.difficulty)
    userReact = false
    for (var i = 0; i < sol.choices.length; i++) {
        flood({colour: sol.choices[i], move: i+1}, false)
        await sleep(500);
    }
    userReact = true
}

function setDifficulty(d) {
    switch (d) {
    case 0:
        setStatus("🥱 Très facile");
        return
    case 1:
        setStatus("☺️ Les doigts dans le nez");
        return
    case 2:
        setStatus("😐 Un peu difficile");
        return
    case 3:
        setStatus("😕 Difficile");
        return
    case 4:
        setStatus("😟 Très difficile");
        return
    case 5:
        setStatus("😖 extrêmement difficile!");
        return
    }
}


/* Send this board to the solver. */
function solve() {
    if (finished) {
        setStatus("Le jeu est déjà résolu");
        return;
    }
    var board = new Array(n_rows);
    for (var i = 0; i < n_rows; i++) {
        board[i] = new Array(n_cols);
        for (var j = 0; j < n_cols; j++) {
            var sq = game_table[i][j]
            board[i][j] = {
                c: sq.colour,
                f: sq.flooded,
            }
        }
    }
    var game = {
        moves: moves,
        board: board,
    };
    var sender = new XMLHttpRequest();
    sender.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                solution(sender.responseText);
            } else {
                setStatus("Solution non trouvé tu va devoir le faire toi même!");
            }
        }
    }
    sender.open("POST", "/floodsolver/", true);
    sender.send(JSON.stringify(game));
}

function startAgain() {
    if (moves == 0) {
        setStatus("On est déjà au début");
        return;
    }
    resetBoard();
    unsquash(squashed);
    createTable(false);
}

/* Mutex for undoing. User hitting the undo button repeatedly can
   cause weird problems. */
var undoing = false;

/* Undo the most recent move. */
function undo() {
    if (undoing) {
        return;
    }
    if (moves <= 0) {
        setStatus("Il n'y a rien à refaire, choisir une couleur.");
        return;
    }
    undoing = true;
    if (finished) {
        finished = false;
    }
    clearStatus();
    var lastMove = choices[choices.length - 1]
    var prevMove = choices[choices.length - 2]
    allSq(function(row, col) {
        var sq = game_table[row][col];
        if (sq.flooded) {
            if (sq.move == moves) {
                unfloodSq(row, col);
            } else {
                colourFlooded(row, col, prevMove.colour);
            }
        }
    });
    moves--;
    updateTurn();
    choices.pop();
    disableChosen(prevMove.colour);
    previousRemaining = remainingColours();
    undoing = false;
}

function colourToNumber(colour) {
    switch (colour) {
    case "blue":
        return 0;
    case "red":
        return 1;
    case "green":
        return 2;
    case "yellow":
        return 3;
    case "pink":
        return 4;
    case "purple":
        return 5;
    }
    throw("Couleur inconnue "+colour);
}

function numberToColour(num) {
    if (num >= colours.length) {
        throw("Numéro trop grand " + num);
    }
    return colours[num];
}

/* Convert n to letters/digits/URL-safe characters. */
function sixtysix(n) {
    if (n < 10) {
        return '0123456789'.charAt(n);
    }
    if (n < 36) {
        return 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.charAt(n - 10);
    }
    if (n < 62) {
        return 'abcdefghijklmnopqrstuvwxyz'.charAt(n - 36);
    }
    /* No, I do not care about putting the following in ASCII
       order. */
    switch (n) {
    case 62:
        return '-';
    case 63:
        return '.';
    case 64:
        return '_';
    case 65:
        return '~';
    }
}

function sqToNum(n) {
    var row = Math.floor(n / n_rows);
    var col = Math.floor(n % n_rows);
    if (col >= n_cols || row >= n_rows) {
        throw("Number out of bounds " + n);
    }
    var cname = game_table[row][col].colour;
    return colourToNumber(cname);
}

/* The initial state of play. */
var squashed = "";

/* Squash seven cells into three bytes of web-safe ASCII using
   6^7/66^3 ~=~ 1. This code assumes that n_cols is a multiple of
   seven. */
function storeInitial() {
    var n = n_rows * n_cols;
    var sevens = Math.floor(n / 7);
    squashed = ""
    for (var i = 0; i < sevens; i++) {
        var out = 0;
        for (var j = 0; j < 7; j++) {
            out = sqToNum(i*7+j) + 6*out;
        }
        if (out > 279936) { // 6^7
            throw("Out is too big "+out);
        }
        squashed = squashed.concat(sixtysix(out % 66));
        out = Math.floor(out/66);
        squashed = squashed.concat(sixtysix(out % 66)); 
        out = Math.floor(out/66);
        squashed = squashed.concat(sixtysix(out));
    }
}

function moveList() {
    var nc = choices.length
    var ml = "";
    for (var i = 0; i < nc; i++) {
        var ci = choices[i].colour
        if (ci == "purple") {
            ci = "l";
        } else {
            ci = ci.substring(0, 1);
        }
        ml += ci;
    }
    return ml;
}

function squash() {
    var url = '?b=' + squashed;
    if (moves > 0) {
        ml = moveList();
        url += "&m=" + ml;
    }
    window.history.pushState({}, '', url);
}

function setSq(n, colour) {
    var row = Math.floor(n / n_rows);
    var col = Math.floor(n % n_rows);
    if (col >= n_cols || row >= n_rows) {
        throw("Number out of bounds " + n);
    }
    var cname = numberToColour(colour);
    game_table[row][col].colour = cname;
}

function un66(q) {
    var c = q.charCodeAt(0);
    if (c >= 48 && c <= 57) {
        return c - 48;
    }
    if (c >= 65 && c <= 90) {
        return c - 65 + 10;
    }
    if (c >= 97 && c <= 122) {
        return c - 97 + 36;
    }
    switch (c) {
    case 45:
        return 62;
    case 46:
        return 63;
    case 95:
        return 64;
    case 126:
        return 65;
    }
    throw("Unknown char value " + c);
}

function unsquash(squashed) {
    var n = squashed.length;
    if (n != n_rows * n_cols * 3 / 7) {
        return false;
    }
    var threes = Math.floor(n / 3);
    for (var i = 0; i < threes; i++) {
        var t = i * 3;
        var a = un66(squashed.charAt(t))
        var b = un66(squashed.charAt(t + 1))
        var c = un66(squashed.charAt(t + 2))
        var cell = a + 66 * (b + 66 * c);
        for (var j = 0; j < 7; j++) {
            var o = i*7+(6-j);
            setSq(o, Math.floor(cell % 6));
            cell = Math.floor(cell / 6);
        }
    }
    return true;
}

function save() {
    squash();
    setStatus("Copier l'adresse pour revenir à cette partie");
}

function letterToMove(letter) {
    switch (letter) {
        case "b": return "blue";
        case "g": return "green";
        case "p": return "pink";
        case "l": return "purple";
        case "r": return "red";
        case "y": return "yellow";
    }
    throw("Touche clavier non reconnue "+letter);
}

function doMoves(ml) {
    var n = ml.length
    for (var i = 0; i < n; i++) {
        var move = ml.substring(i, i+1);
        var colour = letterToMove(move);
        flood({colour: colour, move: moves + 1});
    }
}

function load() {
    var regex = new RegExp("b=([0-9a-zA-Z_~.-]+)");
    // ~ is not web safe apparently, or is it?
    var results = regex.exec(decodeURI(window.location.href));
    if (results === null) {
        createTable(true);
        return;
    }
    squashed = results[1];
    if (! unsquash(squashed)) {
        setStatus("La Position de départ '" + squashed + "' semble mauvaise");
        return;
    }
    createTable(false);
    var moveregex = new RegExp("m=([bglpry]+)");
    var moveresults = moveregex.exec(window.location.href);
    if (moveresults != null) {
        doMoves(moveresults[1]);
    }
}