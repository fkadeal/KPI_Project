<template>
    <div> 
    
  <card class="box-card">
        <line-chart name='work' :data="gdata"></line-chart>
  </card>
        <card >
  <el-table :data="kpisdata" :default-sort = "{prop: 'datepic', order: 'descending'}" style="width: 100%">
    
    <el-table-column label="by Date"  prop="datepic" sortable> </el-table-column>
    <el-table-column label="Targate"  prop="targete"> </el-table-column>
    <el-table-column label="Achieved" prop="sells"> </el-table-column>

    <el-table-column align="right"> 
        <template slot="header" slot-scope="scope">
          <el-input  v-model="search"  size="mini" placeholder="Type to search"/>
        </template>
      <template slot-scope="scope">
        <el-button class="el-icon-edit size1"  @click="handleAdd(scope.$index, scope.row)" circle></el-button>
        <el-button class="el-icon-delete-solid size1" type="danger" @click="handleDelete(scope.$index, scope.row)" circle></el-button>
      </template>
    </el-table-column>
    <!-- <el-pagination
  background
  layout="prev, pager, next"
  :total="totaldata">
</el-pagination> -->
  </el-table>
</card>
  <card>
      pagination
  </card>
    </div>
</template>

        
        
<script>
import axios from 'axios';
import Card from '../components/global/Card.vue';
    export default {
      middleware: 'auth',
  components: { Card },
        data() {
            return {
              
                gdata:{},
                totaldata:{},
                Kpi: {},
                kpisdata: [{error: 'check YOUR Connection ',}],
                search: '',
                      }
        },
        created() {
            axios.get(`${process.env.APP_URL,'/addkpi/'+this.$route.params.id}`)
                .then((res) => {
                    this.kpis = res.data;
                });
             axios.get(`${process.env.APP_URL,'/kpi/'+this.$route.params.id}`)
                .then((res) => {
                    this.kpisdata = res.data;
                });
                    var achieveddata = [];
                    let achieved = {};
                    var targetdata=[];
                    let target = {};  
                axios.get(`${process.env.APP_URL,'/kpi/'+this.$route.params.id}`)
                        .then((res) => {
                            this.totaldata = res.data.length+1;
                    for (var i = 0; i < res.data.length; i++){
                            console.log('i '+i);
                            achieved[res.data[i].datepic.toString()] = res.data[i].sells;
                            target[res.data[i].datepic.toString()] = res.data[i].targete;
                        }
                        achieveddata.push(achieved);
                        targetdata.push(target);
                        console.log(achieveddata);
                        console.log(target);
                        console.log(achieveddata[0]);
                        console.log(targetdata[0]);
                        let data = [
                          {name: "Achieved", data: achieveddata[0]},
                          {name: "Target", data: targetdata[0]}
                        ];
              this.gdata=data;
                });       
                //String strdata= achieveddata[0].toString()
                

               
              
             },
        methods: {
        handleAdd(index, row) {
        console.log(index, row);
         this.$router.push({path: `/Entery/addSingKpi/${row.id }/${this.$route.params.id}`})
         
      },
      handleDelete(index, row) {
            this.$confirm('This will permanently delete this Data. Continue?', 'Warning', {
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel',
            type: 'warning',
            center: true
            }).then(() => {
                    axios
                    .delete(`${process.env.APP_URL,'/kpi/'+row.id}`)
                    .then(response => ( 
                      this.$router.push({ name: 'analytics' , params: { id: this.$route.params.id}})
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)

            this.$message({
                type: 'success',
                message: 'Delete completed'
            });
            }).catch(() => {
            this.$message({
                type: 'info',
                message: 'Delete canceled'
            });
            });
        }
        }
            
    }
</script>
<style scoped>
.size1 {
   font-size: 1rem;
}
</style>
