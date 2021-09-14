<template>
  <Card>
    <template #title>
      新しいTopicを投稿しよう
    </template>
    <template #content>
     <div class="p-field">
        <label for="title">トピックタイトル</label>
        <InputText v-model="title" id="title" type="text" aria-describedby="title-help" />
        <small id="title-help">タイトルを入力してください。</small>
        <span class="attention">{{messages.title}}</span>
      </div>
      <div class="p-field">
        <label for="title">トピック内容</label>
        <Textarea v-model="body" :autoResize="true" rows="10" />
        <span class="attention">{{messages.body}}</span>
      </div>
      <div class="p-field">
        <Button icon="pi pi-check" label="Save" v-on:click="submit" />
        <span class="attention">{{messages.submit}}</span>
      </div>
    </template>
  </Card>
</template>

<script>
import axios from '@/supports/axios'

export default {
  name: 'NewTopic',
  data () {
    return {
      title: '',
      body: '',
      messages: {
        submit: '',
        title: '',
        body: ''
      }
    }
  },
  mounted () {
    if (localStorage.getItem('authenticated') !== 'true') {
      this.$router.push('login')
    }
  },
  methods: {
    submit () {
      const title = this.title.trim()
      if (!title) {
        this.messages.title = '未記入(空白のみ)は送信できません。'
      }
      const body = this.body.trim()
      if (!body) {
        this.messages.body = '未記入(空白のみ)は送信できません。'
      }

      if (!title || !body) return

      axios.get('/sanctum/csrf-cookie')
        .then(() => {
          axios.post('/api/topic', {
            title: title,
            body: body
          })
            .then((res) => {
              if (res.status === 201) {
              //
              } else {
                this.messages.submit = '送信に失敗しました。'
              }
            })
            .catch((err) => {
              console.log(err)
              this.messages.submit = '送信に失敗しました。'
            })
        })
        .catch((err) => {
          alert(err)
        })
    }
  }
}
</script>

<style scoped>
.p-field * {
  display: block;
  width: 100%;
}

.p-field span {
  color: #F30;
  font-weight: bolder;
  padding-top: 10px;
  padding-bottom: 10px;
}
</style>
