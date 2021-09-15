<template>
  <div>
    <Fieldset v-for="comment in comments" :key="comment.id">
      <template #legend>
        <span>{{comment.user.name}}</span>
      </template>
      <div class="comment-text">
        {{comment.body}}
      </div>
      <Button icon="pi pi-heart" class="p-button-rounded p-button-help" input type="submit" onclick="alert ('『いいね♥』をありがとう！');" id="btn_1"/>
    </Fieldset>
  </div>
</template>

<script>
export default {
  name: 'Comments',
  props: {
    comments: Array
  },
  buttonClick () {
    alert('click')
    const button = document.getElementById('btn_1')
    button.addEventListener('click', 'buttonClick')
  }
}
</script>

<style lang="scss" scoped>
.p-fieldset {
  margin-top: 20px;
}

.comment-text {
  white-space:pre-wrap;
}

#btn_1 {
  margin-bottom: -4.5%;
  margin-left: -2.5%;
}
</style>
