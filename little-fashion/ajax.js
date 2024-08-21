
$(document).ready(function(){

    // Function to fetch and display customer's first name
    function showCustomerFirstName() {
        $.ajax({
            url: 'getFirstName.php',
            type: 'GET',
            success: function(response) {
                $('#customer-first-name').text(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Call the function on page load
    showCustomerFirstName();

    //show totalcard

    function showTotalCard() {
            $.ajax({
                url: "total-cart.php",
                type: "POST",
                success: function(response) {
                    $('#total_product').text(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
    }
        showTotalCard();


            //click bag icon show modal
            function ShowBagcart(){
                    $.ajax({
                        url: "modal.php",
                        type: "POST",
                        success: function(data) {
                            $("#modal_row").html(data);
                        }
                    });
                // });
            }
            ShowBagcart();

                //remove cart

            $(document).on("click", ".remove-cart", function() {
            var cartId = $(this).data("cart-id");

            $.ajax({
                url: "remove_from_cart.php",
                type: "POST",
                data: { cartID: cartId },
                success: function(response) {
                    console.log(response);
                    if (response == 1) {
                        ShowBagcart();
                        showTotalCard();
                    } else {
                        alert("Failed to remove product from cart.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("An error occurred while processing your request. Please try again later.");
                }
            });
        });
            

        // Decrease button click event
    $(document).on("click",".dicrease-btn",function(){
        var cartId = $(this).attr('id');
        var quantityElement = $(this).next('.quantity');
        var quantity = parseInt(quantityElement.text()) - 1;
        if(quantity >= 1) {
            updateQuantity(cartId, quantity, quantityElement);
        }
    });

    // Increase button click event
    $(document).on("click",".increase-btn",function(){
        var cartId = $(this).attr('id');
        var quantityElement = $(this).prev('.quantity');
        var quantity = parseInt(quantityElement.text()) + 1;
        if(quantity<=10){
            updateQuantity(cartId, quantity, quantityElement);
        }
        
    });

    // Function to update quantity via AJAX
    function updateQuantity(cartId, quantity, quantityElement) {
        $.ajax({
            url: 'update_quantity.php',
            type: 'POST',
            data: {
                cart_id: cartId,
                quantity: quantity
            },
            success: function(response) {
                console.log(response);
                // Update quantity in the DOM
                quantityElement.text(quantity);
                ShowBagcart();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error
            }
        });
    }

    //function checkout btn
    $(document).on("click","#check-btn",function(){
        
        function CartDataFetch(){
            $(".close").click();
            $("#check-modal").click();
            $.ajax({
                url:"checkout.php",
                type: "POST",
                success: function(data){
                    $('#modal_check').html(data);
                }
            })
        }
        CartDataFetch();
        
    });

    //details fetch

    $(document).on("click","#details-btn",function(){
        
        OpenPaymentModal();
        // function Detailsfetch(){

        //     $(".closeed").click();
        //     $("#address-modal").click();
        // }
        // Detailsfetch();
    });

            //address form
        
    $(document).on("click","#address-btn",function(e) {
        e.preventDefault(); // Prevent form submission
        
        // Get form data
        var formData = $("#address-form").serialize();
        
        
            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: 'address-form.php', 
                data: formData,
                success: function (response) {
                    
                    alert(response);
                    
                    if(response.trim() === "success"){
                        $("#address-form")[0].reset();
                        openPaymentModal();
                    }
                    
                },
                error: function (xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        
        
    });

    //address EDIT Modal

    // $(document).on("click","#add-edit",function(){

    // })

    

    //payment Modal

    //function OpenpaymentModal
    
        // $(document).on("click","#address-btn",function(){
            function OpenPaymentModal(){
                $(".closeed").click();

                $(".closset").click();
                $("#pay-modal").click();
                $.ajax({
                    url:"pay-form.php",
                    type: "POST",
                    success: function(data){
                        $('#modal_payment').html(data);
                    }
                })
            };
            
        // })
}); 
