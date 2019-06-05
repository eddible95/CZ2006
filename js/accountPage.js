//Switching of Tabs
jQuery(document).ready(function () {
    jQuery('.tabs .tabLinks a').on('click', function (e) {
        var currentAttrValue = jQuery(this).attr('href');
// Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
// Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
        e.preventDefault();
        
    });
});

//Setting the right active tab in account page
$(document).ready(function () {
    $('.nav li').click(function(e) {

        $('.nav li').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
        //e.preventDefault();
    });
});
