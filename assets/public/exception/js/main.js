jQuery(document).ready(function ($) {
    $('.change-color').click(function (e) {
        var $this = $(this),
                $parent = $this.parents('.product-item'),
                price = $this.data('price'),
                image = $this.data('image'),
                url = $this.data('url'),
                sale = $this.data('sale');
        $('.product-image img', $parent).attr('src', image);
        $('.price-box', $parent).html(price);
        $('.product-colors li', $parent).removeClass('active');
        $('.btn-design a', $parent).attr('href', url);
        if (parseInt(sale) > 0) {
            $('.product-sale', $parent).html('<span class="discount">' + sale + '% </span>');
        } else {
            $('.product-sale', $parent).html('');
        }
        $this.parent().addClass('active');
    });
});