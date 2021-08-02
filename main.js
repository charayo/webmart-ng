(function ($) {
    
    
    // check to view product
    let productClickedId;
    $('body').on('click', (e) => {
        if (e.target.classList.contains('checkBtn')) {
            
            console.log(e.target.getAttribute('id'));
            productClickedId = e.target.getAttribute('id');
            // window.location.href = '/webmart-ng/product-page.php';
            // console.log('product ');
            // $.post('./product-page.php', {
            //     id: ($(this).attr('id'))
            // }, function(res) {
            //     console.log(res);
            //     // window.location.href = "products-files.php";    
            // })                   
        } else if (e.target.classList.contains('prodImg')) {
            // getProductBtn();
        }
        // e.preventDefault()
    })

    //-------------------------------------
    /*Things to do
    make the minus work
    make the minus btn active after plus
    update all for logged in user.
    make all pages links active
    optimize your code
    */
})(jQuery);