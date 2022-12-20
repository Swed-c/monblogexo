let geojsonReg = null;
let geojsonDep = null;

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
        launchMap();
    })
    
})



.catch((error) => {
    console.log(error);
});

function launchMap(){

    // On dessine le polygone
    let geojsonLayerReg = L.geoJSON(geojsonReg, {
        style: {
            "color": "#ffffff",
            "opacity": 1,
            "weight": 1,
            "fillColor": "#08837800",
            "fillOpacity": 0.3
        }
    });

    let geojsonLayerDep = L.geoJSON(geojsonDep, {
        style: {
            "color": "#ffffff",
            "opacity": 1,
            "weight": 1,
            "fillColor": "#ff0000",
            "fillOpacity": 0.3
        }
    });

    
    
    
    var map = L.map('map').setView([46, 3.161405], 5);
    
    L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        className: 'map-tiles',
        minZoom: 6,
        maxZoom: 6
    }).addTo(map);
   

    

     

    var warningRedIcon = L.icon({
        iconUrl: './img/warningred.png',
        shadowUrl: '',
    
        iconSize:     [30, 30], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [15, 15], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -3] // point from which the popup should open relative to the iconAnchor
    });

    var warningOrgIcon = L.icon({
        iconUrl: './img/warningorange.png',
        shadowUrl: '',
    
        iconSize:     [20, 20], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [15, 15], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-5, -5] // point from which the popup should open relative to the iconAnchor
    });

      // MARKER --------->>>>
    let i = 1;

              

            window['marker' + i]  = L.marker([43.891518, -0.498008], {icon: warningOrgIcon}).addTo(map);
            window['marker' + i].bindPopup("<h1>Crues de l’Adour </h1><h2>Hauteur de crue</h2><h3>1er au 5 janvier 2021</h3> <img src='./img/crueadour2.jpg''/>");
        
            var marker2 = L.marker([43.881060, 0.992782], {icon: warningOrgIcon}).addTo(map);
            marker2.bindPopup("<h1>Crues de l’Arrats-Gimone</h1><h2>Hauteur de crue</h2><h3>1er au 5 janvier 2021</h3> <img src='./img/cruearrats.jpg''/>");
            
            var marker3 = L.marker([50.675702, 1.643790], {icon: warningOrgIcon}).addTo(map);
            marker3.bindPopup("<h1>Crue de la liane</h1><h2>Hauteur de crue</h2><h3>14 au 15 janvier 2021</h3> <img src='./img/crueliane.jpg''/>");
        
            var marker4 = L.marker([44.498920, 0.156086], {icon: warningRedIcon}).addTo(map);
            marker4.bindPopup("<h1>Crues de la Garonne </h1><h2>Hauteur de crue</h2><h3>28 janvier au 4 février 2021</h3> <img src='./img/cruegaronne.jpg''/>");
            
            var marker5 = L.marker([48.970128, 0.508200], {icon: warningOrgIcon}).addTo(map);
            marker5.bindPopup("<h1>Crues de la Charentonne </h1><h2>Hauteur de crue</h2><h3>22 juin au 24 juin 2021</h3> <img src='./img/cruechar.jpg''/>");

            var marker6 = L.marker([49.490011, 4.633087], {icon: warningOrgIcon}).addTo(map);
            marker6.bindPopup("<h1>Crues de l’Aisne Vaux</h1><h2>Hauteur de crue</h2><h3>14 au 24 juillet 2021</h3> <img src='./img/crueaisne.jpg''/>");
            
            var marker7 = L.marker([43.756659, 4.292887], {icon: warningOrgIcon}).addTo(map);
            marker7.bindPopup("<h1>Crues du Vistre</h1><h2>Hauteur de crue</h2><h3>14 et 15 septembre 2021</h3> <img src='./img/cruevistre.jpg''/>");
            
            var marker8 = L.marker([44.425178, 4.095017], {icon: warningOrgIcon}).addTo(map);
            marker8.bindPopup("<h1>Crues de l’Ardèche </h1><h2>Hauteur de crue</h2><h3>2 au 4 octobre 2021 </h3> <img src='./img/crueardeche.jpg' '/>");
            
            var marker9 = L.marker([50.642137, 2.644887], {icon: warningOrgIcon}).addTo(map);
            marker9.bindPopup("<h1>Crues de la Lys</h1><h2>Hauteur de crue</h2><h3>28 novembre au 2 décembre 2021 </h3> <img src='./img/cruedulys.jpg' '/><button type='button'> En savoir plus</button>");



}



     map.removeLayer(geojsonLayerDep);
    // On ajoute à la carte
    geojsonLayerReg.addTo(map); 

    



    
   





