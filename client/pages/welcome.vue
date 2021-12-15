<template>
<div>
  <el-card class="box-card">
       <nav style="float: right; " class="navbar navbar-expand-lg navbar-light bg-white">
   <ul class="navbar-nav">
      <li class="nav-item " >
        <template v-if="authenticated">
              <router-link :to="{ name: 'home' }">
                {{ $t('home') }}
              </router-link>
            </template>
            <template v-else>
              <router-link :to="{ name: 'login' }">
                {{ $t('login') }}
              </router-link>
              <router-link :to="{ name: 'register' }">
                {{ $t('register') }}
              </router-link>
            </template>
        </li>
   </ul>
      </nav>
</el-card>
  <el-card class="box-card">

    <span> <h1>Beautifully Simple <strong>KPI Software</strong></h1></span> 
   
    <div class="top-right links">
    
    </div>
    <center>

        <div class="hero-holder-home">
            <div class="generic-holder hero-holder">
               
                <h2>Track your Key Performance Indicators, Metrics and Business Data with insightful <strong>KPI Dashboards</strong> and <strong>Reports</strong></h2>
                

                <div class="hero-image-holder">
                    <amp-img alt="A KPI Software interface being displayed on a computer monitor, showing data being visualised in 6 various graphs and charts" width="1.44" height="1" layout="responsive" src="https://cdn.simplekpi.com/images/SVGs/Home-KPI-Software.svg" class="i-amphtml-element i-amphtml-layout-responsive i-amphtml-layout-size-defined i-amphtml-built i-amphtml-layout" i-amphtml-layout="responsive" style="--loader-delay-offset:600ms !important;"><i-amphtml-sizer slot="i-amphtml-svc" style="padding-top: 69.4444%;"></i-amphtml-sizer>
                    <img decoding="async" alt="A KPI Software interface being displayed on a computer monitor, showing data being visualised in 6 various graphs and charts" src="https://cdn.simplekpi.com/images/SVGs/Home-KPI-Software.svg" class="i-amphtml-fill-content i-amphtml-replaced-content"></amp-img>
                </div>
            </div>
        </div>
     </center>
  </el-card>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Card from '../components/global/Card.vue'

export default {
  components: { Card },
  layout: 'simple',

  data: () => ({
    title: "ETM KPI Sapmle software"
  }),

  head () {
    return { title: this.$t('home') }
  },

  computed: mapGetters({
    authenticated: 'auth/check'
  })
}
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}

.laravel {
  color: #2e495e;
}

.nuxt {
  color: #00c48d;
}
</style>
