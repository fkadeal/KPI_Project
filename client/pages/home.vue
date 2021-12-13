<template>
  <card title="Dashbord"> 
   {{ $t('you_are_logged_in') }}
  
     <line-chart :data="gdata[0]"></line-chart>
    <!-- {{gdata}} -->
  </card>
</template>

<script>
import axios from 'axios' ;
export default {
  middleware: 'auth',
head () {
    return {
       title: this.$t('home') 
       }
  },
     
  data(){ 
    return {
      gdata:{}
    }
       },
        created(){
    let datasell = {};
    let datasellall = {};
    var newdata = [];
    let my_object = {};  
 
         axios.get('http://localhost:8000/api/kpi')
                .then((res) => {
                
                  for (var i = 0; i < res.data.length; i++){
                    console.log('i '+i);
                    my_object[res.data[i].created_at.toString()] = res.data[i].sells; 
                  }
                newdata.push(my_object);
                console.log(newdata);
                this.gdata=newdata;
        });
  },
}
</script>
