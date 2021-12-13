<template>
    <div>
        bro
        <line-chart :data="Monthly_DATA"></line-chart>
    </div>
</template>
<script>
export default{
    data(){
       return this.Monthly_DATA=[{name: 'Workout', data: {'2017-03-01 00:00:00 -0800': 7,'2017-02-01 00:00:00 -0800': 9,'2017-01-01 00:00:00 -0800': 3, '2017-01-02 00:00:00 -0800': 4}},
                                {name: 'Call parents', data: {'2017-01-01 00:00:00 -0800': 5, '2017-01-02 00:00:00 -0800': 3}}];
       }
}
</script>

