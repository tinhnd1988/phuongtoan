<?php
/*
/*
/* Template Name: Lien He
/*
*/
get_header();
?>

<div id="lienhe-page-content">
	<div class="lienhe-page">
		<div class="Left_page">
			<div class="lien_he_page">
				<span class="name_cty">Công ty tnhh sản xuất thương mại quảng cáo phương toàn</span><br>
				<span>ĐT: 08 3606 2577 / 0905 333 188</span><br>
				<span>Email: phuongtoan.vn@gmail.com</span>
			</div>
			<?php 
				$id=23; 
				$post = get_post($id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;  
			?>
		</div>
		<div class="right_page">
			<script type="text/javascript" src="http://www.google.com/jsapi?key={APIKEY}"></script>
<script type="text/javascript">
    google.load("jquery", "1.4.2");   
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript"> 
    zoommap = 16;
    poslong =  10.765974;
    poslat = 106.689422;
    var map; // global var to store the google map
    var centerCoord = new google.maps.LatLng(poslat,poslong); // Estadio Santiago Bernabeu, Madrid
    var browserDetectedLocation = null;
    // global variables used throughout the js functionality
    var markersArray = [];
    var infoWindow = new google.maps.InfoWindow({});


    function setLocation()
    {
        // try to get user location via W3C standard Geolocation in browsers or via Google Gears
        if(navigator.geolocation) 
        {
            navigator.geolocation.getCurrentPosition(function(position) 
            {
                blueIcon = "http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png";
                browserDetectedLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
                map.setCenter(browserDetectedLocation);
                
                var marker = new google.maps.Marker({
                      position: browserDetectedLocation, 
                      map: map, 
                      title: 'You are here',
                      icon: blueIcon,
                      zIndex: 0
                });
                //addMarker(browserDetectedLocation,'You are here!');
                $('#home-messages').text("Location detected. Please wait...");
            }, function() {
             // error getting location, though supported
                $('#home-messages').text("Your location cannot be detected.");
            });
        } else if (google.gears) 
        // if location not found using W3C standard try with Google Gears if browser supports it
        {
            var geo = google.gears.factory.create('beta.geolocation');
            geo.getCurrentPosition(function(position) 
            {
                blueIcon = "http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png";
                browserDetectedLocation = new google.maps.LatLng(position.latitude,position.longitude);
                map.setCenter(browserDetectedLocation);
                var marker = new google.maps.Marker({
                      position: browserDetectedLocation, 
                      map: map, 
                      title: 'You are here',
                      icon: blueIcon,
                      zIndex: 0
                });
                
                //addMarker(browserDetectedLocation,'You are here!');
                $('#home-messages').text("Location detected. Please wait...");
            }, function() {
                // error getting location, though supported
                $('#home-messages').text("Your location cannot be found.");
            });
        } 
        else    
        {
            // Browser doesn't support Geolocation
            $('#home-messages').text("Your location cannot be found.");
        }   
    }

    function InitMap(options, mapIdentifier, defaultLocation, detectLocation)
    { // function to initialize map
        var settings = // json variable for default settings
        {
            zoom: zoommap,
            center: defaultLocation,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        if (options!=null) settings = options; // if no options provided, start the map with default settings
        map = new google.maps.Map(document.getElementById(mapIdentifier), settings);
            
        map.setCenter(defaultLocation);
        if(detectLocation==true) setLocation(); // try to get user location via W3C standard Geolocation in browsers or via Google Gears
        else
        {
            $('#home-messages').text("Click an office on the left to view its location.");
        }
        // idle - This event is fired when the map becomes idle after panning (dragging moving etc) or zooming
        /*google.maps.event.addListener(map, 'idle', function() {
            clearOverlays();
          });
        */
        
        return map;
    }
    function addMarker(m_position,m_title,m_infowindow) {
    var markerAdded = false;
    var mark;

    if (markersArray.length!=0) 
    {
        duplicate = false;
        var markcopy;
        var markersCopy = [];
        while(markcopy=markersArray.pop())
        {
            if((markcopy.position.lat()==m_position.lat())&&(markcopy.position.lng()==m_position.lng())) duplicate = true;
            markersCopy.push(markcopy);
        }
        markersArray = markersCopy;
        if(duplicate==false)
        {
            marker = new google.maps.Marker({
                position: m_position,
                map: map,
                title: m_title
            });
            markersArray.push(marker);
            mark = markersArray.pop();
            google.maps.event.addListener(mark, 'click', function() {
                infoWindow.open(map,mark);
                var stringContent = m_infowindow;
                infoWindow.setContent("<div id=\"infowin-overlay\""+stringContent+"</div>");

                overlayHeight = $('#infowin-overlay').height();
                overlayWidth = $('#infowin-overlay').width();
                $('#infowin-overlay').parent().css('height',overlayHeight);
                $('#infowin-overlay').parent().css('width',overlayWidth);
            });
            markersArray.push(mark);
        }
    }
    else
    {
        marker = new google.maps.Marker({
            position: m_position,
            map: map,
            title: m_title
        });
        markersArray.push(marker);
        mark = markersArray.pop();
        google.maps.event.addListener(mark, 'click', function() {
            infoWindow.open(map,mark);
            var stringContent = m_infowindow;
            infoWindow.setContent("<div id=\"infowin-overlay\""+stringContent+"</div>");

            overlayHeight = $('#infowin-overlay').height();
            overlayWidth = $('#infowin-overlay').width();
            $('#infowin-overlay').parent().css('height',overlayHeight);
            $('#infowin-overlay').parent().css('width',overlayWidth);
        });
        markersArray.push(mark);
    }
}
    function handle_clicks()
    {
        $('#home-sidebar a').each(function(){
            var coordString = $(this).attr('rel');
            var coordTitle = $(this).text();
            var coordArray = coordString.split(',');
            var update2Location = new google.maps.LatLng(coordArray[0],coordArray[1]);
            map.setCenter(update2Location);
            addMarker(update2Location,coordTitle,coordArray[2]);
            
            $('#home-messages').text("Viewing: "+coordTitle);
        });
    }

    $(document).ready(function(){

        if($('#map').get(0))
        { // only initialize the map if map is located inside the page
            map = InitMap(null,'map', centerCoord, true); // initialize the map on default location
            handle_clicks();
        }    
    });
</script>
			<div class="map" >
                <div id="map"></div>
            </div>
		</div>
	</div>
</div>	
	

<?php get_footer(); ?>
