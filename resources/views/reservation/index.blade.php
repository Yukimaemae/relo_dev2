<html>
<head>
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
                  <li><a href="">LogOut</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>   
      
 <div class="main">      
    
<div id="app" style="margin-left: 80px;">
    <div class="p-3">
        <div class="btn-group mb-4">
            <button type="button" class="btn btn-outline-secondary" @click="moveDate(-1)">&lt;</button>
            <button type="button" class="btn btn-outline-secondary" v-text="date"></button>
            <button type="button" class="btn btn-outline-secondary" @click="moveDate(1)">&gt;</button>
        </div>
        <div class="mb-5" v-for="charger in chargers" >
            <h2>
                <span class="badge rounded-pill bg-info text-dark" v-text="charger.name">Info</span>
            </h2>
            <div v-for="hours in allHours" >
                <div class="row" style=" display: flex; flex-wrap: wrap;">
                    <div class="col-auto pr-5 py-2" style="margin-right:20px;">
                        Time <span v-text="getPaddedNumber(hours)"></span>
                    </div>
                    <div class="col-auto p-2" v-for="minutes in charger.time_step_values">
                        <button
                            class="btn btn-outline-dark"
                            data-toggle="tooltip"
                            :title="getTimeRange(hours, minutes, charger.time_steps)"
                            v-text="getPaddedNumber(minutes)"
                            :disabled="!isReservationAvailable(charger.id, hours, minutes)"
                            @click="reserve(charger.id, hours, minutes)">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>

<script src={{asset('https://unpkg.com/vue@3.0.11/dist/vue.global.prod.js')}}></script>
<script src={{asset('https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js')}}></script>
<script src={{asset('https://cdnjs.cloudflare.com/ajax/libs/luxon/1.27.0/luxon.min.js')}}></script>
<script src={{asset('https://code.jquery.com/jquery-3.5.1.slim.min.js')}}></script>
<script src={{asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js')}}></script>
<script src={{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js')}}></script>
<script>

    Vue.createApp({
        data() {
            return {
                reservations: [],
                allHours: [],
                dt: null,
                chargers: @json($chargers),
            }
        
        },
        methods: {
            getReservations() {

                const date = this.dt.toFormat('yyyy-MM-dd');
                const url = '{{ route('reservation.reservation_list') }}?date='+ date;

                axios.get(url)
                    .then(response => {

                        this.reservations = response.data.reservations;

                    });

            },
            getPaddedNumber(number) {

                return number.toString().padStart(2, '0'); // ゼロ埋めして必ず２ケタにする

            },
            getTimeRange(hours, minutes, timeSteps) {

                const startDt = this.dt.set({
                    hours: hours,
                    minutes: minutes
                })
                const endDt = startDt.plus({ minutes: timeSteps });
                return startDt.toFormat('H:mm') +' 〜 '+ endDt.toFormat('H:mm') +' reservation';

            },
            isReservationAvailable(chargerId, hours, minutes) {

                const today = luxon.DateTime.now().startOf('day');

                if(this.dt < today) {

                    return false;

                }

                const dt = this.dt.set({
                    hours: hours,
                    minutes: minutes
                })
                const startsAt = dt.toFormat('yyyy-MM-dd HH:mm:00');
                const hasReservation = this.reservations.some(reservation => { // 指定した条件が存在してたらtrue

                    return (
                        parseInt(reservation.charger_id) === parseInt(chargerId) &&
                        reservation.starts_at === startsAt
                    )

                });

                return !hasReservation;

            },
            moveDate(days) {

                this.dt = this.dt.plus({
                    days: days
                });

            },
            reserve(chargerId, hours, minutes) {

                if(confirm('Make reservation?')) {

                    const dt = this.dt.set({
                        hours: hours,
                        minutes: minutes
                    });

                    const url = '{{ route('reservation.store') }}';
                    const params = {
                        charger_id: chargerId,
                        start_at: dt.toFormat('yyyy-MM-dd HH:mm')
                    };
                    axios.post(url, params)
                        .then(response => {

                            if(response.data.result === true) {

                                this.getReservations();

                            }

                        });

                }

            }
        },
        computed: {
            date() {

                if(this.dt) {

                    return this.dt.toFormat('yyyy/MM/dd');

                }

                return '';

            }
        },
        watch: {
            dt() {

                this.getReservations();

            }
        },
        mounted() {

            for(let i = 0 ; i < 24 ; i++) {

                this.allHours.push(i);

            }

            this.dt = luxon.DateTime.now().startOf('day');

            Vue.nextTick(() => {

                $('[data-toggle="tooltip"]').tooltip({
                    placement: 'right'
                });

            });

        }
    }).mount('#app');

</script>

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