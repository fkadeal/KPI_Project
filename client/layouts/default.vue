<template>
  <div class="layout">
    <navbar />
    

    <div class="container mt-4">
      <nuxt />
    </div>
    <!-- <sbar /> -->
  </div>
</template>

<script>
import Navbar from '~/components/Navbar';
import sbar from '~/components/sideNavbar';
export default {
  components: {
    Navbar, sbar
  }
}
</script>
