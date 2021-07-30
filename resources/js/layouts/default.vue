<template>
  <div class="main-layout">

    <div class="main-panel">
      <navbar />
      <sidebar />

      <child />
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'
import Sidebar from '~/components/Sidebar'

export default {
  name: 'MainLayout',

  components: {
    Navbar,
    Sidebar
  }
}
</script>
