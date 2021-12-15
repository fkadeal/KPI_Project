<template>
<el-card shadow="always" title="Create New kpis">
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addkpis">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="kpis.name">
                    </div>
                    <div class="form-group">
                        <label>Discripiton </label>
                        <input type="text" class="form-control" v-model="kpis.discription">
                    </div>
                    <div class="form-group">
                        <label>Targate</label>
                        <input type="number" class="form-control" v-model="kpis.targate">
                    </div>  
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </el-card>
</template>
 
<script>
import axios from 'axios';

    export default {
        middleware: 'auth',
        data() {
            return {
                kpis:{}
            }

        },
        created() {
            axios
                .get(`http://localhost:8000/api/addkpi/${this.$route.params.id}`)
                .then((res) => {
                    this.product = res.data;
                });
        },
        methods: {  
            addkpis() {
                axios
                    .post('http://localhost:8000/api/addkpi', this.kpis)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>