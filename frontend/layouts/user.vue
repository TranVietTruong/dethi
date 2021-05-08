<template>
  <v-app id="inspire">
    <NavigationDrawerMenuMobile v-if="isMobile" />
    <NavigationDrawerSearchMobile v-if="isMobile" />
    <Header v-if="!isMobile" />
    <HeaderMobile v-if="isMobile" />

    <v-main class="grey lighten-3 relative">
      <v-container>
        <Banner />
        <v-row>
          <v-col v-if="!isMobile" cols="3">
            <Navigation />
          </v-col>
          <v-col cols="12" sm="9" lg="9">
            <nuxt />
          </v-col>

        </v-row>
      </v-container>
      <Footer />
    </v-main>
  </v-app>
</template>

<script>
import NavigationDrawerMenuMobile from '@/components/mobile/NavigationDrawerMenuMobile'
import NavigationDrawerSearchMobile from '@/components/mobile/NavigationDrawerSearchMobile'
import Header from '@/components/Header'
import Banner from '@/components/Banner'
import HeaderMobile from '@/components/mobile/HeaderMobile'
import Navigation from '@/components/Navigation'
import Footer from '@/components/Footer'
export default {
  components: {
    NavigationDrawerMenuMobile,
    NavigationDrawerSearchMobile,
    Header,
    Banner,
    HeaderMobile,
    Navigation,
    Footer
  },
  data () {
    return {

    }
  },
  methods: {
  }
}
</script>

<style>
  .relative {
    position: relative !important;
  }
  /*.v-text-field .v-input__control .v-input__slot {*/
    /*min-height: auto !important;*/
    /*display: flex !important;*/
    /*align-items: center !important;*/
  /*}*/
</style>
