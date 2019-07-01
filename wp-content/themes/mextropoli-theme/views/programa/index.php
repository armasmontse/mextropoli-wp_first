<style>
    .active {
        display: flex !important;
    }
</style>

<!-- P R O G R A M A -->
<section class="programa" id="app">

    <!-- B a n n e r -->
    <div class="banner-programa">
        <div class="grid__container">
            <div class="banner-programa__box-titulo">
                <h2 class="banner-programa__titulo">Programa</h2>
            </div>
        </div>
    </div>

    <!-- F i l t r o s   p r o g r a m a -->
    <div class="filtros-programa">
        <div class="grid__container">
            <div class="filtros-programa__contenedor">
                <div class="flex">
                    <p class="label">
                        Filtrar por
                    </p>
                    <select v-model="selectedCategoryId">
                        <option value="-1">Categoría</option>
                        <option v-for="category in store.categories" :key="category.term_id" :value="category.term_id" v-text="category.name"></option>
                    </select>

                    <select v-model="selectedSpeakerId">
                        <option value="-1">Expositor</option>
                        <option v-for="speaker in store.speakers" :key="speaker.ID" :value="speaker.ID" v-text="speaker.title"></option>
                    </select>

                    <select v-model="selectedTicketId">
                        <option value="-1">Tipo de registro</option>
                        <option v-for="ticket in store.tickets" :key="ticket.ID" :value="ticket.ID" v-text="ticket.title"></option>
                    </select>

                    <select v-model="selectedVenueId">
                        <option value="-1">Sedes</option>
                        <option v-for="venue in store.venues" :key="venue.ID" :value="venue.ID" v-text="venue.title"></option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="loop-programa">
        <div class="grid__container">
            <div class="loop-programa__contenedor">
                <div class="card-day" v-for="day in allDays">
                    <div class="card-day__fecha" style="text-transform: uppercase;">
                        <strong >{{ moment(day).format('dddd | DD MMMM') }}</strong>
                    </div>
                    <div class="card-event" v-if="filterByDay(day).length != 0" v-for="event in orderByTime(filterByDay(day))" @click="openModal(event)">
                        <div class="card-event__hour">
                            {{ event.time }}
                        </div>
                        <hr class="broke">
                        <div class="card-event__event">
                            {{ event.title }}
                        </div>

                    </div>
                    <div class="card-event" v-if="filterByDay(day).length == 0">
                        <div class="card-event__event">
                            No hay eventos este dia.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-programa">

        <div :class="{active: modalOpen}" class="closeModal">
            <div class="modal-programa__contenido" v-if="modalOpen">

                <button class="cerrar-modal" @click="closeModal">X</button>

                <div class="column-one">

                    <div class="modal-programa__title-event">
                        {{ modal.event.title }}
                    </div>

                    <div class="modal-programa__hour-event">
                        {{ modal.event.time }} hrs.
                    </div>

                    <div class="modal-programa__hour-event">
                        {{ modal.venue.title }}
                    </div>

                    <div class="modal-programa__ticket-event">
                        {{ modal.ticket.title }}
                    </div>

                    <div class="modal-programa__ticket-event">
                        ${{ modal.event.price }}
                    </div>

                    <div class="modal-programa__links-event">
                        <a :href="'<?php echo BLOGURL ?>/programa?expositor=' + modal.speakers[0].slug">Ir a actividades con este expositor </a>
                    </div>

                    <div class="modal-programa__links-event">
                        <a href="<?php echo BLOGURL ?>/programa">Ir a programa</a>
                    </div>

                    <div class="modal-programa__links-event">
                        <a href="<?php echo BLOGURL ?>/expositores">Ir a expositores</a>
                    </div>

                </div>

                <div class="column-two">
                    <div class="modal-programa__excerpt">
                        {{ modal.event.excerpt }}
                        <!-- El trabajo del Estudio de Tatiana Bilbao busca comprender la arquitectura desde lo multicultural y multidisciplinario para crear espacios humanizados,
                        que reaccionen ante el capitalismo global, con la ﬁnalidad de abrir nichos para el desarrollo cultural y económico. -->
                    </div>
                    <div v-if="modal.event.url">
                        <a class="boton-sedes" style="position: initial;" :href="modal.event.url" target="_blank">Quiero asistir</a>
                    </div>
                    <div id="map" style="height: 400px;"></div>
                </div>

            </div>
        </div>
    </div>

</section>

