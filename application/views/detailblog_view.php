<div class="card" style="width: 18rem;">
  <img src="<?= base_url().$result['blog_img']?>" width="200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $result['blog_title']?></h5>
    <p class="card-text"><?= $result['blog_desc']?></p>
    <a href="<?= base_url().'home/'?> " class="btn btn-primary">Go Back</a>
  </div>
</div>