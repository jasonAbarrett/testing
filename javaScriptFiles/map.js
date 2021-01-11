
    
    function initMap() { 
        
        var mad = { lat: 43.0731, lng: -89.4012 };
        var mid = { lat: 43.0972, lng: -89.5043 };

        var options = {
            zoom:12,
            center: mad,
        }

        // new map 
        var map = new google.maps.Map(document.getElementById('map'), options);

        //listen for click on map
        google.maps.event.addListener(map, 'click', 
          //add marker
          function(event){
             addMarker({coords:event.latLng});

        });



        //create array of markers 
        var markers = [
          {
            coords:{ lat: 43.0731, lng: -89.4012  },
            iconImage: 'http://maps.google.com/mapfiles/kml/pushpin/purple-pushpin.png',
            content:  '<p>Madison WI</p>'
          }, 
          {coords:{ lat: 43.0972, lng: -89.5043  }, 
          iconImage: 'http://maps.google.com/mapfiles/kml/shapes/schools.png',
          content: '<p>Middleton WI</p>'
        }, 
        {coords:{ lat: 42.9908, lng: -89.5332  },
        content: '<p>Verona WI</p>'
      }
        ];



        //loop through markers 
        for(var i = 0; i < markers.length; i++){
          //add marker
          addMarker(markers[i]);
        };


 

        // add marker function 
        function addMarker(props) {
        var marker = new google.maps.Marker({
            position: props.coords,
            map: map,   
            //icon: props.iconImage
          });
          
          //check for custom icon
          if(props.iconImage) {
            // set icon image
            marker.setIcon(props.iconImage);
          }

          //check content 
          if(props.content) {
              var infowindow = new google.maps.InfoWindow({
              content: props.content
            });
      
            marker.addListener("click", function() {
                infowindow.open(map, marker);
              });
            }



        }



    }



