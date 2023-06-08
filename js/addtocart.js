function qtySelector(){
    var qty = $('.qty-selector input').val();
    $('.qty-up').on('click',function(){
        qty++;
        $('.qty-selector input').attr('value',qty);
    });
    $('.qty-down').on('click',function(){
        qty--;
        if(qty >= 0){
        $('.qty-selector input').attr('value',qty);
        }
    });
};
qtySelector();