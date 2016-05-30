<!--Page for an index of advertisements-->
<?php

require __DIR__ . '/../../models/Ad.php';

$ads = Ad::all();

?>

<div class="container text-center">
  <div>
    <h1 class="text-left">All Items</h1>
  </div> 

  <?php foreach($ads->attributes as $index => $ad) : ?>
      <?php if($index % 4 == 0) : ?>
        <div class="row">
      <?php endif;  ?>

        <div class="small-thumb thumbnail col-sm-3">
          <a href="/ads/show?id=<?= $ad['id']?>"><img class="img-rounded" src="<?= $ad['image_url']; ?>"></a>
          <div class="caption">
            <h3><?= $ad['title']; ?></h3>
            <p>$<?= $ad['price']; ?></p>
            <p><?= $ad['description']; ?></p>
          </div>
          <p>
              <!-- <a href="/ads/show?id=<?= $ad['id']?>" class="btn btn-primary" role="button">View</a> -->
          </p> 
      <?php if($index % 4 == 3) : ?>
        </div> <!-- closes row -->
      <?php endif; ?>    
        </div> <!-- closes thumbnail -->
  <?php endforeach; ?>
</div>
  