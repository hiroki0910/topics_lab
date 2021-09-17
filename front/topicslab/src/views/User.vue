<template>
  <div>
    <Card>
      <template #title>
        {{user.name}}
      </template>
      <template #content>
        <div class="tab_container">
          <input id="tab1" type="radio" name="tab_item" checked>
          <label class="tab_item" for="tab1">投稿</label>
          <input id="tab2" type="radio" name="tab_item" checked>
          <label class="tab_item" for="tab2">コメント</label>
          <div class="tab_content" id="tab1_content" checked>
            <div class="tab_content_description">
              <p class="c-txtsp">投稿した内容</p>
            </div>
          </div>
          <div class="tab_content" id="tab2_content">
            <div class="tab_content_description">
              <p class="c-txtsp">コメントした内容</p>
            </div>
          </div>
        </div>
      </template>
    </Card>
  </div>
</template>

<script>
import axios from '@/supports/axios'

export default {
  name: 'user',
  data () {
    return {
      id: null,
      user: {}
    }
  },
  mounted () {
    if (localStorage.getItem('authenticated') !== 'true') {
      this.$router.push({ path: '/login' })
      return
    }

    this.id = this.$route.params.id
    if (!this.id) {
      alert('不正なIDです。')
    }
    this.getUser()
  },
  methods: {
    getUser () {
      axios.get('/sanctum/csrf-cookie')
        .then(() => {
          axios.get(`/api/user/${this.id}`)
            .then((res) => {
              console.log(res)
              if (res.status === 200) {
                this.user = res.data[0]
              } else {
                console.log('取得失敗')
              }
            })
            .catch((err) => {
              console.log(err)
            })
        })
        .catch((err) => {
          alert(err)
        })
    }
  }
}
</script>
<style>
.tab_container {
  background-color: #fff;
}
.tab_item {
  width: 100px;
  height: 40px;
  padding:15px 0;
  border-bottom: 3px solid #37beb0 ;
  background-color: #ececec;
  text-align: center;
  color: #37beb0 ;
  display: block;
  float: left;
  text-align: center;
  font-size: 12px;
  font-weight: bold;
  transition: all 0.2s ease;
}
.tab_item:hover {
  opacity: 0.75;
}
input[name="tab_item"] {
  display: none;
}
.tab_content {
  display: none;
  padding: 1em 1em 0;
  clear: both;
  overflow: hidden;
}
#tab1:checked ~ #tab1_content,
#tab2:checked ~ #tab2_content {  /*, #tab3:checked ~ #tab3_content , #tab4:checked ~ #tab4_contentを削除*/
  display: block;
}
.tab_container input:checked + .tab_item {
  background-color: #37beb0 ;
  color: #fff;
}
</style>
