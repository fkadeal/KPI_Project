<template>
<div><el-card title="Dashbord"> 
 
       {{ $t('All your CREATED kpis ') }}
  <el-row :gutter="24">
    
  <el-col :span="12">
    <el-card shadow="always">
     <pie-chart :data="allkpi"></pie-chart>
      </el-card>
      </el-col>
        
  <el-col :span="12">
    <el-card shadow="always">
      <bar-chart :data="allkpi"></bar-chart>
      </el-card><div class="grid-content bg-purple">
        </div>
      </el-col>
</el-row>



    <!-- {{gdata}} -->
  </el-card>
  
</div>
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
      allkpi:[],
      gdata:{}
    }
       },
        created(){
    let datasell = {};
    let datasellall = {};
    var newdata = [];
    let my_object = {};  
    let paiobject={};
 
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
        let a=['RPC', 44],b=['PM', 23],c=['ADA',45],d=[];

          d.push(a);
          d.push(b);
          d.push(c);

        axios.get('http://localhost:8000/api/addkpi')
                .then((res) => {
                
                  for (var i = 0; i < res.data.length; i++){
                    console.log('i '+i);
                    paiobject=[res.data[i].name.toString(), res.data[i].targate]; 
                    d.push(paiobject);
                    paiobject=[];
                  }
                
                console.log(newdata); 
                this.allkpi=d;
        });
        
       
  },
}
</script>
