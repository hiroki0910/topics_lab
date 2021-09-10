<template>
  <div id="nav">
    <router-link to="/">Home</router-link> |
    <template v-if="authenticated">
      <a>mypage</a>
    </template>
    <template v-else>
      <router-link to="/login">login</router-link>
    </template>
  </div>
  <div class="content">
    <router-view/>
  </div>
</template>

<script>
export default {
  data () {
    return {
      authenticated: false
    }
  },
  watch: {
    $route () {
      this.authenticated = localStorage.getItem('authenticated') === 'true'
    }
  }
}
</script>

<style lang="scss">
html, body {
  height: 100%;
  min-height: 100%;
}

body {
  margin: 0;
  background: linear-gradient(-135deg, #E4A972, #9941D8);
  background-attachment: fixed;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;

  .content {
    max-width: 600px;
    width: 100%;
    margin: 0 auto;
    padding: 0 20px;
    padding-bottom: 20px;
  }
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: purple !important;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
