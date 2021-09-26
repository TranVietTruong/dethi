export default function ({ $axios, $cookies }) {
  $axios.onError((error) => {
    if (error.response.status === 401) {
      $cookies.remove('access_token')
    }
  })
}
