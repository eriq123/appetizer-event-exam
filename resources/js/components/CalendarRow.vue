<template>
    <div class="row border-bottom" :class="{'hasEvent' : this.event.length}">
        <div class="col-sm-3">
            <p>{{ this.$moment(this.date).format('DD ddd') }}</p>
        </div>
        <div class="col-sm-9">
            <p> {{this.getEventName}} </p>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['date','event'],
        data: function(){
            return{
            }
        },
        created() {

        },
        mounted() {
        },
        filters: {
        },
        methods: {
       
        },
        computed: {
            getEventName(){
                return this.event.length > 0 ? this.event[0].event.name : '';
            }
        },

    }
</script>

<style scoped>
    .hasEvent{
        /* background: #90EE90; */
        background: #e1fcd9;
        /* background: #e8f2e5; */
        /* background: #f3faf1; */
    }
    
    p{
        margin: 10px 0;
        padding-left: 10px;
        padding-right: 30px;
    }

</style>