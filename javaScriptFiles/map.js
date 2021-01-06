
    
    function initMap() { 
        
        var mad = { lat: 43.0731, lng: -89.4012 };
        var mid = { lat: 43.0972, lng: -89.5043 };

        var options = {
            zoom:12,
            center: mad,
        }

        // new map 
        var map = new google.maps.Map(document.getElementById('map'), options);


        // add marker
        var marker = new google.maps.Marker({
            position: mid,
            map: map,   
            icon: 'http://maps.google.com/mapfiles/kml/pushpin/purple-pushpin.png'
          });
        

        
          var infowindow = new google.maps.InfoWindow({
          content:  '<p>Middleton WI</p>'
        });
      
        marker.addListener("click", function() {
            infowindow.open(map, marker);
          });
        





    }



