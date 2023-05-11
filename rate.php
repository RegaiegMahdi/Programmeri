<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="st.css">
</head>
<body>
  
  <div class="container-xl">
  	<div class="row">
  	  <div class="col-md-12">
  	  	<h2>Products</h2>
  	  	<div class="carousel slide">
  	  	  <div class="carousel-inner">
  	  	  	<div class="item carousel-item active">
  	  	  	 <div class="row">
  	  	  	 	
               <?php 
                require_once '../config.php';
                $query="SELECT * FROM `post`";
                $db = config::getConnexion();
                $stmt = $db->prepare($query);

                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                {
                ?>
                 <div class="col-sm-3">
                   <div class="thumb-wrapper">
                   	<div class="img-box">
                   	 <img src="nikon.jpg" class="img-fluid" alt="Nikon">
                   	</div>

                     <div class="thumb-content">
                       <h4><?php echo $row['name_p'];?></h4>                                 
                         <div class="star-rating">
                           <ul class="list-inline">
                            <?php 
                             
                             $start=1;
                             while ($start <= 5) 
                             {
                             	if ($row['stars'] < $start) 
                                {
                                 ?>
                                 <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                 <?php
                             	}else{
                             	 ?>
                                 <li class="list-inline-item"><i class="fa fa-star"></i></li>
                             	 <?php
                             	}

                             	$start++;
                             }
                            ?>                
                          </ul>
                        </div>
                      </div> 
                   </div>
                 </div>
                <?php
                }
                ?>
  	  	  	 </div>
  	  	  	</div>
  	  	  </div>
  	  	</div>
  	  </div>
  	</div>
  </div>
</body>
</html>
