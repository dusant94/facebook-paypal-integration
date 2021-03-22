<template>
<div class="chat-app">
      <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
    <ContactsList :contacts="contacts" @selected="startConversationWith"/>
</div>
</template>
<script>
import Conversation from './Conversation';
import ContactsList from './ContactsList';
        var socket = io('http://localhost:3000');

 export default {
    props: {
        user:{
            type:Object,
            required:true
        }
    },
    data() {
        return {
            selectedContact :  null,
            messages : [],
            contacts : [],
        };
    },
    mounted() {
          let self = this;
        socket.on(
      "private-messages." + this.user.id + ":App\\Events\\NewMessage",
      function(data) {
         self.handleIncoming(data.message);
      }
    );
        //   window.Echo.private(`messages.${this.user.id}`)
        //     .listen('NewMessage', e => {
        //         console.log(e.message);
        //           this.handleIncoming(e.message);
        //     });


         axios.get('/contacts')
            .then((response)=> {
              this.contacts= response.data;
        });
                this.setUser();

    },

    methods:{
        setUser(){
            this.$store.state.user = this.user;
        },
        startConversationWith(contact){
            this.$store.state.message = false;
            this.updateUnreadCount(contact, true);
            axios.get('/conversation/'+contact.id)
            .then((response)=>{
                  this.messages = response.data;
                this.selectedContact = contact;
            });
        },
        saveNewMessage(message){
            this.messages.push(message);
          },
        handleIncoming(message){
            if(this.selectedContact && message.from == this.selectedContact.id){
            this.saveNewMessage(message);
            return;
            }
            this.updateUnreadCount(message.from_contact, false);
             },
        updateUnreadCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {
                    if (single.id !== contact.id) {
                        return single;
                    }

                    if (reset)
                        single.unread = 0;
                    else
                        single.unread += 1;

                    return single;
                })
            },




    },

components: {Conversation, ContactsList}
}
</script>
<style lang="scss" scoped>
.chat-app {
    display: flex;
}
</style>
