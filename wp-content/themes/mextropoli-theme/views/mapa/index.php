<style>
    .current-type {
        background-color: #F6F6F6;
    }
    .active {
        display: flex !important;
    }
</style>

<!-- M A P A -->
<section class="mapa" id="app">

    <!-- B a n n e r -->
    <div class="banner-mapa">
        <div class="grid__container">
            <div class="banner-mapa__box-titulo">
                <h2 class="banner-mapa__titulo">Mapa</h2>
            </div>
        </div>
    </div>

    <!-- M A P A -->
    <div class="mapa-sedes" style="width: 100%; height: 400px;">
        <div class="mapa-sedes__contenedor">
            <div id="map"></div>
        </div>
    </div>

    <!-- F i l t r o s -->
    <div class="filtros">
        <div class="grid__container">
            <div class="filtros__contenedor">
                <p class="filtros__label">Filtrar por:</p>
                <div class="filtros__row">
                    <div class="filtros__tipos">
                        <ul>
                            <li v-for="type in orderedTypes">
                                <a :class="{'current-type': isActive(type.term_id)}" @click="selectType(type.term_id)">
                                    <span :style="{ backgroundColor: type.color }"></span>
                                    {{ type.name }}
                                </a>
                            </li>
                            <li>
                                <a :class="{'current-type': isActive(-1)}" @click="selectType(-1)">
                                    Todas
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- L o o p   s e d e s -->
    <div class="loop-sedes">
        <div class="grid__container">
            <div class="loop-sedes__container">
                <h4 class="loop-sedes__titulo" v-text="title"></h4>
                <div class="loop-sedes__row">
                    <div class="loop-sedes__card" v-for="venue in filteredVenues" :key="venue.ID" @click="openModal(venue)">
                        <div class="loop-sedes__card--title" v-text="venue.title"></div>
                        <ul v-if="eventsByVenue(venue.ID).length != 0">
                            <li v-for="event in eventsByVenue(venue.ID)" :key="event.ID" v-text="event.title"></li>
                        </ul>
                        <div class="none" v-if="eventsByVenue(venue.ID).length == 0">
                            No hay eventos registrados en esta sede.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal-programa">
        <div :class="{active: modalOpen}" class="closeModal">
            <div class="modal-programa__contenido" v-if="modalOpen">

                <button class="cerrar-modal" @click="closeModal">X</button>

                <div class="column-one modal-sedes">

                    <div class="modal-programa__destacada" v-if="modal.venue.thumbail_img">
                        <img class="modal-programa__destacada--img" :src="modal.venue.thumbail_img.src_medium" alt="">
                    </div>

                    <div class="modal-programa__title-event">
                        {{ modal.venue.title }}
                    </div>

                    <div class="modal-programa__hour-event">
                        {{ modal.venue.address }}
                    </div>


                    <a class="boton-sedes" :href="'<?php echo BLOGURL ?>/programa?sede=' + modal.venue.slug">Ir a actividades en esta sede</a>

                    <a class="boton-sedes" href="<?php echo BLOGURL ?>/programa">Ir a programa</a>

                    <a class="boton-sedes" href="<?php echo BLOGURL ?>/expositores">Ir a expositores</a>

                </div>

                <div class="column-two modal-sedes">
                    <div id="modal-map" style="height: 400px;"></div>

                    <a class="boton-sedes" @click="closeModal">Ir a todas las sedes</a>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
