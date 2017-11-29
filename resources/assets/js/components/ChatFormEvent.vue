<template>
    <div class="form">
        <div class="form-group row">
                    <div class="col-md-12">
                        <textarea id="btn-input" class="form-control" name="message" placeholder="Tulis komentar..." v-model="newMessage" @keyup.enter="sendMessage" rows="3"></textarea>
                    </div>
                    <span class="help-block">            
            </span>
        </div>
        <div class="form-group row">
            <div class="col-md-12 text-right">
                <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Kirim
            </button>
            </div>
        </div>
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

                this.newMessage = ''
            }
        }    
    }
</script>