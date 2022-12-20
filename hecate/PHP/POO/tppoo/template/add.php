<?php include("header.php") ?>
<h1> Ajouter une annonce </h1>

 

<form method="POST" action="/index.php?task=add_annonce" enctype="multipart/form-data" >
  
  <div class="form-group">
    <label for="titleAnnonce" class=<?php if (!empty($_GET['title']) && $_GET['title'] == 'vide') {echo "text-danger";} ?>>Title</label>
    <input name="titleAnnonce" type="text" class="form-control" id="titleAnnonce" aria-describedby="title" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="annonceContent" class=<?php if (!empty($_GET['annonce']) && $_GET['annonce'] == 'vide') {echo "text-danger";} ?> >Content</label>
    <textarea name="annonceContent" class="form-control" id="annonceContent" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>