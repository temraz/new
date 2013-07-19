/* [ ---- Hagal Admin - google maps ---- ] */

    //* ie8 fix (https://github.com/HPNeo/gmaps/issues/195)
    if(jQuery.browser.msie)
        Array.prototype.indexOf||(Array.prototype.indexOf=function(d){if(null==this)throw new TypeError;var c=Object(this),b=c.length>>>0;if(0===b)return-1;var a=0;1<arguments.length&&(a=Number(arguments[1]),a!=a?a=0:0!=a&&(Infinity!=a&&-Infinity!=a)&&(a=(0<a||-1)*Math.floor(Math.abs(a))));if(a>=b)return-1;for(a=0<=a?a:Math.max(b-Math.abs(a),0);a<b;a++)if(a in c&&c[a]===d)return a;return-1});

    $(document).ready(function() {
        //* google maps
        hagal_gmaps.m_basic();
        hagal_gmaps.m_street_view();
        hagal_gmaps.m_markers();
        hagal_gmaps.m_static();
        hagal_gmaps.m_route();
    });

    //* google maps
    hagal_gmaps = {
        m_basic: function() {
            if($('#gmap_basic').length) {
                map_basic = new GMaps({
                    el: '#gmap_basic',
                    lat: 48.853057,
                    lng: 2.349743,
                    zoom: 17,
                    zoomControl : true,
                    zoomControlOpt: {
                        style : 'SMALL',
                        position: 'TOP_LEFT'
                    },
                    panControl : false,
                    streetViewControl : false,
                    mapTypeControl: false,
                    overviewMapControl: false
                });
            }
        },
        m_street_view: function() {
            if($('#gmap_street').length) {
                GMaps.createPanorama({
                    el: '#gmap_street',
                    lat : 53.349069,
                    lng : -6.259812
                });
            }
        },
        m_markers: function() {
            if($('#gmap_markers').length) {
                map_markers = new GMaps({
                    el: '#gmap_markers',
                    lat: 51.500902,
                    lng: -0.124531
                });
                map_markers.addMarker({
                    lat: 51.497714,
                    lng: -0.12991,
                    title: 'Westminster',
                    details: {
                        // You can attach additional information, which will be passed to Event object (e) in the events previously defined.
                    },
                    click: function(e){
                        alert('You clicked in this marker');
                    },
                    mouseover: function(e){
                        console.log(e);
                    }
                });
                map_markers.addMarker({
                    lat: 51.500891,
                    lng: -0.123347,
                    title: 'Westminster Bridge',
                    infoWindow: {
                        content: '<div class="infoWindow_content"><p>Westminster Bridge is a road and foot traffic bridge over the River Thames...</p><a href="http://en.wikipedia.org/wiki/Westminster_Bridge" target="_blank">wikipedia</a></div>'
                    }
                });
            }
        },
        m_static: function() {
            if($('#gmap_static').length) {
                if(window.devicePixelRatio >= 2) {
                    var img_scale = '&scale=2'
                        background_size = 'background-size: 640px 640px;';
                } else {
                    var img_scale = '',
                    background_size = '';
                }
                url = GMaps.staticMapURL({
                    size: [640, 640],
                    lat: 48.858271,
                    lng: 2.294264,
                    zoom: 16
                });
                $('#gmap_static').append('<span class="gmap-static" style="height:100%;display:block;background: url('+url+img_scale+') no-repeat 50% 50%;'+background_size+'"><img src="'+url+'" style="visibility:hidden" alt="" /></span>');
            }
        },
        m_route: function() {
            if($('#gmap_route').length) {
                map_route = new GMaps({
                    div: '#gmap_route',
                    lat: 41.890633,
                    lng: 12.493619
                });
                $('#start_route').click(function(e){
                    $(this).remove();
                    e.preventDefault();
                    map_route.travelRoute({
                        origin: [41.890633, 12.493619],
                        destination: [41.900488, 12.501301],
                        travelMode: 'driving',
                        step: function(e) {
                            $('#gmap_route_instructions').append('<li style="display:none">'+e.instructions+'</li>');
                            $('#gmap_route_instructions li:eq(' + e.step_number + ')').delay(1000 * e.step_number).fadeIn(200, function() {
                                map_route.setCenter(e.end_location.lat(), e.end_location.lng());
                                map_route.drawPolyline({
                                    path: e.path,
                                    strokeColor: '#2F4F4F',
                                    strokeOpacity: 0.8,
                                    strokeWeight: 6
                                });  
                            });
                        }
                    });
                })
            }
        }
    };