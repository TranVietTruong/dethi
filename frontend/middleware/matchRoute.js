export default function ({ route, redirect }) {
  if (Object.keys(route.query).length === 0) {
    return redirect('/')
  }
}
