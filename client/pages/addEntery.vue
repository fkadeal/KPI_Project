<template>
    <el-card class="box-card">
        <li class="text-center size1">{{ product.name }} - {{ product.discription }}"</li>
        <el-row>
  <el-col :span="6"><div class="grid-content bg-purple">
      <table>
            <tr> 
                <th scope="col">Targate</th>
            </tr>
            <tr> 
                    <td>{{ product.targate }}</td> 
            </tr>
        </table>
      </div></el-col>

  <el-col :span="18">
      <div class="grid-content bg-purple-light">
        <table>
            <tr>
                <th scope="col">Achieved</th>
                <th scope="col">date</th>
                <th scope="col">Action</th>
            </tr>
            <div class="col-xs-4">
            <form @submit.prevent="create">
            <tr>
                    <td>
                
                    <el-input-number v-model="product.todySell" clearable></el-input-number>

                        <div v-if="show=false" class="form-group"> 
                            <input type="text" class="form-control" v-model="product.targate">
                            <input type="number" v-model="product.id">
                        </div>
                   
                </td>
                <td>
                    <input class="form-control col-xs-4" v-model="product.datepic" type="date" >
                    <!-- yyyy-mm-dd -->
                </td>
                <td>
                     <button type="submit" class="btn btn-primary">Create</button>
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
                pickerOptions: {
          disabledDate(time) {
            return time.getTime() > Date.now();
          },
          shortcuts: [{
            text: 'Today',
            onClick(picker) {
              picker.$emit('pick', new Date(yy, mm, dd));
            }
          }, {
          }]
        },
                product: {},
            }
        },
        created() {
            axios.get(`${process.env.APP_URL,'/addkpi/'+ this.$route.params.id}`)
                .then((res) => {
                    this.product = res.data;
                });
        },
        methods: {
            create() {

                console.log(this.product);
                axios.post(`${process.env.APP_URL,'/kpi/'}`, this.product)
                    .then((res) => {
                        this.$router.push({ name: 'KPI' });
                    });
            }
        }
    }
</script>