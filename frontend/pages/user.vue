<template>
  <div>
    <NuxtChild />
  </div>
</template>

<script>
export default {
  layout: 'user',
  middleware: 'auth'
}
</script>
<style>

</style>
