<div class="container infraestrutura" id="infraestrutura">
	<h1 class="text-center mb-4">Infraestrutura</h1>

	<div class="row mb-5">
		<div class="col-12 col-lg-6">
			<div id="map"></div>
		</div>

		<div class="col-12 col-lg-6">
			<p><span>Local: </span>CENACON - Hotel Nacional Inn</p>
			<p><span>Endereço: </span>Av. Getúlio Vargas, 2330 - Recreio São Judas Tadeu, São Carlos - SP, 13571-271</p>
			<p><span>Telefone: </span>(16) 3363-0200</p>

			<a href="https://drive.google.com/open?id=1yvlvvhe2VqQQr-qTyIewgB9J4Yhgz9AK" target="_blank">
				<button type="button" class="btn btn-primary"><i class="fas fa-arrow-circle-down"></i> Hotéis, Táxis e Restaurantes</button>				
			</a>
		</div>
	</div>	
</div>

<script>
  function initMap() {
    var uluru = {lat: -22.0358584, lng: -47.8701406};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 17,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqg43-3D-GvpudhaLobCBf4GRrJUOMTIs&callback=initMap">
</script>
