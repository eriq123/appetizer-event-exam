<template>
    <div>
        <div class="row">
            <div class="col-md-6 col-lg-5" id="calendar-form">
                <calendar-form :eventRoute="this.eventRoute"></calendar-form>
            </div>
            <div class="col-md-6 col-lg-7" id="calendar-rows">

                <h4> {{this.month}} {{this.year}}  </h4>
                <hr>

                <!-- ul of component here -->
                <!-- <ul>
                </ul> -->
            </div>
        </div>
    </div>
</template>

<script>
    import calendarForm from './CalendarForm.vue';
    const moment = require('moment');

    export default {
        components:{
            calendarForm
        },
        props: ['eventRoute'],
        data() {
            return {
                month: moment().format("MMMM"),
                year: moment().year(),
            }
        },
        mounted() {
            // this.monthYear = moment().format("MMMM YYYY");

            // console.log(moment().date());
            // console.log(moment().daysInMonth());
            // console.log(moment().weekday());

            // data from database has same YEAR AND MONTH

            // the only problem now is the day and date



            // for(let i = 1; i <= moment().daysInMonth; i++){
            //     let day = {
            //         day: i,

            //     }
            //     this.days.push();
            // }

            // create an array of days here 
            // {
            //     eventName: sample event
            //     event: true
            //     day: Tuesday
            //     date: 28
            // }

            // daysOfCurrentMonth = [];

            // foreach{
            //     if day == day from database{
                // update the array
            // }
            // }
        },
        methods: {
        }
    }
</script>

<style scoped>
    #calendar-form{
        border: 1px solid #aaa;
        border-radius: 5px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>