<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LBS</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="iconfont/material-icons.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="navbar-fixed">
        <nav class="pink accent-3">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo">OUR WAREHOUSE</a>
                    <a href="#" data-target="mobile-view" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#food">Foods</a>
                        </li>
                        <li>
                            <a href="#service">Services</a>
                        </li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                       </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <ul class="sidenav" id="mobile-view">
        <li>
                 <a href="#">Home</a>
           </li>
             <li>
                 <a href="#food">Food</a>
               </li>
               <li>
                     <a href="service">Service</a>
                </li>
                <li>
                <a href="#contact">Contact</a>
          </li>
    </ul>
   
    <section class="slider">
   
            <ul class="slides">
                <li>
                    <img src="img/Food/tandoori-chicken-fry.jpg" class="responsive-img" alt="">
                    <div class="caption center-align">
                        <h3>Chicken fried</h3>
                    </div>
                </li>
                <li>
                    <img src="img/Food/e710836aa7876956211915c8fdb7ac11.jpg" class="responsive-img" alt="">
                    <div class="caption right-align">
                        <h3>Snacks</h3>
                    </div>
                </li>
                <li>
                    <img src="img/Food/Healthy-Yummy-Snacks-8.jpg" class="responsive-img" alt="">
                    <div class="caption left-align">
                        <h3>Yummy Snacks</h3>
                    </div>
                </li>
            </ul>
            
            <div class="content right">
           <?php if (isset($_SESSION['success'])): ?>
                <div class="error succcess">
                    <h3>
                        <?php
                              echo $_SESSION['success'];
                              unset($_SESSION['success']);
                        ?>
                     </h3>
                </div>  
            <?php endif ?>

             <?php if (isset($_SESSION['username'])): ?>
                 <p class="green-text">Login as 
                         <strong> <?php echo $_SESSION['username'];?></strong>
                </p>
                    <a href="index.php?logout='1'" style="color: red;">Log Out</a>
                    <a href="register.php"><strong> Add Admin</strong></a>
            <?php endif ?>
            </div>
            <br>
            <div class="center">
            <h4>Healthy Foods for Better growth</h4>
            </div>
           </section>
           </div>
           <br>
           <br>
           

          <!--- Modal Trigger --->
      <!-- <section class="scrollspy" id="food">
          
            <div class="container large">
                    <a class="waves-effect waves-light btn modal-trigger" href="#infood">New Record</a>
            </div>

            <div class="modal" id="infood">
            <div class="modal-close right">&#10005;</div><br>
                <h4 class="center">Input New Food Record</h4><br>
                <div class="modal-content">
                  
                </div>
            </div>
        </section> -->

        <section class="scrollspy" id="food">
                <form action="service.php" id="form" method="post">
                <?php include('errors.php'); ?>
                        <div class="input-field col m4">
                            <input type="number" name="fid" value="<?php echo($fid); ?>">
                            <label for="foodName">Food Id</label>
                     </div>
           
                 <div class="input-field col m4">
                            <input type="text" name="foodName" value ="<?php echo($foodName); ?>" >
                            <label for="foodName">Enter Food Name</label>
                    </div>
                    <div class="input-field col m4">
                            <input type="text" name="Quantity" value ="<?php echo($Quantity); ?>" >
                            <label for="foodName">Quantity</label>
                    </div>
           
                <div class="input-field">
                            <input type="text" name="manName"value ="<?php echo($manName); ?>" >
                            <label for="foodName">Manufacturer Name</label>
                        </div>
                <div class="input-field">
                            <input type="text" name="locName" value ="<?php echo($locName); ?>">
                            <label for="foodName">Location</label>
                        </div> 
                <div class="input-field">
                            <input type="text" name="manDate"value ="<?php echo($manDate); ?>" >
                            <label for="foodName">Manufacturing Date</label>
                        </div>   
                <div class="input-field">
                            <input type="text" name="expDate" value ="<?php echo($expDate); ?>">
                            <label for="foodName">Expiring Date</label>
                        </div>
         
                        <div>
                            <input type="submit" class= "btn" id = "mybtn" name="addNew" value= "Insert">
                            <input type="submit" class= "btn" id = "mybtn" name="search" value= "Find">
                            <input type="submit" class= "btn" id = "mybtn" name="update" value= "Update">
                         </div>
                 
             </form>
       </section>


        <section>
        <div class="container">
        <table class="striped" border="10">
           <tr>
              <th>ID</th>
              <th>Food Name</th>
              <th>Quantity</th>
              <th>Manufacturer</th>
              <th>Location</th>
              <th>Produce Date</th>
              <th>Expire Date</th>
              <th>Delete</th>
          </tr>
          <?php
                   $db = mysqli_connect('localhost', 'root', '', 'major');
                   $qry = "SELECT * FROM `food_tbl`";
                    $record = mysqli_query($db, $qry);
                    while ($data = mysqli_fetch_array($record))
                    {
          ?>
             <tr>
            <td><?php echo $data['fid']; ?></td>
            <td><?php echo $data['foodName']; ?></td>
            <td><?php echo $data['Quantity']; ?></td>
            <td><?php echo $data['manName']; ?></td>
            <td><?php echo $data['locName']; ?></td>
            <td><?php echo $data['manDate']; ?></td> 
            <td><?php echo $data['expDate']; ?></td>
            <td><a href="delete.php?fid= <?php echo $data['fid']; ?>"><i class="material-icons">delete</i></a></td>
        </tr>
       
        <?php 
             } 
        ?> 
      </table>
     </div>
   
    
    <div class="parallax-container">
      <div class="parallax"><img src="img/Food/yummy_snacks_cat_pics.jpg"></div>
    </div>
    </section>
   
    
    <!---------- Contact section------>
    <section id="contact" class="section-contact scrollspy">
        <div class="container container1">
            <div class="row black">
                <div class="row">
                    <div class="col s12 m3 offset-m1 white-text">
                        <h4>Organisation</h4>
                        <hr>
                        <ul>
                            <li>Limkokwing University</li>
                            <li>Tec Cloud Platform</li>
                            <li>Think Africa</li>

                        </ul>
                    </div>

                    <div class="col s12 m8 right">
                         <h5 class="white-text center">Please leave us a message</h5>
                                <div class="row">
                                <div class="col s12 m6">
                                    <div class="input-field white-text">
                                        <input type="text" class=" white-text" id="name" for="name" name="name">
                                        <label for="name" class="white-text">First name</label>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="input-field">
                                        <input type="text" id="name" class="white-text" name="lname">
                                        <label for="lname" class="white-text">Last name</label>
                                    </div>
                                </div>
                               
                                
                                <div class="col s12 m8">
                                    <div class="input-field">
                                        <input type="text" id="name" class="white-text" name="location">
                                        <label for="name" class="white-text">Location</label>
                                    </div>
                                </div>
                                <div class="col s12 m8">
                                    <div class="input-field">
                                        <textarea type="text" id="message" name="mssg" class="white-text materialize-textarea"></textarea>
                                        <label for="textarea" class="white-text">Write message here!!</label>
                                    </div>
                                    <button class="btn green pulse right">Send</button>
                                </div> 
                            </div>  
                    </div>


                <div class="row ">
                    <div class="col s3 m3 offset-m1 white-text">
                        <h4>Partners</h4>
                        <hr>
                        <ul>
                            <li>Ministry of Education</li>
                            <li>NGO's</li>
                            <li>Tech Team Company</li>
                            <li>Government of Sierra Leone </li>
                        </ul>
                    </div>
                </div>
                <div class="container social_media">
                    <div class="row">
                        <div class="col s12 m12 push-m4">
                            <h5 class="white-text">Connect with us on Social Media</h5>
                            <a href="#" class="white-text">
                                <i class="fa fa-facebook-square fa-3x fbk"></i>
                            </a>
                            <a href="#" class="white-text">
                                <i class="fa fa-linkedin fa-3x lin"></i>
                            </a>
                            <a href="#" class="white-text ">
                                <i class="fa fa-instagram fa-3x ins"></i>
                            </a>
                            <a href="#" class="white-text">
                                <i class="fa fa-twitter fa-3x tw"></i>
                            </a>
                            <a href="#" class="white-text">
                                <i class="fa fa-google-plus fa-3x gp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="center">E-learning &copy; 2018 Developed Group 2</p>
            </div>
        </div>
    </section>
   


     <script type="text/javascript" src="js/materialize.min.js"></script>
     <script type ="text/javascript" src ="js/jquery-3.3.1.min.js">  </script>
    <script>
    //side bar
        const sideNav = document.querySelector('.sidenav');
        M.Sidenav.init(sideNav, {});

        //Scrollspy jqueryk
         const sc = document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(sc, {
            
            scrollOffset: 40
        });
        // parralax
        const para = document.querySelectorAll('.parallax');
        M.Parallax.init(para, {

        });
       
          //Slider jquery
          const slider = document.querySelector('.slider');
        M.Slider.init(slider, {
            height: 100,
            indicator: false,
            transition: 500,
            speed: 1000
        });
        
    
        //Carousel
        var caro = document.querySelectorAll('.carousel');
         M.Carousel.init(caro,{
            transition: 100
         });

    </script>
</body>

</html>