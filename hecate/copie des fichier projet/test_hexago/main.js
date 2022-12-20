/*
(c) 2014, Vladimir Agafonkin
simpleheat, a tiny JavaScript library for drawing heatmaps with Canvas
https://github.com/mourner/simpleheat



*/

let meter = document.getElementById('metre');


/* --------------RANGEEEE---------- */
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
let elevation = result.toFixed(2);
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
    var map = L.map('map').setView([46, 3.161405], 5);
    
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
    
    let waterPoints = [];
    
    
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
        
        if (responseApi0.results[i].elevation < elevation) {
            waterPoints.push([responseApi0.results[i].latitude, responseApi0.results[i].longitude, 200]);
        }
        
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
        
        if (responseApi1.results[i].elevation < elevation) {
            waterPoints.push([responseApi1.results[i].latitude, responseApi1.results[i].longitude, 200]);
        }
        
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
        
        if (responseApi1.results[i].elevation < elevation) {
            waterPoints.push([responseApi1.results[i].latitude, responseApi1.results[i].longitude, 200]);
        }
        
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
        
        if (responseApi1.results[i].elevation < elevation) {
            waterPoints.push([responseApi1.results[i].latitude, responseApi1.results[i].longitude, 200]);
        }
        
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
    const responseApi4 = await rawResponse.json();
    
    for (let i = 0; i < responseApi4.results.length; i++) {
        
        if (responseApi4.results[i].elevation < elevation) {
            waterPoints.push([responseApi4.results[i].latitude, responseApi4.results[i].longitude, 200]);
        }
        
    }
    
    
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

