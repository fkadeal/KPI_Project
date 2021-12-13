<template>
    <div> 
     
    <router-link :to="{ name: 'Entery' }" class="el-icon-circle-plus size1 nav-link " > {{ $t('Add-New') }} </router-link>
   
     <card >
     
        

       
  <el-table :data="products.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase()))" style="width: 100%">
    
    <el-table-column label="Name"  prop="name"> </el-table-column>
    <el-table-column label="Discription"  prop="discription"> </el-table-column>
    <el-table-column label="Targate" prop="targate"> </el-table-column>

    <el-table-column align="right"> 
        <template slot="header" slot-scope="scope">
          <el-input  v-model="search"  size="mini" placeholder="Type to search"/>
        </template>
      <template slot-scope="scope">
        <el-button class="el-icon-circle-plus size1"  circle>
          <router-link :to="{name: 'Enterdata', params: { id: scope.row.id }}" > </router-link></el-button>
        <el-button size="mini" type="danger"
          @click="handleDelete(scope.$index, scope.row)" class="el-icon-delete-solid size1" circle></el-button>
      </template>
    </el-table-column>
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
  components: { Card },
        data() {
            return {
                Kpi: {},
                 products: {},
                 products: [{
          error: 'check YOUR Connection ',
        } 
        ],
        search: '',
                
            }
        },
        created() {
            axios.get('http://localhost:8000/api/addkpi')
                .then(response => {
                    this.products = response.data;
                });
        },
        methods: {
            
      handleEdit(index, row) {
        console.log(index, row);
         
                       
      },
      handleDelete(index, row) {
            this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel',
            type: 'warning',
            center: true
            }).then(() => {
                    axios
                    .delete(`http://localhost:8000/api/addkpi/${row.id}`)
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