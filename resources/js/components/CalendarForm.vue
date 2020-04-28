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
                <input  class="form-control" type="date" name="from_date" id="from_date" v-model="data.fromDate">
            </div>
            <div class="col-sm-6">
                <label for="to_date">To</label>
                <input  class="form-control" type="date" name="to_date" id="to_date" v-model="data.toDate">
            </div>
        </div>
        <div class="row">
            <div class="col days" v-for="day in days" :key="day.id">
                <input type="checkbox" :id="day.name" :value="day.id" v-model="data.daysSelected">
                <label :for="day.name">{{day.alias}}</label>
            </div>
        </div>
        <button class="btn btn-info" type="button" v-on:click="saveEvent">
            Save
        </button>

        <div class="container">
            days: {{data.daysSelected}} <br>

            Event: {{data.eventName}} <br>
            from: {{data.fromDate}} <br>
            to: {{data.toDate}} <br>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['eventRoute'],
        data: function(){
            return{
                days: [
                    {
                        id: 1,
                        name: "Monday",
                        alias: "Mon",
                    },
                    {
                        id: 2,
                        name: "Tuesday",
                        alias: "Tue",
                    },
                    {
                        id: 3,
                        name: "Wednesday",
                        alias: "Wed",
                    },
                    {
                        id: 4,
                        name: "Thursday",
                        alias: "Thu",
                    },
                    {
                        id: 5,
                        name: "Friday",
                        alias: "Fri",
                    },
                    {
                        id: 6,
                        name: "Saturday",
                        alias: "Sat",
                    },
                    {
                        id: 7,
                        name: "Sunday",
                        alias: "Sun",
                    },
                ],
                
                data: {
                    eventName: '',
                    fromDate: '',
                    toDate: '',
                    daysSelected: [],
                }
            }
        },
        mounted() {

        },
        methods: {
            saveEvent: function(){
                this.data.daysSelected.sort();

                axios.post(this.eventRoute, this.data).then(response => {
                    console.log(response);
                }).catch(e => {
                    console.log(e);
                });

                // console.log(this.data.eventName)
                // console.log(this.data.fromDate)
                // console.log(this.data.toDate)
                // console.log(this.data.daysSelected)
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
    }
    .days:nth-child(1){
        padding-left: 15px;
    }
    .row{
        margin-bottom: 20px;
    }
</style>