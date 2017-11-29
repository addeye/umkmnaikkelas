
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
// Vue.component('notification', require('./components/Notification.vue'));
Vue.component('chat-messages-event', require('./components/ChatMessageEvent.vue'));
Vue.component('chat-form-event', require('./components/ChatFormEvent.vue'));

const app = new Vue({
    el: '#appEvent',

    data: {
        messages: []
    },

    created() {                
        if (document.getElementById('event_id')) {
            var event_id = document.getElementById('event_id').value;
            this.fetchMessages(event_id);
        }
    	
    	
        Echo.private('chat-event-'+event_id)
          .listen('MessageSentEvent', (e) => {
            this.messages.push(e.event_discuss);
            console.log(e.event_discuss);
            console.log('deye');
            toastr.info('Pesan dari '+e.event_discuss.name);
          });
    },

    methods: {
        fetchMessages(id_event) {
            axios.get('/event-diskusi-get/'+id_event).then(response => {
                this.messages = response.data.data;
                console.log(response.data.data);	
            });
        },

        addMessage(message) {           
            axios.post('/event-diskusi-chat', message).then(response => {
              console.log(response.data);
              this.messages.push(response.data.data)
            });
        }
    }
});
