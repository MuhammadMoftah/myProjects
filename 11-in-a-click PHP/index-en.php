<?php 
include 'connect.php';

$sql = "SELECT * FROM about_en";
$res = mysqli_query($conn , $sql);

?> 

<?php  include 'header-en.php'; ?>
   
<!--===== top section =====-->
<!--===== top section =====-->
<section class="first">
  
   <div class="content">
       <img src="images/logo-huge2.png"  alt="">
        
<!--        <button class="btn2">Download</button>-->
        
    </div>
</section>


<!--===== About =====-->
<!--===== About =====-->
<section class="about">
   <div class="container">
        <div class="title"> 
        <?php while($row = mysqli_fetch_array($res)) {?>
            <h1> About us</h1>
            <img src="icons/earth.png" alt="">
            <span class="left"></span>
            <span class="right"></span>
        </div>
        <div class="text">
         <?php echo  $row["cont"];  }?>
        </div>
    </div>
</section>

<!--===== How it works =====-->
<!--===== How it works =====-->
<?php $sql = "SELECT * FROM how_en";
      $res = mysqli_query($conn , $sql); 
?>

  <div class="how">
     <div class="bgc"></div>
      <div class="container">
          <div class="title"> 
            <?php while($row = mysqli_fetch_array($res)) { ?>
            <h1> How it Works</h1>
            <img src="icons/earth.png" alt="">
            <span class="left"></span>
            <span class="right"></span>
          </div>
        <div class="text">
            <span><?php echo $row['title'];  ?></span>  
            
            <ul>
                <?php echo $row['points']; } ?>
            </ul>  
        </div>
        
      </div>
  </div>


   
<!--   ===== Why US ====-->
<!--   ===== Why US ====-->
<?php $sql = "SELECT * FROM why_en";
      $res = mysqli_query($conn , $sql); 
?>

  <div class="why">
      <div class="container">
          <div class="title"> 
            <h1>Why Choose Us</h1>
            <img src="icons/earth.png" alt="">
            <span class="left"></span>
            <span class="right"></span>
        </div>
        
        <div class="pic">
            <?php while($row = mysqli_fetch_array($res)) { ?>
                 <div class="col-sm-6 center-block">
                    <div class="part">
                        <div class="svg">
                            <span class="<?php echo $row['fontawesome'];  ?>"></span>
                        </div>
                        <h5><?php echo $row['title'];  ?></h5>
                        <p><?php echo $row['cont'];  ?></p>
                    </div>
                </div> <?php }?>

                
        </div>
        
    
      </div>
  </div>
  
<!--===== Testimonial =====-->
<!--===== Testimonial  =====-->
<?php $sql = "SELECT * FROM testimonial_en";
      $res = mysqli_query($conn , $sql); 
?>
  <div class="testi">
         <div class="bgc"></div>
          <div class="title"> 
                <h1>Testimonial</h1>
                <img src="icons/earth.png" alt="">
                <span class="left"></span>
                <span class="right"></span>
          </div>
        
         <div id="testi" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php while($row = mysqli_fetch_array($res)) { ?>

                <div class="item   <?php echo $row['active']; ?>">
                    <p><?php  echo $row['saying'];  ?> </p>
                    <h5><?php  echo $row['name'];  ?></h5>
                </div>
                <?php } ?>
  

             <ol class="carousel-indicators">
                 <?php 
                 $res = mysqli_query($conn , $sql); 
                 ?>
                <?php while($row = mysqli_fetch_array($res)) { ?>

                    <li data-target="#testi" data-slide-to="<?php echo $row['data-slide']; ?>" class="<?php echo $row['active']; ?>" ><img src="<?php echo $row['pic'];?>" alt=""> </li>
                 
                    <?php } ?>

              </ol> 
           </div>             
  </div>
  </div>
  
<!--   ==== Cars ====-->
<!--   ==== Cars ====-->
<?php $sql = "SELECT * FROM cars_en";
      $res = mysqli_query($conn , $sql); 
