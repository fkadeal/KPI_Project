<template>
<div class="footer">
<div class="navbar navbar-expand-lg navbar-light bg-light">

 <ul class="navbar-nav " style="float: left; padding: 3px 0" >
<li class="nav-item" > <router-link :to="{ name: 'KPI' }" class="nav-link" active-class="active"> {{ $t('KPIs') }} </router-link></li>
<li class="nav-item" > <router-link :to="{ name: 'Entery' }" class="nav-link" active-class="active"> {{ $t('Add Data') }} </router-link></li>
<li class="nav-item" > <router-link :to="{ name: 'home' }" class="nav-link" active-class="active"> {{ $t('Dashbord') }} </router-link></li>
 <!-- <li class="nav-item" ><router-link :to="{ name: 'report' }" class="nav-link" active-class="active"> {{ $t('Reports') }} </router-link></li> -->
<li class="nav-item " ><router-link :to="{ name: 'analytics' }" class="nav-link" active-class="active el-icon-odometer"> {{ $t('Analytics') }} </router-link></li>
 </ul>
</div>
</div>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: "KPI USER"
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}

.tab-menu, div.vibrant-holder {
    background-color: #7ac9f6;
    background: -moz-linear-gradient(top,#7ac9f6 0,#54ace2 100%);
    background: -webkit-gradient(linear,left top,left bottom,color-stop(0,#7ac9f6),color-stop(100%,#54ace2));
    background: -webkit-linear-gradient(top,#7ac9f6 0,#54ace2 100%);
    background: linear-gradient(to top left,#7ac9f6 0,#54ace2 100%);
}

.tab-menu {
    background-color: #7ac9f6;
    background: linear-gradient(to top left,#7ac9f6 0,#54ace2 100%);
    height: 50px;
    min-width: 670px;
    overflow: hidden;
    padding-right: 10px;
}
div {
    display: block;
}
.footer {
            position: fixed;
            bottom: 0;
            width: 90%;
            /* Height of the footer*/ 
            height: 40px;
            margin-bottom: 3rem;
            background: grey;
        }
</style>
