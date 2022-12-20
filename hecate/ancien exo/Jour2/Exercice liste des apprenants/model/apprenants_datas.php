<!--    M.V.C => Model | View | Controller          -->
<!--             Data  | Html | Traitement data     -->

<!--    Model => Controller => Vue                  -->


<?php


$apprenants = [
    [
        'id' => 0,
        'firstname' => 'Léo',
        'lastname' => 'MOREAU',
        'birthyear' => '1998',
        'birthcity' => 'Chateaubriant',
        'lovedmovie' => 'Pororoca, Pas un jour ne passe',
        'lovedsong' => 'Violette et Citronelle - Alk, Ronrare KronoMuzik, Pandrezz',
        'lovedquote' => 'L\'éternité c\'est très long, surtout vers la fin'
    ],
    [
        'id' => 1,
        'firstname' => 'Oskar',
        'lastname' => 'KLOC',
        'birthyear' => '1980',
        'birthcity' => 'Varsovie',
        'lovedmovie' => 'Le 5ème élément',
        'lovedsong' => 'Show must go on !',
        'lovedquote' => 'Tout ce qui n\'est pas donné est perdu !'
    ],
    [
        'id' => 2,
        'firstname' => 'Florian',
        'lastname' => 'Moulu',
        'birthyear' => '1994',
        'birthcity' => 'Paris',
        'lovedmovie' => 'Batman: The Dark Knight',
        'lovedsong' => 'Jazzy Bazz - P-Town Blues',
        'lovedquote' => 'Ah gars, on est là hein'
    ],
    [
        'id' => 3,
        'firstname' => 'Nohwa',
        'lastname' => 'Hamadi',
        'birthyear' => '1996',
        'birthcity' => 'Lyon',
        'lovedmovie' => 'Le Parrain 2',
        'lovedsong' => 'Kanye West - Devil In a New Dress',
        'lovedquote' => 'Au fond ce n’est qu’au moment de disparaître que l’on peut enfin savoir qui on a été, la fin donne un sens à tout ce qui a précédé.'
    ],
    [
        'id' => 4,
        'firstname' => 'Gabriel',
        'lastname' => 'Leroux',
        'birthyear' => '1993',
        'birthcity' => 'Le Havre',
        'lovedmovie' => 'La cité de la peur',
        'lovedsong' => 'Strangers - The Kinks',
        'lovedquote' => 'J\'ai venu, j\'ai vu, j\'ai vaincu.'
    ],
    [
        'id' => 5,
        'firstname' => 'Yves',
        'lastname' => 'Bauer',
        'birthyear' => '1987',
        'birthcity' => 'TORONTO',
        'lovedmovie' => 'Parasite',
        'lovedsong' => 'The world is yours-Nas',
        'lovedquote' => 'It\'s not about how many times you fall, but how many times you get back up.'
    ],
    [
        'id' => 6,
        'firstname' => 'Daniel',
        'lastname' => 'Coelho',
        'birthyear' => '1996',
        'birthcity' => 'Paris',
        'lovedmovie' => 'black Mass',
        'lovedsong' => 'NWA',
        'lovedquote' => 'Ah gars, on est là hein'
    ],
    [
        'id' => 7,
        'firstname' => 'Hardy',
        'lastname' => 'Kayumba',
        'birthyear' => '1990',
        'birthcity' => 'Kinshasa',
        'lovedmovie' => 'Power',
        'lovedsong' => 'Monalisa',
        'lovedquote' => 'none'
    ],
    [
        'id' => 8,
        'firstname' => 'julien',
        'lastname' => 'Dhuy',
        'birthyear' => '1982',
        'birthcity' => 'paris',
        'lovedmovie' => 'oldboy, \'no_pain_no_gain,',
        'lovedsong' => 'tiesto, atb',
        'lovedquote' => 'qui avale une noix de coco fais confiance a son anus'
    ],
    [
        'id' => 9,
        'firstname' => 'Marco',
        'lastname' => 'Andrianjakarimanga',
        'birthyear' => '1988',
        'birthcity' => 'Antannarivo',
        'lovedmovie' => 'Scarface',
        'lovedsong' => 'Tovaritch , Pzidec',
        'lovedquote' => 'il n\'y a point de bonheur sans courage ni de vertu sans combat.'
    ],
    [
        'id' => 10,
        'firstname' => 'Pedro H.',
        'lastname' => 'Braz Meireles',
        'birthyear' => '1992',
        'birthcity' => 'Brésil',
        'lovedmovie' => 'Le Seigneur des Anneaux',
        'lovedsong' => 'Artiste : Giorgia Angiuli',
        'lovedquote' => 'Les difficultés préparent les gens ordinaires à des destins extraordinaires'
    ],
    [
        'id' => 11,
        'firstname' => 'Thomas',
        'lastname' => 'Dutourné',
        'birthyear' => '1984',
        'birthcity' => 'Courcourronne',
        'lovedmovie' => 'little budda',
        'lovedsong' => 'ten years after : i loved to change the world',
        'lovedquote' => 'jouer pour ne pas gagner c\'est comme coucher avec sa soeur. C\'est peut-être un coup sombtueux avec des cadeaux pleins le corsage mais tu risques de faire des gosses mal-saint avec de la mousse dans les oreils mais rien pour pisser. '
    ],
    [
        'id' => 12,
        'firstname' => 'Laurie',
        'lastname' => 'Mbotchak',
        'birthyear' => '1988',
        'birthcity' => 'Paris',
        'lovedmovie' => 'Vice Versa',
        'lovedsong' => 'homebody, ph1',
        'lovedquote' => 'The journey of a thousand miles begins with a single step.'
    ],
    [
        'id' => 13,
        'firstname' => 'Adel',
        'lastname' => 'BELARBI',
        'birthyear' => '1989',
        'birthcity' => 'Alger',
        'lovedmovie' => 'CLOCLO',
        'lovedsong' => 'Nekfeu - Plume',
        'lovedquote' => 'Un mensonge est une superbe histoire qu\'une personne vient anéantir avec la vérité'
    ],
    [
        'id' => 14,
        'firstname' => 'Nivetha',
        'lastname' => 'Narentherarajah',
        'birthyear' => '1999',
        'birthcity' => 'Paris',
        'lovedmovie' => 'Conjuring',
        'lovedsong' => 'Laptop - Kalash/Maureen',
        'lovedquote' => 'Le succès est une série de petites victoires.'
    ]
];


echo 'Les données ont bien été chargées.';
