/* [ ---- Hagal Admin - tooltips ---- ] */

    $(function() {
        // tooltips
        hagal_tooltips.ptip();
        // popovers
        hagal_popover.init();
    });

    // tooltips
    hagal_tooltips = {
        //* powertip tooltips
        ptip: function() {
            if($.isFunction($.fn.powerTip)){
                $.fn.powerTip.defaults.smartPlacement = true;
                if($('.ptip_n').length) {
                    $('.ptip_n').powerTip({
                        placement: 'n'
                    })
                }
                if($('.ptip_e').length) {
                    $('.ptip_e').powerTip({
                        placement: 'e'
                    })
                }
                if($('.ptip_s').length) {
                    $('.ptip_s').powerTip({
                        placement: 's'
                    })
                }
                if($('.ptip_w').length) {
                    $('.ptip_w').powerTip({
                        placement: 'w'
                    })
                }
                if($('.ptip_nw').length) {
                    $('.ptip_nw').powerTip({
                        placement: 'nw'
                    })
                }
                if($('.ptip_ne').length) {
                    $('.ptip_ne').powerTip({
                        placement: 'ne'
                    })
                }
                if($('.ptip_sw').length) {
                    $('.ptip_sw').powerTip({
                        placement: 'sw'
                    })
                }
                if($('.ptip_se').length) {
                    $('.ptip_se').powerTip({
                        placement: 'se'
                    })
                }
            }
        }
    };

    //* popovers
    hagal_popover = {
        init: function() {
            if($('.pop-over').length) {
                $('.pop-over').popover();
            }
        }
    };