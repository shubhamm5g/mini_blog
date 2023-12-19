<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <header class="header">
      <a href="<?= base_url()."admin/login"?>" class="btn btn-success">Admin Login</a>
    </header>
    <div class="container">
      <div class="row">
        <h1 class="col my-3 text-center">Total article are <?= sizeof($result) ?></h1>
      </div>
        <div class="row">
           
                
        <?php  foreach ($result as $key => $value) {
           echo ' <div class="col my-4"> <div class="card" style="width: 18rem;">
           <img src="'. base_url().$value["blog_img"] .'" class="card-img-top" alt="...">
           <div class="card-body">
             <h5 class="card-title">'.$value['blog_title'].'</h5>
             <a href="'.base_url().'home/blog_details/'.$value['blogid'].'" class="btn btn-primary">View blog</a>
           </div>
         </div> </div>';
        }?>
          
        
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>