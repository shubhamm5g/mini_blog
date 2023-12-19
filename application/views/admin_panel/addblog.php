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
          <h1>Add Blog page</h1>
          <form action="<?= base_url()."admin/blog/addblog_post"?>" enctype="multipart/form-data" method="post">
          <select  class="my-2 form-select" name="status">
            <option selected>Select option</option>
            <option value="1">publish</option>
            <option value="0">Unpublish</option>
        </select>
          
          <div class="form-control">
                    <input class="form-control" type="text" placeholder="Title" name="blog_title" >
                </div>
                <div class="form-control">
                    <textarea class="form-control" placeholder="Description" name="blog_desc"></textarea>
                </div>
                <div class="form-control">
                    <input class="form-control" type="file" placeholder="Upload File" name="blog_img" >
                </div>
                <button type="submit" class="btn btn-primary my-2">Submit</button>
          </form>
        </main>
      </div>
    </div>
    <?php $this->load->view('admin_panel/footer')?>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>


    <script type="text/javascript">
        <?php
        if(isset($_SESSION['inserted'])){
            if($_SESSION['inserted']=='yes'){
                echo "alert('Data inserted')";
            }else{
                echo "alert('Data inserted')";
            }
            
        }
        if(isset($_SESSION['upload_error'])){
            if($_SESSION['upload_error']=='yes'){
                echo "alert('Unable to upload')";
            }
            
        }
        ?>

CKEDITOR.replace( 'blog_desc' );
    </script>

    </body>

    
    

   
</html>