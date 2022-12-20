###### PHP - programmation avancée

# Faille XSS

## Introduction

La faille XSS (pour Cross-Site Scripting) est un type de faille permettant d'injécter du contenu HTML non désiré dans une page, et donc, d'injecter un JavaScript malicieux qui va effectuer certaines actions malveillantes sur la page.

Le nom de "Cross-Site Scripting" est très discutable, il est possible de faire beaucoup de chose autre que du JavaScript, mais c'est entré dans les habitudes.

## Demonstration

### Avant la démonstration

Dans le dossier actuel, vous trouverez trois fichiers :
- **"index.php"** : une page de connexion ultra simple (même pas vraiment fonctionnelle)
- **"email.html"** : un contenu HTML qui ca jouer le rôle d'un email que l'on aurait reçu dans notre boite mail
- **"email-xss"** : le même email, mais envoyé par un malicieux pirate qui veut nous pirater notre compte, le pas beau.

Pour information **"index.php"**, n'est vraiment pas fonctionnelle, on fait "comme si". Lorsque le formulaire est envoyé, la page se contente d'afficher un message *"Félicitation, vous êtes connecté."*. Que le formulaire soit réellement fonctionnel ou pas, n'a absolument aucune incidence sur la vulnérabilité XSS. Bien évidemment, un pirate, lui, ferait cela avec un vrai site parfaitement fonctionnel.

### Fonctionnement de la page

Autre particularité de cette page, elle peut recevoir en paramêtre (dans l'url), un adresse email, ce qui lui permet de pré-remplir le champ email.

C'est très pratique lorsque, par exemple, vous envoyé des emails à vos clients dans lesquels vous les inviter à cliquer sur un lien pour revenir sur votre site. C'est exactement ce que nous allons simuler ici. Malheureusement, c'est très pratique, mais c'est aussi ce qui rend notre site vulnérale à la faille XSS.

### Démonstration avec email.html

Tout en passant par votre **"localhost"** affichez le contenu du fichier **"email.html"** dans votre navigateur.

Cet un email au format texte, simple, brut, direct. Dedans ce trouve un lien. 

- Cliquez sur le lient dans l'email.
- Vous voici sur la page de connexion et votre email, ici **"votre@email.com"** à été près rempli.
- Tapez un faux mot de passe (un peu réaliste).
- Cliquez sur **"Me connecter"**
- Vous êtes connecté

### Démonstration avec email-xss.html

Maintenant, refaite exactement la même chose avec **"email-xss.html"**.

Suivez scrupuleusement les mêmes étapes.

**Vous avez été piraté !**

![Faut faire attention où on clique, ça peut mal finir](./images/war-games-xss.jpg)

## Explications

### Code du formulaire

Pour comprendre comment tout ceci est possible, regardons d'abord comment est conçu le php de notre page.

À un moment dans le PHP, nous récupérons le paramêtre ```$email``` reçu dans l'url :

```PHP
    if(isset($_GET['email'])) {
        $email = $_GET['email'];
    }
```

Puis, dans le PHTML, nous affichon cet email dans le champ qui lui est réservé :

```html
    <input type="email" class="form-control" name="email" id="email" value="<?=$email?>">
```

Jusque là rien de bien sorcier me direz-vous, sauf que c'est justement dans ce code que se situe notre faille. Nous verrons plus tard pourquoi, voyons d'abord ce que fait le pirate pour exploiter la faille.

### Lien dans l'email

Donc, puisque notre PHP accepte un paramêtre **"email"** dans l'url, nous pouvons écrire des liens comme celui dans le premier email :

```html
    <a href="index.php?email=votre@email.com">Cliquez-ici</a>
```

En fait, c'est même exactement pour ce genre d'occasion que l'on a créée ce paramètre.

Sauf que, dans son email, notre malicieux farceur, lui a écrit ceci :

```html
    <a href='index.php?email=votre@email.com"><script src="js/xss.min.js"></script><class="'>Cliquez-ici</a>
```

Mais qu'est-ce que c'est que tout ça ?

Le pirate, au lieu de stocker uniquement ```votre@email.com``` dans le paramètre **"email"** de l'url, a stocké tout ceci : ```votre@email.com"><script src="js/xss.min.js"></script><class="```

### Résultat dans le PHTML

Avec ce système de lien corrompu, lorsque nous injectons notre variable **"$email"** dans notre HTML, au lieu que cela écrive le code suivant, tout à fait normal :

```html
    <input type="email" class="form-control" name="email" id="email" value="votre@email.com">
```

Cela écrit :

```html
    <input type="email" class="form-control" name="email" id="email" value="votre@email.com"><script src="js/xss.min.js"></script><class="">
```

Ou, présenté autrement :

```html
    <input type="email" class="form-control" name="email" id="email" value="votre@email.com">
    <script src="js/xss.min.js"></script>
    <class="">
```

Ce petit salopard de hacker a bien écrit l'email de l'utilisateur, mais il a enchaîné en injectant son propre javascript qui contient un code malin. Tout en, en plus, prenant bien soin de fermer le ```">``` final avec un balise bidon, juste pour ne pas casser le HTML, histoire que cela ne se voit pas visuellement sur la page et qu'il faille regarder le code pour trouver le code malicieux.

Une fois injecté le JavaScript, le hacker peut faire ce qu'il veut. Ici, c'est un petit ***keyLogger*** totalement inoffensif qui enregistre tout ce que vous tapez dans le champ mot de passe avec un simple event KeyDown. Mais ça aurait pu être beaucoup plus désastreux.

## Protection

Les failles XSS sont plus complexes que cela, ici, c'est une petite démonstration avec un paramètre passé par GET dans l'url, ceci dit, cela peut aussi marcher avec POST.

Il existe plusieurs sécurités que l'on peut mettre en place pour ce protéger contre XSS. Certaines faciles, d'autres très lourdes.

Cependant, l'une des protections les plus simples à mettre en place est tout simplement de ne jamais prendre ce que l'on reçoit (par GET ou POST) pour argent content avant de le réafficher.

En effet, ici, tout le problème vient de ce que nous prenons une donnée venant du navigateur (à considérer comme fondamentalement non fiable) et nous réaffichons directement cette donnée, sans traitement particulier.

Ce serait exactement le même problème si, par exemple, un formulaire nous avez demandé nos informations personnelles pour remplir notre fiche profil ensuite avec ces données.

Donc, la protection de base, consiste à toujours retraiter ce qui vient du navigateur et, en particulier, à désactiver tout ce qui à l'intérieur de la donnée peut ressembler à du HTML.

### En PHP

En PHP, il est très facile de corriger un donnée qui pourrait contenir du HTML (et donc un code malicieux) avec la fonction [htmlentities()](https://www.php.net/manual/fr/function.htmlentities).

Cette fonction va corriger tout ce qui pourrait ressembler de près ou de loin à du HTML. Empêchant ainsi l'attaque.

Modifiez la ligne suivante de votre page **"index.php"** :

```PHP
    $email = $_GET['email'];
```

Faites en sorte d'appeler [htmlentities()](https://www.php.net/manual/fr/function.htmlentities) avant de récupérer la valeur de ```$_GET['email']``` dans ```$email``` (débrouillez-vous un peu, ce n'est pas sorcier).

Et voilà, testez à nouveau avec l'email corrompu **"email-xss.html"**.

**Le script JavaScript est désactivé. Bravo !** 🍾



