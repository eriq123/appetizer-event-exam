<template>
    <div class="container-fluid p-0" id="main-div">
        <div class="row">
            <div class="col">
                <label for="event_name">Event</label>
                <input  class="form-control" type="text" name="event_name" id="event_name" v-model="data.eventName">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="from_date">From</label>
                <input  class="form-control" type="date" name="from_date" id="from_date" v-model="fromDate">
            </div>
            <div class="col-sm-6">
                <label for="to_date">To</label>
                <input  class="form-control" type="date" name="to_date" id="to_date" v-model="toDate">
            </div>
        </div>
        <div class="row">
            <div class="days" v-for="(day, index) in days" :key="index">
                <input type="checkbox" :id="day" :value="index" v-model="daysSelected">
                <label :for="day">{{day}}</label>
            </div>
        </div>
        <button class="btn btn-info" type="button" v-on:click="saveEvent">
            Save
        </button>
    </div>
</template>

<script>

    export default {
        props: ['eventRoute','currentMonth','currentYear'],
        data: function(){
            return{
                days: [],
                fromDate: '',
                toDate: '',
                daysSelected: [],

                events: [],

                data: {
                    eventName: '',
                    dates: [],
                    month: '',
                    year: ''
                }
            }
        },
        mounted() {
            this.days = this.$moment.weekdays();
        },
        methods: {
            saveEvent: function(){
                this.data.dates = [];
                this.data.month = this.currentMonth;
                this.data.year = this.currentYear;

                const startDate = this.$moment(this.fromDate);
                const endDate = this.$moment(this.toDate);
                const range = this.$moment().range(startDate, endDate);

                for (let month of range.by('day')) {
                    if( this.daysSelected.includes(month.day()) ){
                        this.data.dates.push({
                            month: month.format('MMMM'),
                            date: month.date(),
                            year: month.year(),
                            full_date: month.format('YYYY-MM-DD'),
                        });
                    }
                }

                axios.post(this.eventRoute, this.data).then(response => {

                    this.events = response.data.dates;
                    this.$emit('updateEvents',this.events);
                
                    this.$Swal.fire({
                        title: 'Success!',
                        text: 'Event successfully saved!',
                        icon: 'success',
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
        },
    }
</script>

<style scoped>
    input{
        margin-bottom: 5px;
    }
    .days{
        padding: 0;
        margin: auto 15px;
    }
    .row{
        margin-bottom: 20px;
    }
</style>