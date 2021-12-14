<template>
    <div> 
     <card >
  
        <line-chart name='work' :data="gdata"></line-chart>
{{ gdata  }}
       
  <el-table :data="kpisdata.filter(data => !search )" style="width: 100%">
    
    <el-table-column label="by Date"  prop="created_at"> </el-table-column>
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
            axios.get(`http://localhost:8000/api/addkpi/${this.$route.params.id}`)
                .then((res) => {
                    this.kpis = res.data;
                });
             axios.get(`http://localhost:8000/api/kpi/${this.$route.params.id}`)
                .then((res) => {
                    this.kpisdata = res.data;
                });

                        
                    var achieveddata = [];
                    let achieved = {};
                    var targetdata=[];
                    let target = {};  
                axios.get(`http://localhost:8000/api/kpi/${this.$route.params.id}`)
                        .then((res) => {
                            this.totaldata = res.data.length+1;
                    for (var i = 0; i < res.data.length; i++){
                            console.log('i '+i);
                            achieved[res.data[i].created_at.toString()] = res.data[i].sells;
                            target[res.data[i].created_at.toString()] = res.data[i].targete;
                        }
                        achieveddata.push(achieved);
                        targetdata.push(target);
                        console.log(achieveddata);
                        console.log(target);

                        console.log("datasellalldatasellalldatasellalldatasellall");
                        console.log(achieveddata[0]);
                        console.log(targetdata[0]);
                        console.log("datasellalldatasellalldatasellall"); 
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
         this.$router.push({name: 'Enterdata', params: { id: row.id }})
      },
      handleDelete(index, row) {
            this.$confirm('This will permanently delete this Data. Continue?', 'Warning', {
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel',
            type: 'warning',
            center: true
            }).then(() => {
                    axios
                    .delete(`http://localhost:8000/api/deletekpi/${row.id}`)
                    .then(response => ( 
                      this.$router.push({ name: 'home' })
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
            console.log(row.id)
        }
        }
            
    }
</script>
<style scoped>
.size1 {
   font-size: 1rem;
}
</style>
