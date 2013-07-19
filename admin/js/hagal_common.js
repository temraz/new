/* [ ---- Hagal Admin - common js ---- ] */

    $(function() {
        //* sidebar
        hagal_jpanel.init();
        
        //* menu
        hagal_menu.init();
        hagal_menu.mobile_nav();

        // accordion
        hagal_accordion.init();
        
        //* scroll to top
        hagal_scroll_top.init();
        
        //* style switcher
        hagal_styles.init();
        
    });

    //* get text without DOM element from node
    jQuery.fn.justtext=function(){return $.trim($(this).clone().children().remove().end().text())};

    //* avoid 'console' errors in browsers that lack a console
    if (!(window.console && console.log)) {
        (function() {
            var noop = function() {};
            var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'markTimeline', 'table', 'time', 'timeEnd', 'timeStamp', 'trace', 'warn'];
            var length = methods.length;
            var console = window.console = {};
            while (length--) {
                console[methods[length]] = noop;
            }
        }());
    }

    //* detect touch devices 
    function is_touch_device() {
        return !!('ontouchstart' in window);
    };
    
    //* browser detect
    jQuery.browser = {};
    jQuery.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase());
    jQuery.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
    jQuery.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
    jQuery.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());
    
    //* menu
    hagal_menu = {
        init: function() {
            
            // toggle 'toogle_active' class ( on show/hide )
            $('#side_menu .accordion-body').on('show',function() {
                $(this).closest('.accordion-group').addClass('toggle_active');
            }).on('hide',function() {
                $(this).closest('.accordion-group').removeClass('toggle_active');
            });
            
            // sub-level menu
            $('#side_menu .accordion-inner li > ul').addClass('sub_level');
            $('.sub_level').prev('a').on('click',function(e){
                e.preventDefault();
                var $this = $(this),
                    this_sublevel = $this.next('.sub_level');
                if(this_sublevel.hasClass('hide')) {
                    this_sublevel.removeClass('hide');
                } else {
                    this_sublevel.addClass('hide')
                }
                $this.children('i').toggleClass('elusive-icon-chevron-up elusive-icon-chevron-down');
            }).prepend('<i class="elusive-icon-chevron-down sub_level_icon" />');
            
            // open active menu section on page load (if <li> element has class 'current' )
            var current = $('#side_menu li.current');
            if(current.length) {
                current.each(function() {
                    var this_current = $(this);
                    if(this_current.closest('ul').hasClass('sub_level')) {
                        this_current.closest('ul').prev('a').trigger('click');
                    }
                    this_current.closest('.accordion-group').find('.accordion-toggle').trigger('click');
                })
            };
            
            // add 'toogle_active' class (if accordion body has class 'in')
            $('#side_menu .accordion-body.in').each(function() {
                $(this).closest('.accordion-group').addClass('toggle_active');
            });
            
        },
        mobile_nav: function() {
            //* create <ul> element from side accordion
            var navSelect = $('<ul/>').appendTo('#mobileNav');
            $('#side_menu .accordion-group').each(function(){
                var elList = $(this).find('.accordion-inner').children('ul').clone(),
                    optHeading = $(this).find('.accordion-toggle').justtext(),
                    optGroup = navSelect.append('<li><a href="#">'+optHeading+'</a></li>');
                    optGroup.children('li').filter(':last-child').append(elList)
            })
            //* create mobile menu from ^ <ul> element
            $('#mobileNav > ul').tinyNav({
                header: '-- Navigation --'
            }).remove();
        }
    }
    
    //* sidebar (jPanel)
    hagal_jpanel = {
        init: function() {
            
            //* show sidebar on page load if "hagal_side_jpanel" is set to true 
            if ($('body').hasClass('jPanel_active')) {
                $.cookie("hagal_side_jpanel","true")
            }
            
            var jPM = $.jPanelMenu({
                menu: '#jpanel_side',
                trigger: '.jpanel-trigger',
                direction: 'right',
                openPosition: '240px',
                closeOnContentClick: false,
                keyboardShortcuts: [
                    {
                        code: 27, /* Escape Key */
                        open: false,
                        close: true 
                    },{
                        code: 37, /* Left Arrow Key */
                        open: true,
                        close: false 
                    },{
                        code: 39, /* Right Arrow Key */
                        open: false,
                        close: close 
                    }
                ],
                afterOpen: function() {
                    $.cookie("hagal_side_jpanel","true")
                },
                afterClose: function() {
                    $.removeCookie("hagal_side_jpanel")
                }
            });
            
            jPM.on();
            
            var cookie_jpanel = $.cookie("hagal_side_jpanel");
            if(cookie_jpanel != undefined) {
                jPM.open(false);
            }; 
            
            $('.jpanel_close').on('click',function() {
                jPM.close(true);
            })
            
        }
    };
    
    //* accordion callback on show/hide
    hagal_accordion = {
        init: function() {
            if($('#content .accordion').length) {
                $('#content .accordion').each(function() {
                    $(this).find('.accordion-group').each(function(){
                        $(this).find('.accordion-toggle').prepend('<i class="icon-chevron-left"/>')
                        $(this).find('.accordion-body').filter('.in').closest('.accordion-group').addClass('acc-in');
                        $(this).find('.accordion-body').filter('.in').prev('.accordion-heading').find('.accordion-toggle').children('i').toggleClass('icon-chevron-left icon-chevron-down');
                        
                        $(this).find('.accordion-body').on('show', function(option) {
                            $(option.target).closest('.accordion-group').addClass('acc-in');
                            $(option.target).prev('.accordion-heading').find('.accordion-toggle').children('i').removeClass('icon-chevron-left').addClass('icon-chevron-down');
                        });
                        
                        $(this).find('.accordion-body').on('hide', function(option) {
                            $(option.target).closest('.accordion-group').removeClass('acc-in');
                            $(option.target).prev('.accordion-heading').find('.accordion-toggle').children('i').addClass('icon-chevron-left').removeClass('icon-chevron-down');
                        });
                        
                    });
                })
            }
        }
    };

    //* scroll to top
    hagal_scroll_top = {
        init: function() {
            $('body').append('<div id="nav_up" style="cursor:pointer;z-index:1000;font-size:16px;display:none;position:fixed;bottom:8px;right:14px"><i class="elusive-icon-chevron-up"></i></div>');

            $('#nav_up').click(
                function (e) {
                    $('html, body').animate({scrollTop: '0px'}, 800);
                }
            );

           	$(window).scroll(function() {
                if ( $(window).scrollTop() > 200 ) {
                    $('#nav_up').fadeIn('400');
                } else {
                    $('#nav_up').fadeOut('400');
                }
            });
            
        }
    };
    
    //* style switcher
    hagal_styles= {
        init: function() {
            $('body').append('<div id="styleSwitcher"/>');
            $('#styleSwitcher').append('<a title="blue" class="style_active" href="javascript:void(0)" style="background:#168cbe"></a><a title="brown" href="javascript:void(0)" style="background:#9c5100"></a><a title="green" href="javascript:void(0)"style="background:#319a31"></a><a title="orange" href="javascript:void(0)" style="background:#ef9608"></a><a title="red" href="javascript:void(0)" style="background:#e71401"></a><a title="lteal" href="javascript:void(0)" style="background:#01aaad"></a>');
            $('#styleSwitcher a').on('click',function() {
                var $color = $(this).attr('title');
                $('#styleSwitcher a').removeClass('style_active');
                $(this).addClass('style_active');
                $('#theme').attr('href','css/'+$color+'.css');
                $.cookie("hagal_theme",$color);
            });
            var cookie_theme = $.cookie("hagal_theme");
            if(cookie_theme != undefined) {
                $('#styleSwitcher a').removeClass('style_active');
                $('#styleSwitcher a[title="' + cookie_theme + '"]').addClass('style_active');
                $('#theme').attr('href','css/'+cookie_theme+'.css');
            };
            
        }
    }