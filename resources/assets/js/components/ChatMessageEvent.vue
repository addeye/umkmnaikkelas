<template>
  <div class="chats">
  <div class="chat" v-for="message in messages">
  <li :class="message.position_text+' clearfix'"><span :class="'chat-img '+message.position">
                            <img :src="message.image" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong :class="message.position+' primary-font'">{{message.name}}</strong>
                                    <small :class="message.position_time+' text-muted'">
                                        <span class="glyphicon glyphicon-time"></span>{{message.date}}
                                      </small>
                                </div>
                                <br>                                
                                    <p :class="message.position">{{message.comment}}</p>
                            </div>                            
                        </li>
                    </div>
                  </div>
</template>

<script>
  export default {
    props: ['messages']
  };
</script>