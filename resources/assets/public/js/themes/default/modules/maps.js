var Maps = function() {
    $.cssHooks.backgroundColor = {
        get: function(elem) {
            if (elem.currentStyle)
                var bg = elem.currentStyle["backgroundColor"];
            else if (window.getComputedStyle)
                var bg = document.defaultView.getComputedStyle(elem, null).getPropertyValue("background-color");
            if (bg.search("rgb") == -1)
                return bg;
            else {
                bg = bg.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                function hex(x) {
                    return ("0" + parseInt(x).toString(16)).slice(-2);
                }
                return "#" + hex(bg[1]) + hex(bg[2]) + hex(bg[3]);
            }
        }
    }
    this.colors = {
        primary: $('#map-primary-color').css("backgroundColor"),
        secondary: $('#map-secondary-color').css("backgroundColor"),
        water: $('#map-water-color').css("backgroundColor"),
        road: $('#map-road-color').css("backgroundColor"),
        text: $('#map-text-color').css("backgroundColor")
    }
    this.options = {
        zoom: 16,
        backgroundColor: 'hsla(0, 0%, 0%, 0)',
        panorama_div: '#street-panorama-element',
        panorama_overlay_div: '#street-panorama-element-na',
        unitSystem: 'imperial'
    };
    this.defaults = {
        map: {
            zoomControlOpt: {
                position: 'LEFT_BOTTOM'
            },
            zoom: this.options.zoom,
            streetViewControl: false,
            scrollwheel: false,
            mapTypeControl: false,
            backgroundColor: this.colors.primary
        },
        icons: {
            home: '',
            mark: '',
            pin: ''
        }
    };
    this.setMapStyle = function(map) {
        map.addStyle({styledMapName: 'Default Style', styles: this.style, mapTypeId: 'default'});
        map.setStyle('default');
    };
    /**
     * Refresh Map
     *
     * @param obj
     * @param zoom
     */
    this.refresh = function(obj, zoom) {
        $(obj.map.el).height($(obj.map.el).parent().height());
        obj.map.refresh();
        obj.map.fitLatLngBounds(obj.bounds);
        if (zoom) {
            obj.map.setZoom(this.options.zoom);
        }
        if (obj.panorama) {
            obj.panorama.setVisible(true);
        }
    };
    /**
     * Add Boundary
     *
     * @param obj
     * @param lat
     * @param lng
     */
    this.addBoundary = function(obj, lat, lng) {
        var latlng = new google.maps.LatLng(lat, lng);
        obj.bounds.push(latlng);
    };
    // this.ListingsView = {
    //     /**
    //      * Bounds
    //      */
    //     bounds: [],
    //     /**
    //      * Parent Object
    //      */
    //     parent: this,
    //     /**
    //      * Init
    //      *
    //      * @param id
    //      * @param listings
    //      * @returns {*}
    //      */
    //     init: function(id, listings) {
    //         // console.log(listings);
    //         // Init GMap
    //         this.map = new GMaps(Object.assign({
    //             div: id,
    //             lat: listings[0].latitude,
    //             lng: listings[0].longitude,
    //             click: function(e) {
    //                 that.goToPanorama(e.latLng, true);
    //             }
    //         }, this.parent.defaults.map));
    //         // Set Map Style
    //         this.parent.setMapStyle(this.map);
    //         for(var i in listings) {
    //             this.addMarker(listings[i]);
    //         }
    //     },
    //     addMarker: function(listing) {
    //         var img = listing.photo;
    //         var price = (listing.price) ? formatCurrency(listing.price) : 'N/A';
    //         var sqft = (listing.sqft) ? formatCurrency(listing.sqft, '') : 'N/A';
    //         var beds = (listing.beds) ? listing.beds : 'N/A';
    //         var baths = (listing.baths) ? listing.baths : 'N/A';
    //         var contentString = '<div class="google-map-window">' + '<span class="label status ' + status + ' label-info">' + listing.status + '</span>' + '<span class="label price label-info">' + price + '</span>' + '<img src="' + img + '" /><br>' + '<div class="address-label">' + listing.address + ' ' + listing.city + ' ' + listing.zip + '</div><hr>' + '<div class="section-bottom beds">' + beds + '<br><span>Beds</span></div>' + '<div class="section-bottom baths">' + baths + '<br><span>Baths</span></div>' + '<div class="section-bottom beds">' + sqft + '<br><span>SQFT</span></div>' + '<div class="clearfix"></div>' + '<a class="btn btn-default btn-sm btn-block" href="' + listing.url + '">View Property</a>' + '</div>';
    //         this.map.addMarker({
    //             lat: listing.latitude,
    //             lng: listing.longitude,
    //             icon: BlankMarker(),
    //             title: listing.status + ' - ' + listing.address,
    //             infoWindow: {
    //                 content: contentString
    //             }
    //         });
    //         var status = listing.status.replace(/\s+/g, '-').toLowerCase();
    //         this.map.drawOverlay({
    //             lat: listing.latitude,
    //             lng: listing.longitude,
    //             content: '<div id="listing' + listing.id + '" class="icon-marker listings-map map-marker ' + status + '"><i class="fa fa-map-marker"></i></div>'
    //         });
    //         // Immediately add location to bounds
    //         this.parent.addBoundary(this, listing.latitude, listing.longitude);
    //         this.map.fitLatLngBounds(this.bounds);
    //     }
    // };
    this.StreetView = {
        /**
         * Bounds
         */
        bounds: [],
        /**
         * Parent Object
         */
        parent: this,
        /**
         * Init
         *
         * @param id
         * @param lat
         * @param lng
         * @returns {*}
         */
        init: function(id, lat, lng) {
            // Set Access to `this`
            var that = this;
            // Init StreetView Service for Panorama Locations
            this.svs = new google.maps.StreetViewService();
            // Immediately add location to bounds
            this.parent.addBoundary(this, lat, lng);
            // Init GMap
            this.map = new GMaps(Object.assign({
                div: id,
                lat: lat,
                lng: lng,
                click: function(e) {
                    that.goToPanorama(e.latLng, true);
                }
            }, this.parent.defaults.map));
            // Set Map Style
            this.parent.setMapStyle(this.map);
            $(this.parent.options.panorama_div).removeClass('no-view');
            // Create Panorama
            this.panorama = this.map.createPanorama({
                el: this.parent.options.panorama_div,
                lat: lat,
                lng: lng,
                backgroundColor: 'hsla(0, 0%, 0%, 0)',
                zoomControlOpt: {
                    position: 'LEFT_BOTTOM'
                },
                enableCloseButton: false,
                linksControl: false,
                scrollwheel: false
            });
            this.map.addMarker({
                lat: lat,
                lng: lng,
                icon: BlankMarker(),
                click: function(e) {
                    that.panorama.setPosition(e.position);
                }
            });
            this.map.drawOverlay({lat: lat, lng: lng, content: '<div class="icon-marker listing-marker home"><i class="fa fa-home"></i></div>'});
            return this;
        },
        /**
         * Go To Panorama
         *
         * @param latLng
         * @param marker
         */
        goToPanorama: function(latLng, marker) {
            // Set Access to `this`
            var that = this;
            that.svs.getPanorama({
                location: latLng,
                radius: 20
            }, function(e, status) {
                if (status == 'OK') {
                    $(that.parent.options.panorama_div).removeClass('no-view');
                    // $(that.parent.options.panorama_overlay_div).fadeOut('fast');
                    // console.log(that.parent.options.panorama_div);
                    that.panorama.setPano(e.location.pano);
                    if (marker) {
                        that.map.addMarker({
                            lat: e.location.latLng.lat(),
                            lng: e.location.latLng.lng(),
                            icon: BlankMarker(),
                            click: function(e) {
                                that.goToPanorama(e.position);
                            }
                        });
                        that.map.drawOverlay({lat: e.location.latLng.lat(), lng: e.location.latLng.lng(), content: '<div class="icon-marker street-map street-view"><i class="fa fa-street-view"></i></div>'});
                    }
                } else {
                    $(that.parent.options.panorama_div).addClass('no-view');
                    // console.log('no');
                }
            });
        }
    };
    this.LifestyleView = {
        parent: this,
        bounds: [],
        addresses: [],
        cookieKey: "saved-addresses",
        init: function(id, lat, lng) {
            // $(id).parent().find('.maploader').show();
            this.lat = lat;
            this.lng = lng;
            this.parent.addBoundary(this, lat, lng);
            this.map = new GMaps(Object.assign({
                div: id,
                lat: lat,
                lng: lng,
                width: '100%'
            }, this.parent.defaults.map));
            this.map.addMarker({
                lat: lat, lng: lng,
                // icon: this.parent.defaults.icons.home
                icon: BlankMarker(),
                click: function() {
                    // alert('Test!');
                }
            });
            this.map.drawOverlay({lat: lat, lng: lng, content: '<div class="icon-marker listing-marker home"><i class="fa fa-home"></i></div>'});
            // Set Map Style
            // -------------------------------------------
            this.parent.setMapStyle(this.map);
            this.loadSavedAddresses();
            // $(id).parent().find('.maploader').fadeOut();
            return this;
        },
        add: function(name, address) {
            if (name != "" && address != "") {
                this.addAddressToMap(name, address);
            } else if (!name) {
                alert('Please name the location.')
            } else {
                alert('Please add the address of the location.')
            }
        },
        addAddressToMap: function(name, address, position, fromCookie) {
            var that = this;
            if (position) {
                render(position.lat, position.lng, fromCookie);
            } else {
                GMaps.geocode({
                    address: address,
                    callback: function(results, status) {
                        if (status == 'OK') {
                            var latlng = results[0].geometry.location;
                            render(latlng.lat(), latlng.lng());
                        }
                    }
                });
            }
            function render(lat, lng, fromCookie) {
                that.map.drawRoute({
                    origin: [
                        that.lat, that.lng
                    ],
                    destination: [
                        lat, lng
                    ],
                    travelMode: 'driving',
                    strokeOpacity: 0,
                    strokeWeight: 0,
                    provideRouteAlternatives: true,
                    unitSystem: 'imperial',
                    drivingOptions: {
                        departureTime: new Date(),
                        trafficModel: google.maps.TrafficModel.PESSIMISTIC
                    },
                    callback: function(results) {
                        var marker = that.map.addMarker({
                            lat: lat,
                            lng: lng,
                            draggable: false,
                            icon: BlankMarker(),
                            animation: 'drop',
                            click: function(e) {
                                that.calculateAndDisplayRoute(e);
                            },
                            infoWindow: {
                                content: '<div class="google-map-window lifestyle"><h5>' + name + '<br><small>' + address + '</small></h5><p>It is <strong>' + results.legs[0].distance.text + '</strong>' + ' away from here.<br> It is a <strong>' + results.legs[0].duration.text + '</strong>' + ' drive away.</p>' + '<button class="btn btn-danger btn-block" id="delete_address" data-address="' + name + '"><i class="fa fa-close"></i> Remove From All Maps</button></div>',
                                domready: function() {
                                    $("#delete_address").click(function() {
                                        that.map.removeMarker(marker);
                                        that.map.removeOverlay(overlay);
                                        that.map.cleanRoute();
                                        that.addresses = that.addresses.filter(function(el) {
                                            return el.name !== name;
                                        });
                                        $.cookie(that.cookieKey, JSON.stringify(that.addresses), {path: "/"});
                                    })
                                }
                            }
                        });
                        var overlay = that.map.drawOverlay({lat: lat, lng: lng, content: '<div class="icon-marker lifestyle-marker map-marker"><i class="fa fa-map-marker"></i></div>'});
                        that.saveAddress({
                            name: name,
                            address: address,
                            position: {
                                lat: lat,
                                lng: lng
                            }
                        }, fromCookie);
                        that.parent.addBoundary(that, lat, lng);
                        that.map.fitLatLngBounds(that.bounds);
                    }
                });
            }
        },
        saveAddress: function(location, fromCookie) {
            this.addresses.push(location);
            if (!fromCookie) {
                $.cookie(this.cookieKey, JSON.stringify(this.addresses), {path: "/"});
            }
        },
        loadSavedAddresses: function() {
            var loaded = $.cookie(this.cookieKey);
            if (loaded) {
                var list = JSON.parse(loaded);
                for (var i in list) {
                    this.addAddressToMap(list[i].name, list[i].address, list[i].position, true);
                }
            }
        },
        calculateAndDisplayRoute: function(marker) {
            this.map.cleanRoute();
            this.map.drawRoute({
                origin: [
                    this.lat, this.lng
                ],
                destination: [
                    marker.position.lat(), marker.position.lng()
                ],
                travelMode: 'driving',
                strokeColor: this.parent.colors.secondary,
                strokeOpacity: 0.6,
                strokeWeight: 6,
                provideRouteAlternatives: true,
                drivingOptions: {
                    departureTime: new Date(),
                    trafficModel: google.maps.TrafficModel.PESSIMISTIC
                }
            });
        }
    };
    this.YelpView = {
        parent: this,
        image: 'https://cdn.agentimpress.me/admin/img/no-image.png',
        bounds: [],
        map: null,
        init: function(id, lat, lng) {
            this.id = id;
            this.lat = lat;
            this.lng = lng;
            this.map = new GMaps(Object.assign({
                div: id,
                lat: lat,
                lng: lng,
                width: '100%'
            }, this.parent.defaults.map));
            // Set Map Style
            this.parent.setMapStyle(this.map);
            this.map.addMarker({lat: lat, lng: lng, icon: BlankMarker()});
            this.map.drawOverlay({lat: lat, lng: lng, content: '<div class="icon-marker yelp-map home"><i class="fa fa-home"></i></div>'});
            this.parent.addBoundary(this, lat, lng);
            this.getData();
            return this;
        },
        getData: function() {
            var that = this;
            $.ajax({
                type: "POST",
                url: "/yelp/json",
                data: {
                    yelpLL: $("#yelp-latlng").val(),
                    yelpLocation: $("#yelp-location").val(),
                    yelpLimit: $("#yelp-limit").val(),
                    yelpTerm: $("#yelp-term").val(),
                    yelpSort: 1
                },
                dataType: "JSON",
                success: function(jsonStr) {
                    var yelpdata = jsonStr;
                    that.map.removeMarkers();
                    that.map.removeOverlays();
                    that.map.addMarker({lat: that.lat, lng: that.lng, icon: BlankMarker()});
                    that.map.drawOverlay({lat: that.lat, lng: that.lng, content: '<div class="icon-marker listing-marker"><i class="fa fa-home"></i></div>'});
                    yelpdata.forEach(function(data) {
                        that.addMarker(data);
                    });
                    $(that.id).parent().find('.maploader').fadeOut();
                }
            });
        },
        addMarker: function(item) {
            var img = (item.image_url)
                ? item.image_url
                : this.image;
            var latlng = new google.maps.LatLng(item.location.coordinate.latitude, item.location.coordinate.longitude);
            var contentString = '<div class="google-map-window yelp row">' +
            '<div class="col-xs-4" ><img class="img-rounded img-responsive yelp-img" src="' + img + '" /></div>' + '<div class="col-xs-8" ><address>' + '<strong><a href="' + item.url + '" target="_blank">' + item.name + '</a></strong><br>' + item.location.display_address[0] + '<br>' + item.location.display_address[1] + '<br>' + '<abbr title="Phone">P:</abbr>' + item.display_phone + '</address>' + '<img src="' + item.rating_img_url + '" class="yelp-rating" /></div>' + '<div class="col-sm-12 quote">' + '<h5>Latest Review</h5>' + '<i>"' + item.snippet_text + '"</i>' + '</div><div class="clearfix" ></div>' + '</div>';
            this.map.addMarker({
                lat: latlng.lat(),
                lng: latlng.lng(),
                icon: BlankMarker(),
                title: item.name,
                infoWindow: {
                    content: contentString
                }
            });
            this.map.drawOverlay({
                lat: latlng.lat(),
                lng: latlng.lng(),
                content: '<div class="icon-marker yelp-marker marker-' + (Math.floor(Math.random() * 10) + 1) + '"><i class="fa fa-yelp"></i></div>'
            });
            this.bounds.push(latlng);
            this.map.fitLatLngBounds(this.bounds);
        }
    };
    this.style = [
        {
            "featureType": "all",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": this.colors.text
                }, {
                    "lightness": 10
                }
            ]
        }, {
            "featureType": "all",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "on"
                }, {
                    "color": this.colors.primary
                }, {
                    "lightness": 25
                }, {
                    "weight": 3
                }
            ]
        }, {
            "featureType": "all",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": this.colors.primary
                }, {
                    "lightness": 75
                }
            ]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": this.colors.primary
                }, {
                    "lightness": 25
                }, {
                    // "weight": 1.2
                }
            ]
        }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": this.colors.primary
                }, {
                    "lightness": 0
                }
            ]
        }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": this.colors.primary
                }, {
                    "lightness": 21
                }
            ]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": this.colors.road
                }, {
                    "lightness": 60
                }
            ]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        }, {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": this.colors.road
                }, {
                    "lightness": 50
                }
            ]
        }, {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": this.colors.road
                }, {
                    "lightness": 50
                }
            ]
        }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": this.colors.road
                }, {
                    "lightness": 40
                }
            ]
        }, {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": this.colors.water
                }, {
                    "lightness": 0
                }
            ]
        }
    ];
};
function BlankMarker() {
    var image = 'https://cdn.agentimpress.me/resources/default/assets/img/blank_map_icon.png';
    return {
        url: image,
        size: new google.maps.Size(30, 30),
        anchor: new google.maps.Point(15, 15)
    }
}