function initMap(){

    const google = window.google

    const store = {
        events: <?php echo json_encode($events); ?>,
        venues: <?php echo json_encode($venues); ?>,
        types:  <?php echo json_encode($types); ?>,
    }

    const initialTypeId = <?php echo json_encode(getInitialValue($types, 'slug', 'tipo-de-sede', 'term_id')); ?>

    const modalInitialState = {
        venue: {}
    }

    var map
    var modalMap

    var myOptions = {
        zoom: 12,
        zoomControl: true,
        center: {lat: 19.4332306, lng: -99.1359455},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var icon = {
        path: google.maps.SymbolPath.CIRCLE,
        scale: 8,
        fillColor: 'black',
        fillOpacity: 1,
        strokeWeight: 0
    }

    new Vue({
        el: '#app',
        data: {
            store: store,
            selectedTypeId: initialTypeId,
            modal: modalInitialState,
            modalOpen: false,
            markers: []
        },
        mounted() {

            // Element mounted.
            this.initializeMap()

            jQuery(document).click(event => {
                //if you click on anything except the modal itself close the modal
                if (jQuery(event.target).hasClass('closeModal')) {
                    this.closeModal()
                }
            })

            // Show venue that is in hash.
            if(window.location.hash) {
                var initialSlug = window.location.hash.replace('#', '')
                var venue = this.store.venues.find(venue => venue.slug == initialSlug)

                if(venue){
                    this.openModal(venue)
                }
            }
        },
        computed: {
            orderedTypes() {
                return R.sortBy(type => type.order)(this.store.types)
            },
            filteredVenues() {
                if(this.selectedTypeId === -1){
                    return this.store.venues
                }

                return this.store.venues.filter(event => event.type_id === this.selectedTypeId)
            },
            title() {
                if(this.selectedTypeId === -1){
                    return 'Sedes'
                }

                return this.selectedType.name
            },
            selectedType () {
                return this.store.types.find(type => type.term_id === this.selectedTypeId)
            }
        },
        watch: {
            filteredVenues() {
                // Remove marker from map.
                this.markers.forEach(marker => {
                    marker.setMap(null)
                })

                // Reinitialize array
                this.markers = []

                // Add new markers
                this.addMarkers()
            },
            selectedTypeId() {
                var url = removeParam('tipo-de-sede')

                if(this.selectedTypeId != -1){
                    url = insertParam('tipo-de-sede', this.selectedType.slug)
                }

                history.pushState({}, "", url)
            }
        },
        methods: {
            openModal(venue){
                this.modal.venue = venue

                // Set the hash.
                window.location.hash = venue.slug;

                // Open the modal
                this.modalOpen = true

                Vue.nextTick(() => {
                    this.initializeModalMap(this.modal.venue)
                })
            },
            closeModal(){
                this.modal = modalInitialState

                // Unset the hash.
                window.location.hash = '';

                // Open the modal
                this.modalOpen = false
            },
            initializeModalMap(venue) {
                var myLatlng = new google.maps.LatLng(venue.coords[0], venue.coords[1])

                // Set the center where the pin is.
                myOptions.center = myLatlng

                modalMap = new google.maps.Map(document.getElementById("modal-map"), myOptions)

                icon.fillColor = venue.color

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: modalMap,
                    icon: icon
                })

                var content = '<div>'+
                    venue.title + '<br>' +
                    '&mdash; <br>' +
                    venue.address + '<br>' +
                    '</div>'

                var infowindow = new google.maps.InfoWindow({
                    content: content
                })

                marker.addListener('click', function() {
                    infowindow.open(modalMap, marker)
                })
            },
            initializeMap() {
                map = new google.maps.Map(document.getElementById("map"), myOptions)

                this.addMarkers()
            },
            addMarkers(){
                this.filteredVenues.forEach(venue => {

                    var myLatLng = new google.maps.LatLng(venue.coords[0], venue.coords[1])

                    icon.fillColor = venue.color

                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        title: venue.title,
                        icon: icon,
                    })

                    var content = '<div>'+
                        venue.title + '<br>' +
                        '&mdash; <br>' +
                        venue.address + '<br>' +
                        '</div>'

                    var infowindow = new google.maps.InfoWindow({
                        content: content
                    })

                    marker.addListener('click', function() {
                        infowindow.open(map, marker)
                    })

                    this.markers.push(marker)
                })
            },
            selectType(id){
                this.selectedTypeId = id
            },
            isActive(id) {
                return this.selectedTypeId === id
            },
            eventsByVenue(id) {
                return this.store.events.filter(event => event.venue_id === id)
            }
        }
    })

}
</script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ramda/0.26.1/ramda.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_KEY; ?>&callback=initMap" async defer></script>
<script src="<?php echo THEMEURL; ?>js/helpers.js"></script>
