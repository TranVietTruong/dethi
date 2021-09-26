<template>
  <v-app id="inspire">
    <Header v-if="!isMobile" />
    <HeaderMobile v-if="isMobile" />

    <v-main class="grey lighten-3 relative">
      <v-container>
        <Banner />
        <v-row>
          <v-col cols="12" sm="9" lg="9">
            <nuxt />
          </v-col>
          <v-col v-if="!isMobile" cols="3">
            <!--            <Navigation />-->
          </v-col>
        </v-row>
      </v-container>
      <Footer />
    </v-main>
  </v-app>
</template>

<script>
import Header from '@/components/Header'
import Banner from '@/components/Banner'
import HeaderMobile from '@/components/mobile/HeaderMobile'
import Footer from '@/components/Footer'
export default {
  components: {
    Header,
    Banner,
    HeaderMobile,
    Footer
  }
}
</script>

<style>
.relative {
  position: relative !important;
}
/*.v-text-field .v-input__control .v-input__slot {*/
/*  min-height: auto !important;*/
/*  display: flex !important;*/
/*  align-items: center !important;*/
/*}*/
</style>
