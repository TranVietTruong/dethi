export default function ({ store, redirect }) {
  if (store.getters['auth/user/authenticated']) {
    return redirect('/')
  }
}
