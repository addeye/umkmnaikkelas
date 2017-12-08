<template>
    <div class="input-group">
    <input id="btn-input" class="form-control" name="message" placeholder="Tulis komentar..." v-model="newMessage" @keyup.enter="sendMessage"/>
    <span class="input-group-btn">
    <button class="btn btn-warning btn-sm" id="btn-chat" @click="sendMessage">Kirim</button>
                    </span>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                var event_follower_id = document.getElementById('event_follower_id').value;
                var event_id = document.getElementById('event_id').value;

                this.$emit('messagesentevent', {
                    event_id: event_id,
                    event_follower_id: event_follower_id,
                    comment: this.newMessage
                });

                this.newMessage = '';                
            }
        }    
    }
</script>