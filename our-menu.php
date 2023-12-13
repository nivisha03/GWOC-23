<?php
    require_once 'includes/config.php';
    $menu_type = mysqli_query($db,"SELECT DISTINCT(`d_name`) FROM menu"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>our-menu</title>
    <link rel="stylesheet" href="css/our-menu.css">
    <link rel="stylesheet" href="css/home.css">
    <style>
        
    </style>
    <link rel="stylesheet" href="css/gallery.css">
    <style>
        @media (max-width:450px){
            #back-img{
                left: 20%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
<?php require_once 'header.php'; ?>
<h1 class="heading"> <span>Our menu</span> </h1>
<div class="menu-container" data-aos="fade-right" data-aos-duration="2000" >
    <div class="titile" style="font-size: 2.5rem;">Select Category <br>
    <span class="select-click" style="font-size:1.5rem;border:var(--border);padding:.5rem .8rem;cursor:pointer;">Click Here <i class="fa-solid fa-filter"></i> </span>
    <br>
</div>
<div class="select-container" data-aos="fade-up"  style="display: none; z-index:1000;align-items: center;justify-content: space-around; flex-wrap: wrap;padding: 1rem 5rem;">
   <?php while($menu_type_res = mysqli_fetch_array($menu_type)){ ?>
            <a href="our-menu#<?php echo $menu_type_res['d_name']; ?>" style="margin:.8rem .3rem;padding: .8rem 1.2rem; border: .1rem solid var(--black); border-radius: 1.3rem; background: #783e3c; color: #fff;font-size: 1.2rem;
            font-weight: bold;outline: none;box-shadow:0 .5rem 1rem rgba(0,0,0,.1)"><?php echo $menu_type_res['d_name'] ?></a>
            <?php } ?>
        </div>
    <img src="images/logo.png" alt="" class="back-3" style="position: fixed;left:40%;top:35%;opacity:0.1;height:35rem;width:35rem">
        <div class="menu">
            <?php 
           $menu_type = mysqli_query($db,"SELECT DISTINCT(`d_name`) FROM menu"); 
            while($menu_type_res = mysqli_fetch_array($menu_type)){?>
            <div class="menu-column"  data-aos="fade-down" data-aos-duration="1000" data-aos-easing="ease-in-out" id="<?php echo $menu_type_res['d_name']; ?>">
                 <h4><?php 
                $menu_item = $menu_type_res['d_name'];
                 echo $menu_type_res['d_name']; ?></h4>
                 <?php
                 $item_menu = mysqli_query($db,"SELECT * FROM `menu` WHERE `d_name` = '$menu_item' AND `Special_dish` ='0'" );   
                 while ($item_res = mysqli_fetch_array($item_menu) ) { ?>
                   
                 <div class="single-menu">
                    <img src="admin/images/<?php echo $item_res['images']; ?>" alt="">
                    <div class="menu-content">
                        <h5><?php echo $item_res['ingridient']; ?><span>&#8377; <?php echo $item_res['price']; ?></span></h5>
                        <p><?php echo $item_res['Description']; ?></p>
                    </div>
                 </div>

                 <?php } ?>
            </div>
            <?php } ?>
       <!-- <a href="" class="full-view">View Full menu</a> -->
        </div>

        <div class="popup-img-menu">
            <span>&times;</span>
            <img src="images/img1.jpg" alt="">
        </div>
    </div>

    <!-- Animation On Scroll Start -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <script>
        document.querySelector('.select-click').onclick = () =>{
            document.querySelector('.select-container').style.display="flex";
        }
    </script>
    <!-- Animation On Scroll end -->
    
    <script src="js/index.js"></script>
</body>
</html>