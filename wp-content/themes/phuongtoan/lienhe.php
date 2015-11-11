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
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
var gmap = new google.maps.LatLng(10.780426, 106.625133);
var marker;
function initialize()
{
    var mapProp = {
         center: gmap,
         zoom:16,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
 
    var map=new google.maps.Map(document.getElementById("googleMap")
    ,mapProp);
 
  var styles = [
    {
      featureType: 'road.arterial',
      elementType: 'all',
      stylers: [
        { hue: '#fff' },
        { saturation: 100 },
        { lightness: -48 },
        { visibility: 'on' }
      ]
    },{
      featureType: 'road',
      elementType: 'all',
      stylers: [
 
      ]
    },
    {
        featureType: 'water',
        elementType: 'geometry.fill',
        stylers: [
            { color: '#adc9b8' }
        ]
    },{
        featureType: 'landscape.natural',
        elementType: 'all',
        stylers: [
            { hue: '#809f80' },
            { lightness: -35 }
        ]
    }
  ];
 
  var styledMapType = new google.maps.StyledMapType(styles);
  map.mapTypes.set('Styled', styledMapType);
 
  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: gmap
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
}
 
function toggleBounce() {
 
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
 
google.maps.event.addDomListener(window, 'load', initialize);
</script>
			<div id="googleMap" style="width: 400px; height: 270px;">Google Map</div>
		</div>
	</div>
</div>	
	

<?php get_footer(); ?>
