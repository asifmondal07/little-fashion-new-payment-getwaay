<?php
session_start();
include 'database_connect.php';
                            
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
                                if (isset($_SESSION["user-id"])) {
                                    $userID = $_SESSION["user-id"];
                                    
                                         
                                    
                                           
                                            // Fetch cart contents
                                            $result = mysqli_query($conn, "SELECT * FROM `shoppingcart` WHERE user_id=$userID");

                                            // Check if there are items in the cart
                                            if (mysqli_num_rows($result) > 0) {
                                                $totalAmount = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $price = $row['product_price'];
                                                    $totalAmount = $row['total-price'];
                            
                                echo'
                                <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                    <img src="admin/'.$row["product_image"].'" class="img-fluid col-lg-9 product-image" alt="">
                                </div>

                                <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                                    <h3 class="modal-title" id="exampleModalLabel">'. $row["product_name"].'</h3>

                                    <p class="product-price text-muted mt-3">$'. $price.'</p>

                                    <label for="Quatity:">Quatity: </label>
                                    

                                    <span class="m-2 quantity">'.$row["quantity"].'</span>
                                    
                                    
                                    
                                    
                                    <div class="border-top mt-4 pt-3">
                                        <p class="product-p"><strong>Total: <span class="ms-1">'.$totalAmount.'</span></strong></p>
                                    </div>
                                    

                                </div>';
                                                
                                    }
                                      

                                      
                                }
                                // Fetch total amount user have in the cart
                                $query = "SELECT SUM(`total-price`) AS `totalpay` FROM `shoppingcart` WHERE `user_id`=$userID";
                                $result1 = mysqli_query($conn, $query);
                        
                                $totalpay = 0; // Default value in case of no rows or query failure
                                if ($result1) {
                                    $row2 = mysqli_fetch_assoc($result1);
                                    if ($row2 && $row2['totalpay'] !== null) {
                                        $totalpay = $row2['totalpay'] ?? 0;
                                        $_SESSION['totalpay']=$totalpay;
                                    }
                                }
                                echo'<div class="border-top mt-4 pt-3">
                                        <p class="product-p"><strong>Total: <span class="ms-1"> '.$totalpay .'</span></strong></p>
                                    </div>';
                                
                            }
                        }
                        
?>