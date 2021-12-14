<template>
    <div>
        <h3 class="text-center">Enter Data for "{{ product.name }}" Kpi </h3>
        <div class="row">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">KPI Name</th>
                <th scope="col">Targate</th>
                <th scope="col">Discription</th>
                <th scope="col">Enter Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ product.id }}</th>
                    <td>{{ product.name }}</td>
                    <td>{{ product.targate }}</td>
                    <td>{{ product.discription }}</td>
                    
                    <td><div class="col-xs-4">
            <form @submit.prevent="create">
                        <input type="number" class="col-xs-2 form-control" v-model="product.todySell">
                        <div v-if="show=false" class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="product.targate">
                        <input  type="number" v-model="product.id">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
                </div></td>
                </tr>
            </tbody>
            </table> 
            
        </div>
    </div>
</template>
 
<script>
import axios from 'axios';
    export default {
        middleware: 'auth',
        data() {
            return {
                product: {}
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
                axios
                    .post(`${process.env.APP_URL,'/kpi/'}`, this.product)
                    .then((res) => {
                        this.$router.push({ name: 'KPI' });
                    });
            }
        }
    }
</script>