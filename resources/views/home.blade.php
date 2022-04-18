<!DOCTYPE html>

  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style-rtl.css') }}" rel="stylesheet">


<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>ReLO my page</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicons/favicon.ico')}}">
    <!--   
    Stylesheets
    =============================================
    
    -->
     <!-- Default stylesheets-->
     <link href="{{ asset('assets/lib/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="{{ asset('assets/lib/animate.css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/components-font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/et-line-font/et-line-font.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/flexslider/flexslider.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owl.carousel/dist/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/simple-text-rotator/simpletextrotator.css')}}" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link id="color-scheme" href="{{ asset('assets/css/colors/default.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    

    
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
              <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
              <a class="navbar-brand" href="{{ url('/home') }}">ReLO</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
  


         
              <li class="dropdown"><a class="dropdown-toggle" href="" data-toggle="dropdown">Reservation</a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="">Make Reservation</a></li>
                  <li><a href="">Check Reservation</a></li>

                </ul>
              </li>

              <li class="dropdown"><a class="dropdown-toggle" href="" data-toggle="dropdown">Your information</a>
                <ul class="dropdown-menu">
                  <li><a href="">Change Information</a></li>
                  <li><a href="">Your History</a></li>
                  <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      

       


      <div class="main">


    <div id="app" class="p-4">
    <h2 class="font-serif large-text" style="text-align: center;">Our Charging Spots </h2>
    <div class="p-4">
        <h3 class="font-serif large-text" style="text-align: center;">Please choose your destination</h3>
    </div class="col-sm-6">
    <div id="map" style="width:100%;height:300px;border:1px solid #000;"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>

    new Vue({
        el: '#app',
        data() {
            return {
                chargers: [],
                markers: [],
                location: {
                    longitude: '139.76367245432536',
                    latitude: '35.67929368459595',
                },
                map: null
            }
        },
        methods: {
            getchargers() {

                const url = '{{ route('charger.list') }}';
                const params = {
                    params: this.location
                };
                axios.get(url, params)
                    .then(response => {

                        if(response.data.result === true) {

                            this.chargers = response.data.chargers;
                            this.setMarkers();

                        }

                    });

            },
            setMarkers() {

                this.markers.forEach(marker => this.map.removeLayer(marker));
                this.markers = [];

                this.chargers.forEach(charger => {

                    const location = [charger.latitude, charger.longitude];
                    const marker = L.marker(location).addTo(this.map)
                        .bindPopup(`<a href="${charger.map_url}" target="_blank">Googleマップで表示</a><p>
                        <a href="/reservation">予約する</a> `)
                        .bindTooltip(`${charger.name}（${charger.address}）`);
                    this.markers.push(marker);

                });

            },
            setCenter(e) {

                const center = e.target.getCenter();
                this.location = {
                    latitude: center.lat,
                    longitude: center.lng
                };

            }
        },
        watch: {
            location: {
                deep: true,
                immediate: true,
                handler() {

                    Vue.nextTick(() => {

                        this.getchargers();

                    });

                }
            }
        },
        mounted() {

            // マップを用意
            this.map = L.map('map', {
                zoomAnimation: false
            }).setView([ this.location.latitude, this.location.longitude ], 13);
            const layerUrl = 'https://cyberjapandata.gsi.go.jp/xyz/pale/{z}/{x}/{y}.png';
            const attribution = '<a href="https://www.gsi.go.jp/kikakuchousei/kikakuchousei40182.html" target="_blank" rel="noopener">国土地理院</a>';
            L.tileLayer(layerUrl, { attribution: attribution }).addTo(this.map);
            this.map
                .on('moveend', e => {

                    this.setCenter(e);

                })
                .on('zoomend', e => {

                    this.setCenter(e);

                });

        }
    });

</script>

	 <div class="container">
	   
        <div class="card-body">
            <div class="card-body" style="width:100%;height:300px;">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>Your Charging History</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <!-- 投稿タイトル -->
                                <td class="table-text">
                                    <div>{{ $reservation->id }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $reservation->starts_at }}</div>
                                </td>
                                 <!-- 投稿詳細 -->
                                <td class="table-text">
                                    <div>Charging Payment : $30</div>
                                </td>
				 <!-- 投稿者名の表示 -->
                                <td class="table-text">
                                    <div></div>
                                </td>
 				<!-- お気に入りボタン -->
                                <td class="table-text">
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    
	 </div>


    <footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright">&copy; 2022&nbsp; ReLO, All Rights Reserved</p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>


	<script src="{{asset('https://code.jquery.com/jquery-3.5.1.js')}}" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>  
    <script src="{{ asset('assets/lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/lib/wow/dist/wow.js')}}"></script>
    <script src="{{ asset('assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js')}}"></script>
    <script src="{{ asset('assets/lib/isotope/dist/isotope.pkgd.js')}}"></script>
    <script src="{{ asset('assets/lib/imagesloaded/imagesloaded.pkgd.js')}}"></script>
    <script src="{{ asset('assets/lib/flexslider/jquery.flexslider.js')}}"></script>
    <script src="{{ asset('assets/lib/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/lib/smoothscroll.js')}}"></script>
    <script src="{{ asset('assets/lib/magnific-popup/dist/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>


        </body>
        </html> 
 