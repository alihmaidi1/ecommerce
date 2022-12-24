@include("site.include.header")
@section('js')
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYWxpaG1haWRpIiwiYSI6ImNreHAybTNlZDZxdzAzMW11NGticDNnYnoifQ.6YwanSEBY47k3Lhm4VxeQQ';
const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
mapboxClient.geocoding
.forwardGeocode({
query: " {{ \App\models\setting::find(1)->address }}",
autocomplete: false,
limit: 1
})
.send()
.then((response) => {
if (
!response ||
!response.body ||
!response.body.features ||
!response.body.features.length
) {
console.error('Invalid response:');
console.error(response);
return;
}
const feature = response.body.features[0];
 
const map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: feature.center,
zoom: 10
});
 
// Create a marker and add it to the map.
new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
});
</script>

@endsection
<!-- app -->
<div id="app">
@include("site.include.navbar")
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>{{ __("messages.Contact") }}</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.Contact") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>



<div class="page-contact u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="touch-wrapper">
                    <h1 class="contact-h1">{{ __("messages.Get In Touch With Us") }}</h1>
                        <div class="group-inline u-s-m-b-30">
                            <div class="group-1 u-s-p-r-16">
                                <label for="contact_name">{{ __("messages.Your Name") }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="text"  id="contact_name" name="name" class=" text-field" placeholder="{{ __("messages.Name") }}">
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong id="contact_name_message"></strong>
                                </span>
                
                             </div>
                            <div class="group-2">
                                <label for="contact_email">{{ __("messages.Your Email") }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="contact_email"  name="email" class=" text-field" placeholder="{{ __("messages.Email") }}">
                                <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                    <strong id="contact_email_message"></strong>
                                </span>
                
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="contact_subject">{{ __("messages.Subject") }}
                                <span class="astk">*</span>
                            </label>
                            <input type="text"  name="subject" id="contact_subject" class=" text-field" placeholder="{{ __("messages.Subject") }}">
                            <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                <strong id="contact_subject_message"></strong>
                            </span>
            
                        
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="contact_message">{{ __("messages.Message:") }}</label>
                            <textarea class=" text-area" name="content" id="contact_message"></textarea>
                            <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
                                <strong id="contact_message_message"></strong>
                            </span>
            
                        </div>
                        <div class="u-s-m-b-30">
                            <button onclick="send_contact()" class="button button-outline-secondary">{{ __("messages.Send Message") }}</button>
                        </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="information-about-wrapper">
                    <h1 class="contact-h1">Information About Us</h1>
                    <p>
                        {{ __("messages.in this section you can write anything you want to send to managment and your suggest and your opinion about the web site or if you have any problem") }}
                    </p>
                </div>
                <div class="contact-us-wrapper">
                    <h1 class="contact-h1">Contact Us</h1>
                    <div class="contact-material u-s-m-b-16">
                        <h6>{{ __("messages.Location") }}</h6>
                        <span>{{ \App\Models\setting::find(1)->address }}</span>

                    </div>
                    <div class="contact-material u-s-m-b-16">
                        <h6>{{ __("messages.Email") }}</h6>
                        <span>{{ \App\Models\setting::find(1)->email }}</span>
                    </div>
                    <div class="contact-material u-s-m-b-16">
                        <h6>{{ __("messages.Telephone") }}</h6>
                        <span>{{ \App\Models\setting::find(1)->phone }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="u-s-p-t-80">
        <div id="map"></div>
    </div>
</div>
<!-- Contact-Page /- -->







</div>
@include("site.include.footer1")
@include("site.include.footer")
