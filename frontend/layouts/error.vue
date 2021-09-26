<template>
  <v-app>
    <div class="four_zero_four_bg">
      <h1 class="text-center ">
        {{error.statusCode}}
      </h1>
    </div>
    <div class="contant_box_404 text-center">
      <h3 class="h2 mb-2">
        Có vẻ như chúng ta đang gặp vấn đề !
      </h3>
      <p>{{messageError(error.statusCode)}}</p>

      <v-btn outlined @click="handleError">
        Trang chủ
      </v-btn>
    </div>
  </v-app>
</template>

<script>
export default {
  layout: 'empty',
  props: {
    error: {
      type: Object,
      default: null
    }
  },
  methods: {
    messageError (status) {
      switch (status) {
        case 401:
          return 'Bạn hãy đăng nhập để sử dụng chức năng này'
        case 404:
          return 'Không tìm thấy trang bạn yêu cầu'
        default:
          return 'Lỗi'
      }
    },
    handleError () {
      window.location.href = '/'
    }
  },
  head () {
    const title = 'Dethi.com - chia sẻ đề thi, tài liệu'
    return {
      title
    }
  }
}
</script>

<style scoped>
  .page_404 img {
    width: 100%;
  }

  .four_zero_four_bg {
    background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
    height: 400px;
    background-size: contain;
    background-position: center;
  }

  .four_zero_four_bg h1 {
    font-size: 80px;
  }

  .four_zero_four_bg h3 {
    font-size: 80px;
  }
  @media only screen and (max-width: 600px) {
    .four_zero_four_bg {
      height: 250px;
      margin-top: 30px;
    }
  }
</style>
