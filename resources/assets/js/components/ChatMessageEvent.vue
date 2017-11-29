<template>

    <div class="chats">
                <div :class="message.position+' chat'" v-for="message in messages">
                  <div class="chat-avatar">
                    <a class="avatar avatar-online" data-toggle="tooltip" href="#" data-placement="left" title="" :data-original-title="message.name">
                      <img alt="..." :src="'/uploads/user/images/'+message.image">
                      <i></i>
                    </a>
                  </div>
                  <div class="chat-body">
                    <div class="chat-content">                        
                        <b>{{message.name}}</b>
                      <p>
                        {{message.comment}}
                      </p>
                      <time class="chat-time" datetime="2015-07-01T11:37">{{message.date}}</time>
                    </div>
                  </div>
                </div>                
              </div>
</template>

<script>
  export default {
    props: ['messages']
  };
</script>