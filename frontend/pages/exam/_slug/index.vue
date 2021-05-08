<template>
  <div>
    <v-sheet class="pa-5">
      <h1 class="headline mb-5">
        ĐỀ THI LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG
      </h1>
      <div class="d-flex justify-start">
        <v-list>
          <v-list-item>
            <v-list-item-avatar dense size="40">
              <img src="https://media.store123doc.com/images/default/user_small.png">
            </v-list-item-avatar>

            <v-list-item-content>
              <v-list-item-title class="font-weight-bold subtitle-1">
                tran viet truong
              </v-list-item-title>
              <v-list-item-subtitle class="caption">
                01/01/2021
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </div>
      <v-divider />
      <v-carousel max-hieght="700" hide-delimiter-background>
        <v-carousel-item
          v-for="(item,i) in items"
          :key="i"
          :src="item.src"
          class="img__exam"
        />
      </v-carousel>
      <v-divider />
      <v-row class="ma-1 mt-2">
        <div class="mr-3">
          <v-icon x-small>
            mdi-eye-outline
          </v-icon>
          <span class="text-caption">256</span>
        </div>
        <div class="mr-3">
          <v-icon x-small>
            mdi-download
          </v-icon>
          <span class="text-caption">256</span>
        </div>
        <div class="mr-3">
          <v-icon x-small>
            mdi-heart-outline
          </v-icon>
          <span class="text-caption">256</span>
        </div>
        <v-spacer />
        <v-btn class="mr-2 mb-2" x-small outlined color="deep-orange">
          <v-icon small left>
            mdi-heart-outline
          </v-icon>
          Yêu thích
        </v-btn>

        <v-btn class="mr-2" x-small outlined color="primary">
          <v-icon small left>
            mdi-facebook
          </v-icon>
          Chia sẻ
        </v-btn>
        <v-btn x-small outlined color="primary">
          <v-icon small left>
            mdi-download
          </v-icon>
          Tải xuống
        </v-btn>
      </v-row>
      <div class="d-flex justify-space-between mt-3">
        <p class="subtitle mt-3 ml-3">
          5 Bình luận
        </p>
      </div>
      <v-divider />
      <div class="answer mb-2">
        <v-list-item dense>
          <v-list-item-avatar dense size="30">
            <img src="https://media.store123doc.com/images/default/user_small.png">
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold subtitle-2">
              tran viet truong
            </v-list-item-title>
            <v-list-item-subtitle class="caption">
              01/01/2021
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
        <div class="ml-5">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam doloribus, eum expedita fugit impedit itaque iusto neque nesciunt nihil provident quaerat qui quidem quis quisquam rerum saepe sit vel voluptates?
        </div>
      </div>
      <div class="mt-10 d-flex">
        <v-avatar height="40" width="40" class="mr-2">
          <img src="https://media.store123doc.com/images/default/user_small.png" alt="">
        </v-avatar>
        <v-textarea
          placeholder="Viết bình luận ..."
          class="comment"
          suffix
          dense
          outlined
          auto-grow
          rows="1"
          row-height="15"
          solo
        />
      </div>
    </v-sheet>
  </div>
</template>

<script>
export default {
  data () {
    return {
      items: [
        {
          src: '/dethi2.jpg'
        },
        {
          src: '/dethi3.jpg'
        }
      ]
    }
  }
}
</script>

<style>
  .img__exam .v-image__image {
    background-size: contain !important;
  }
  .comment .v-input__slot {
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
  }
</style>
