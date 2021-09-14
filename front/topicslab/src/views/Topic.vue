<template>
  <div>
    <Card>
      <template #title>
        {{topic.title}}
      </template>
      <template #footer>
        <Button icon="pi pi-heart" class="p-button-rounded p-button-help" input type="submit" onclick="alert ('『いいね♥』をありがとう！');" id="btn_1"/>
        <span>
          <router-link :to="`/user/${user.id}`">{{user.name}}</router-link>
        </span>
      </template>
    </Card>
    <Comments :comments="this.comments" />
    <CommentForm :topicId="this.topic.id" @sentComment="receiveComment" />
  </div>
</template>

<script>
import axios from '@/supports/axios'
import Comments from '@/components/Comments'
import CommentForm from '@/components/CommentForm'

export default {
  name: 'Topic',
  components: {
    Comments,
    CommentForm
  },
  data () {
    return {
      topic: {},
      user: {},
      comments: [],
      id: null
    }
  },
  mounted () {
    this.id = this.$route.params.id
    if (!this.id) {
      alert('不正なIDです。')
    }
    this.getTopic()
  },
  methods: {
    getTopic () {
      axios.get('/sanctum/csrf-cookie')
        .then(() => {
          axios.get(`/api/topic/${this.id}`)
            .then((res) => {
              if (res.status === 200 && res.data.length === 1) {
                this.topic = res.data[0]
                this.user = this.topic.user
                this.comments.splice(0)
                this.comments.push(...this.topic.comments)
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
    },
    receiveComment (comment) {
      this.comments.push(comment)
    }
  },
  buttonClick () {
    alert('click')
    const button = document.getElementById('btn_1')
    button.addEventListener('click', 'buttonClick')
  }
}
</script>

<style scoped>
.body-text {
  white-space:pre-wrap;
  padding-bottom: 13%;
}
.p-card-footer span {
  text-align: right;
  display: block;
}
#btn_1{
  position: absolute;
  margin-bottom: 15px;
  margin-left: 25%;
}
</style>
