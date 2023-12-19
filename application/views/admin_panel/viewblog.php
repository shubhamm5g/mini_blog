<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.0/examples/dashboard/dashboard.css" >
    <title>View Blog</title>
  </head>
  <body> 
    
    <?php $this->load->view('admin_panel/header') ?>
    
    
    <div class="container-fluid my-2">
      <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php if(isset($_SESSION['updated'])){
                echo "<div class=\"alert alert-success\" role=\"alert\">
                Updated successfully
              </div>";
            }
            ?>
        <div class="table-responsive">
            <!-- <?php echo "<pre>"; print_r($result);echo "</pre>";?> -->
            <table class="table table-striped table-sm ">
            <thead>
                <tr>
                <th scope="col">Sr No</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $counter=1;
                if($result){
                    foreach ($result as $key => $value) {
                    echo "
                    <tr>
                    <td>".$counter."</td>
                    <td>".$value['blog_title']."</td>
                    <td>".$value['blog_desc']."</td>
                    <td><img src='".base_url().$value['blog_img']."' class='img-fluid' width='100'></td>
                    <td><a class=\"btn btn-secondary\" href='".base_url().'admin/blog/editblog/'.$value['blogid']."'>Edit</a></td>
                    <td><a class='btn delete btn-danger' href='#.' data-id='".$value['blogid']."'>Delete</a></td>
                    </tr>
                    ";
                    $counter++;
                }
                }else{
                    echo "<tr><td colspan='6'></td></tr>no record found";
                }

                
                ?>

               
            </tbody>
            </table>
        </div>
        </main>
      </div>
    </div>
    <?php $this->load->view('admin_panel/footer')?>
    
    <script type="text/javascript">

        $(".delete").click(function(){
            id=($(this).attr("data-id"));
            var bool = confirm("are you sure");
            // alert($(this).attr("data-id"));
            console.log(bool);
            if(bool){
                $.ajax({
                    url:'<?= base_url().'admin/blog/deleteblog/'?>',
                    type:'post',
                    data:{'id':id},
                    success:function(data){
                        console.log(data);
                        if(data=="deleted"){
                            location.reload();
                        }else if(data=="notdeleted"){
                            alert("something went wrong");
                        }
                    }
                })
            }
        });

    </script>

    </body>
</html>