<?php
session_start();
include 'database_connect.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
    $totalamount =$_SESSION['totalpay'];
    $user_name=$_SESSION["user-name"];
    $userID=$_SESSION["user-id"];
    $user_email=$_SESSION["user-email"];
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's Little Fashion - Products</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">
                        <strong><span>Little</span> Fashion</strong>
                    </a>

                    <div class="d-lg-none">
                        <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                        <a href="product-detail.php" class="bi-bag custom-icon"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="about.php">Story</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="products.php">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="faq.php">FAQs</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <?php
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
                              echo '<div>Welcome back, <span id="customer-first-name"></span>-><a href="customer-profile.php " class="profile bi-person custom-icon me-3"></a></div>

                              <a href="logut.php" class="btn btn-outline-danger me-3">Logout</a>
                              <a href="product-cart.php" class="bi-bag custom-icon" data-bs-toggle="modal" data-bs-target="#cart-modal"><span id="total_product"></span></a>';  
                            }
                            else{
                                echo'<a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                                <a href="sign-in.html" class="bi-bag custom-icon"></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">Choose your</span>
                                <span class="d-block text-dark">favorite stuffs</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>
            <section class="products section-padding">
                <div class="container-fluid">
                    <div class="col-md-12 ">
                        <div class="row">
                            
                            <div class="col-12">
                                <h2 class="mb-5">New Arrivals</h2>
                            </div>

            <?php
            $result=mysqli_query($conn,"SELECT * FROM product");
            while($row=mysqli_fetch_assoc($result)){     
            echo'
                        
                            <div class="col-lg-4 col-12 mb-4">
                                <div class="product-thumb">
                                    <a href="product-detail.php?image_id=' . $row["sno"] . '">
                                        <img src="admin/'.$row["image"]. '" class="img-fluid product-image">
                                    </a>

                                    <div class="product-top d-flex">
                                        <span class="product-alert me-auto">New Arrival</span>

                                        <a href="#" class="bi-heart-fill product-icon"></a>
                                    </div>

                                    <div class="product-info d-flex">
                                        <div>
                                            <h5 class="product-title mb-0">
                                                <a href="product-detail.php?image_id=' . $row["sno"] . '" class="product-title-link">'.$row["pname"]. '</a>
                                            </h5>

                                            <p class="product-p">Original package design from house</p>
                                        </div>

                                        <small class="product-price text-muted ms-auto">$'.$row["price"]. '</small>
                                    </div>
                                </div>
                            </div>';
            }
            ?>
            
                    </div>
                </div>
            </div>
        </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">Little</a> Fashion</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little Fashion</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.php" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <!-- CART MODAL -->
        <div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header flex-column">
                            <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row" id="modal_row">
                                
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="row w-50">
                                <button type="button" id="check-btn" class="btn custom-btn cart-btn ms-lg-4">Checkout</button>
                            </div>
                        </div>
                        
                    </div>

                </div>
                
            </div>
           
           
            <button type="button" id="check-modal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout-modal" style="display:none"></button>


            <!-- CheckOut MODAL -->

            <div class="modal fade" id="checkout-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0">
                            <div class="modal-header flex-column">
                                <button type="button" class="btn-close closeed" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row" id="modal_check">        
                                </div>
                            </div>
                            
                            
        
                            <div class="modal-footer">
                                <div class="row w-50">
                                    <button type="button" id="details-btn" class="btn custom-btn cart-btn ms-lg-4">Place Order</button>
                                </div>
                            </div>

                            
                        
                        </div>
                    </div>
            </div>
            
            <button type="button" id="address-modal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#details-modal" style="display:none"></button>

            <!-- customer details form -->
            
            <div class="modal fade" id="details-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0">
                            <div class="modal-header flex-column">
                                <button type="button" class="btn-close closset" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row" id="modal_check"> 

                                    <h2 >Fill UP ALL DETAILS </h2>

                                    <form id="address-form" role="form" method="post">
                                        <div class="form-floating">
                                            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enetr Full Name" required>

                                            <label for="email">Full Name</label>
                                        </div>
                                        <div class="form-floating my-4">
                                            <input type="text" name="ph_number" id="ph_number" class="form-control" placeholder="Enetr Phone Number" required>

                                            <label for="email">Phone Number</label>
                                        </div>  

                                        <div class="form-floating my-4">
                                            <input type="text" name="address" id="address"  class="form-control" placeholder="Enter Address" required>
                                            
                                            <label for="email">Address</label>
                                        </div>    
                            
                                    </form> 

                                </div>
                            </div>
        
                            <div class="modal-footer">
                                <div class="row w-50">
                                    <button type="button" id="address-btn" class="btn custom-btn cart-btn ms-lg-4">Process Continue</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
            </div>

            <button type="button" id="pay-modal" class="btn btn-primary btn-bg" data-bs-toggle="modal" data-bs-target="#payment-modal" style="display:none"></button>

                <!-- Payment Modal -->

            <div class="modal fade" id="payment-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0">
                            <div class="modal-header flex-column">
                                <button type="button" class="btn-close closses" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row" id="modal_payment">        
                                </div>
                            </div>
        
                            <div class="modal-footer">
                                <div class="row w-50">
                                    <button type="button" id="rzp-button1" class="btn custom-btn cart-btn ms-lg-4">Pay Now</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
            </div>




<?php
      $keyId = "rzp_test_TyuozklHpoUdRi"; // Replace with your Key ID from Razorpay Dashboard
       // Replace with your total amount
      $order_id = "order_IluGWxBm9U8zJ8"; // Replace with your order ID from Step 1

      $data = [
          "key" => $keyId,
          "amount" => $totalamount * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
          "currency" => "INR",
          "name" => "Acme Corp",
          "description" => "Test transaction",
          "image" => "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
          "prefill" => [
              "name" => $user_name,
              "email" => $user_email,
              "contact" => $userID,
          ],
          "notes" => [
              "address" => "Razorpay Corporate Office",
              "merchant_order_id" => "12312321",
          ],
          "theme" => [
              "color" => "#3399cc"
          ],
          // "order_id" => $order_id, // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
      ];
      
      
      $json = json_encode($data);
  ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="ajax.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
                

                var options = <?php echo $json; ?>;

                var rzp1 = new Razorpay(options);
                document.getElementById('rzp-button1').onclick = function(e) {
                    rzp1.open();
                    e.preventDefault();
                }
                                
        </script>

    </body>
</html>