<script>
function initMap() {

    moment.locale('es');

    const store = {
        events:     <?php echo json_encode($events); ?>,
        speakers:   <?php echo json_encode($speakers); ?>,
        tickets:    <?php echo json_encode($tickets); ?>,
        venues:     <?php echo json_encode($venues); ?>,
        categories: <?php echo json_encode($categories); ?>,
    };

    const initialCategoryId = <?php echo json_encode(getInitialValue($categories, 'slug', 'categoria', 'term_id')); ?>;
    const initialSpeakerId = <?php echo json_encode(getInitialValue($speakers, 'slug', 'expositor', 'ID')); ?>;
    const initialVenueId = <?php echo json_encode(getInitialValue($venues, 'slug', 'sede', 'ID')); ?>;;
    const initialTicketId = <?php echo json_encode(getInitialValue($tickets, 'slug', 'ticket', 'ID')); ?>;;

    const modalInitialState = {
        event: {},
        speakers: [],
        venue: {},
        ticket: {}
    }

    var map

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
            selectedCategoryId: initialCategoryId,
            selectedSpeakerId: initialSpeakerId,
            selectedVenueId: initialVenueId,
            selectedTicketId: initialTicketId,
            modal: modalInitialState,
            modalOpen: false
        },
        mounted() {
            // Element mounted.

            jQuery(document).click(event => {
                //if you click on anything except the modal itself close the modal
                if (jQuery(event.target).hasClass('closeModal')) {
                    this.closeModal()
                }
            });

            // Show event that is in hash.
            if(window.location.hash) {
                var initialSlug = window.location.hash.replace('#', '')
                var event = this.store.events.find(event => event.slug == initialSlug)

                if(event){
                    this.openModal(event)
                }
            }
        },
        watch: {
            selectedCategoryId() {
                this.changeParam('categoria', 'selectedCategoryId', 'selectedCategory', 'slug')
            },
            selectedSpeakerId() {
                this.changeParam('expositor', 'selectedSpeakerId', 'selectedSpeaker', 'slug')
            },
            selectedVenueId() {
                this.changeParam('sede', 'selectedVenueId', 'selectedVenue', 'slug')
            },
            selectedTicketId() {
                this.changeParam('ticket', 'selectedTicketId', 'selectedTicket', 'slug')
            },
        },
        computed: {
            allDays() {
                if(!this.store.events){
                    return []
                }

                return Object.keys(R.groupBy(function(event) {
                    return event.date
                })(this.store.events))
            },
            filtered() {
                var events = this.store.events;

                if(this.selectedCategoryId > 0){
                    events = events.filter(event => event.categories.includes(this.selectedCategoryId))
                }

                if(this.selectedSpeakerId > 0){
                    events = events.filter(event => event.event_speaker.includes(this.selectedSpeakerId))
                }

                if(this.selectedTicketId > 0){
                    events = events.filter(event => event.ticket_id == this.selectedTicketId)
                }

                if(this.selectedVenueId > 0){
                    events = events.filter(event => event.venue_id == this.selectedVenueId)
                }

                return events
            },
            selectedCategory() {
                return this.store.categories.find(category => category.term_id === this.selectedCategoryId)
            },
            selectedSpeaker() {
                return this.store.speakers.find(speaker => speaker.ID === this.selectedSpeakerId)
            },
            selectedVenue() {
                return this.store.venues.find(venues => venues.ID === this.selectedVenueId)
            },
            selectedTicket() {
                return this.store.tickets.find(ticket => ticket.ID === this.selectedTicketId)
            },
        },
        methods: {
            filterByDay(day){
                return this.filtered.filter(event => event.date === day)
            },
            openModal(event){
                this.modal.event = event

                // Set the hash.
                window.location.hash = event.slug;

                // Find the speakers of this event.
                this.modal.speakers = this.store.speakers.filter(speaker =>  event.event_speaker.includes(speaker.ID))

                // Find the venue of this event.
                this.modal.venue = this.store.venues.find(venue =>  event.venue_id == venue.ID)

                // Find the ticket of this event.
                this.modal.ticket = this.store.tickets.find(ticket =>  event.ticket_id == ticket.ID)

                // Open the modal
                this.modalOpen = true

                Vue.nextTick(() => {
                    this.initializeModalMap(this.modal.venue)
                })
            },
            closeModal(){
                this.modal = modalInitialState

                // Open the modal
                this.modalOpen = false
            },
            initializeModalMap(venue) {
                var myLatlng = new google.maps.LatLng(venue.coords[0], venue.coords[1])

                // Set the center where the pin is.
                myOptions.center = myLatlng

                map = new google.maps.Map(document.getElementById("map"), myOptions)

                icon.fillColor = venue.color

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
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
                    infowindow.open(map, marker)
                })
            },
            moment,
            orderByTime(events) {
                return R.sortBy(event => event.time)(events)
            },
            changeParam(param, objId, obj, slugProp) {
                var url = removeParam(param)

                if(this[objId] != -1){
                    url = insertParam(param, this[obj][slugProp])
                }

                history.pushState({}, "", url)
            }
        }
    })

}
</script>

<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ramda/0.26.1/ramda.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_KEY ?>&callback=initMap" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/locale/es.js"></script>
<script src="<?php echo THEMEURL; ?>js/helpers.js"></script>
