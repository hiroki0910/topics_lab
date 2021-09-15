<template>
  <div>
    <Card>
      <template #title>
        マイページ
      </template>
      <template #content>
        {{user.name}}
      </template>
      <template>
    <div class="p-tabview p-component">
        <ul ref="nav" class="p-tabview-nav" role="tablist">
            <li role="presentation" v-for="(tab, i) of tabs" :key="tab.header || i" :class="[{'p-highlight': (tab.d_active), 'p-disabled': tab.disabled}]">
                <a role="tab" class="p-tabview-nav-link" @click="onTabClick($event, tab)" @keydown="onTabKeydown($event, tab)" :tabindex="tab.disabled ? null : '0'" :aria-selected="tab.d_active" v-ripple>
                    <span class="p-tabview-title" v-if="tab.header">{{tab.header}}</span>
                    <TabPanelHeaderSlot :tab="tab" v-if="tab.$scopedSlots.header" />
                </a>
            </li>
            <li ref="inkbar" class="p-tabview-ink-bar"></li>
        </ul>
        <div class="p-tabview-panels">
            <slot></slot>
        </div>
    </div>
</template>
      <template #footer>
        <Button label="トピックを作る" v-on:click="toNewTopic" />
        <Button label="ログアウト" class="p-button-warning" v-on:click="logout" />
        <Button label="取り消す" class="p-button-danger" v-on:click="withdraw" />
      </template>
    </Card>
  </div>
</template>

<script>
import axios from '@/supports/axios'

export default {
  name: 'Userself',
  data () {
    return {
      user: {}
    }
  },
  mounted () {
    if (localStorage.getItem('authenticated') !== 'true') {
      this.$router.push('login')
      return
    }

    this.getUser()
  },
  methods: {
    toNewTopic () {
      this.$router.push('topic')
    },
    logout () {
      axios.get('/sanctum/csrf-cookie')
        .then(() => {
          axios.post('/api/logout')
            .then(res => {
              console.log(res)
              localStorage.setItem('authenticated', 'false')
              this.$router.push('/login')
            })
            .catch(err => {
              console.log(err)
            })
        })
        .catch((err) => {
          alert(err)
        })
    },
    withdraw () {
      //
    },
    getUser () {
      axios.get('/sanctum/csrf-cookie')
        .then(() => {
          axios.get('/api/user')
            .then((res) => {
              if (res.status === 200) {
                this.user = res.data
              } else {
                console.log('取得失敗')
              }
            })
        })
        .catch((err) => {
          alert(err)
        })
    }
  }
}
</script>

<style lang="scss" scoped>
.p-card-footer {
  .p-button {
    margin-right: 10px;
  }
}
</style>
