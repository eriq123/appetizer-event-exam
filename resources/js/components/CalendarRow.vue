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
        computed: {
            getEventName(){
                return this.event.length > 0 ? this.event[0].event.name : '';
            }
        },
    }
</script>

<style scoped>
    .hasEvent{
        background: #e1fcd9;
    }
    p{
        margin: 10px 0;
        padding-left: 10px;
        padding-right: 30px;
    }
</style>