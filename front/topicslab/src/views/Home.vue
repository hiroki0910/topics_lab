<template>
  <div class="home">
    <div class="top-logo">
      <img alt="logo" src="../assets/logo.png">
      <span class="message">社会課題について、みんなで話し合おう！</span>
    </div>
    <AllTopics />
  </div>
</template>

<script>
import AllTopics from '@/components/AllTopics'

export default {
  name: 'Home',
  components: {
    AllTopics
  }
}
</script>

<style lang="scss" scoped>
.top-logo {
  display: block;
  margin: 0 auto;
  margin-bottom: 20px;
  text-align: center;
  img {
    width: 200px;
    height: auto;
  }
  .message {
    display: block;
    font-weight: bold;
    color: white;
  }
}
</style>