?>
   <section class="cars">
   <div class="container">
       
        <div class="title"> 
                <h1>Our Cars</h1>
                <img src="icons/earth.png" alt="">
                <span class="left"></span>
                <span class="right"></span>
          </div>
   
          <div class="pic">
                <?php while($row = mysqli_fetch_array($res)) { ?>

                    <div class="part">                   
                        <img src="<?php echo $row['pic'] ?>" class="head" alt="" >
                        <h5>
                            <?php echo $row['name'] ?>
                        </h5>
                        <p>
                            <?php echo $row['description'] ?>
                        </p>
                        <div class="onmap">
                            <h4>Car Logo on Maps</h4>
                            <img src="<?php echo $row['logo'] ?>" class="logo" alt="">
                        </div>
                    </div>
                    <?php } ?>

          </div>
               
      </div>
  
 </section>
   

<!--   ==== Real Estate ====-->
<!--   ==== Real Estate ====-->
<?php $sql = "SELECT * FROM realestate_en";
      $res = mysqli_query($conn , $sql);
?>
   <section class="estate">
   <div class="container">
       
        <div class="title"> 
                <h1>Real Estate</h1>
                <img src="icons/earth.png" alt="">
                <span class="left"></span>
                <span class="right"></span>
          </div>
   
          <div class="pic">
              
                <?php while($row = mysqli_fetch_array($res)) { ?>
                    <div class="part">                   
                        <img src="<?php echo $row['pic'] ?>" class="head" alt="" >
                        <h5><?php echo $row['name'] ?></h5>
                        <p>
                            <?php echo $row['description'] ?>
                        </p>
                        <div class="onmap">
                            <h4>Real estate Logo on Maps</h4>
                            <img src="<?php echo $row['logo'] ?>" class="logo" alt="">
                        </div>
                    </div>
                    <?php } ?>         
            </div>
               
      </div>
  
 </section>



<!--   ==== FAQ ====-->
<!--   ==== FAQ ====-->
  <?php $sql = "SELECT * FROM faq_en";
        $res = mysqli_query($conn , $sql);
?>
   <section class="faq">
   <div class="container">
       
        <div class="title"> 
                <h1>FAQ</h1>
                <img src="icons/earth.png" alt="">
                <span class="left"></span>
                <span class="right"></span>
          </div>
          
    <div class="filter">
           <button id="one" class="active">User</button>
           <button id="two">Driver</button>
           <button id="three">Owner</button>
    </div>
    
  <div class="panel-group" id="accordion">
      
    <?php while($row = mysqli_fetch_array($res)) { ?>
    <div class="panel panel-default <?php echo $row['category']?>" >
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['html_id']?>"><?php echo $row['question']?>  </a>
        </h4>
      </div>
      <div id="<?php echo $row['html_id']?>" class="panel-collapse collapse">
        <div class="panel-body">
         
          <?php echo $row['answer']?>
          
        </div>
      </div>
    </div>
    <?php }?>
   
  </div>     
</div>
</section>
   
   
   

<!--    ===== Contact ====-->
<!--    ===== Contact ====-->
<?php $sql = "SELECT * FROM contact_en";
      $res = mysqli_query($conn , $sql);
    ?>
    <section class="contact section-bg-img" id="contact">
       <div class="bgc"></div>
            <div class="container">
                
                <div class="title"> 
                    <h1>Contact Us</h1>
                    <img src="icons/earth.png" alt="">
                    <span class="left"></span>
                    <span class="right"></span>
                </div>
                
  <?php while($row = mysqli_fetch_array($res)) { ?>
                <div class="contact-form">
                    <div class="row">
                        <div class="col-md-4 col-lg-push-8 col-md-push-8">
                            <div class="contact-info">
                                <div class="info-box">
                                    <div class="icon-box">
                                        <i class="fa fa-phone white-color"></i>
                                    </div>
                                    <h5>Phone</h5>
                                    <p>
                                        <?php echo $row['phone'] ?>
                                    </p>
                                </div>
                                <div class="info-box">
                                    <div class="icon-box">
                                        <i class="fa fa-envelope-o white-color"></i>
                                    </div>
                                    <h5>Email</h5>
                                    <p>
                                        <?php echo $row['email'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-pull-4 col-md-pull-4">
                            <form action="https://themeforest.net/item/sakura-resumecv-vcard/20509845">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message"></textarea>
                                </div>
                                <div class="btn-box">
                                    <button type="submit" class="btn2"> <span><i class="fa fa-send"></i> Send</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
    </section>
    




 <?php  include 'footer-en.php'; ?>