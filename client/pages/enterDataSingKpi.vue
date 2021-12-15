<template>
<el-card >
    <el-row>
  <el-col :span="18">
      <div class="grid-content bg-purple-light">
        <table>
            <tr>
                <th scope="col">Achieved</th>
                <th scope="col">date</th>
                <th scope="col">Action</th>
            </tr>
            <div class="col-xs-4">
            <form @submit.prevent="update">
            <tr>
                 <td>
                    <el-input-number v-model="product.todySell" clearable></el-input-number>
                            <input type="text" class="form-control" v-model="product.targate">
                            <input type="text" class="form-control" v-model="product.Kpi_id">
                        <div  v-if="show=false" class="form-group"> 
                            <input type="number" v-model="product.id">
                        </div>
                </td>
                <td>
                    <input class="form-control col-xs-4" v-model="product.datepic" type="date" >
                    <!-- yyyy-mm-dd -->
                </td>
                <td>
                     <button type="submit" class="btn btn-primary">update</button>
                </td> 
              </tr>
                </form>
                </div>
        </table>
      </div>
      </el-col>
            </el-row>
    </el-card>
</template>
 
<script>
import axios from 'axios';
    export default {
        middleware: 'auth',
        data() {
            return {
                product: {},
            }
        },
        created() {
            axios.get(`${process.env.APP_URL,'/kpi/'+ this.$route.params.id}`)
                .then((res) => {
                    this.product = res.data;
                });
        },
        methods: {
            update() {
                    // product.push(`Kpi_id`)
                    this.product.Kpi_id = this.$route.params.kpid;
                console.log(this.product);

              axios.get(`${process.env.APP_URL,'/kpiss/'+this.$route.params.id}`, this.product)
                    .then((res) => {
                        this.$router.push({ name: 'KPI' });
                    });
            }
        }
    }
</script>