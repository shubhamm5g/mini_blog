<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.0/examples/dashboard/dashboard.css" >
    <title>Hello, world!</title>
  </head>
  <body> 
    
    <?php $this->load->view('admin_panel/header') ?>
    
    
    <div class="container-fluid">
      <div class="row">
        
    
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="container">
            <div class="row">
              <div class="col mx-2 alert alert-primary"><a href="<?= base_url().'admin/blog/addblog'?>" >Add blog</a></div>
              <div class="col alert alert-danger"><a href="<?= base_url().'admin/blog/viewblog'?>">View Blog</a></div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <?php $this->load->view('admin_panel/footer')?>
    </body>
    

   
</html>