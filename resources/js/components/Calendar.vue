<template>
    <div>
        <div class="row">
            <div class="col-lg-4" id="calendar-form">
                <calendar-form :eventRoute="this.eventRoute" :currentMonth="this.data.month" :currentYear="this.data.year" @updateEvents="eventsUpdate"></calendar-form>
            </div>
            <div class="col-lg-8 mt-md-5 mt-lg-0" id="calendar-rows">

                <h4> {{this.data.month}} {{this.data.year}} </h4>
                <hr>

                <div class="container-fluid">
                    <calendar-row v-for="(row, index) in rows" :key="index" :date="row" :event="eventIDs.includes(row.date()) ? filterEvents(row.date()) : []"></calendar-row>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import calendarForm from './CalendarForm.vue';
    import calendarRow from './CalendarRow.vue';

    export default {
        components:{
            calendarForm,
            calendarRow,
        },
        props: ['eventRoute','listEventRoute'],
        data: function() {
            return {
                data: {
                    month: '',
                    year: '',
                },
                rows: [],
                events: [],
                eventIDs: [],
            }
        },
        created() {
            axios.post(this.listEventRoute, this.data).then(response => {

                this.events = response.data.dates;
                this.eventIDs = this.events.map(function(value, key){
                    return value.date;
                });

            }).catch(e => {
                console.log(e);
                this.$Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong. Please refresh the page and try again.',
                    icon: 'error',
                });
            });
        },
        mounted() {
            this.data.month = this.$moment().format("MMMM");
            this.data.year = this.$moment().year();

            const startOfMonth = this.$moment().startOf("month");
            const endOfMonth = this.$moment().endOf("month");

            const m = this.$moment();
            const range = m.range(startOfMonth, endOfMonth);

            this.rows = Array.from(range.by('day'));
        },
        methods: {
            eventsUpdate: function(value) {
                this.events = value;
                this.eventIDs = this.events.map(function(value, key){
                    return value.date;
                });
            },
            filterEvents: function(id) {
                return this.events.filter(singleEvent => singleEvent.date == id);
            }
        }
    }
</script>

<style scoped>
    hr{
        border-top: 1px solid rgba(0, 0, 0, 0.5);
        margin-bottom: 0;
    }
</style>