<template>
<div v-if="getMessage">
  <button class="btn btn-default"  id="myBtn" type="button"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-chat-left-dots-fill" fill="#3390FB" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
             </button>
            <ul class="dropdown-menu" >
                  <li v-for="contact in sortedContacts(contacts)" :key="contact.id" >
                <div class="contact" v-if="contact.unread">
                      <a class="dropdown-item" href="/user/chat" @click="setSelected(contact)">{{contact.email}} ---> {{contact.unread}} </a>
                     <div class="dropdown-divider"></div>
                  </div>
                </li>
            </ul>
            </div>

</template>
<script>
export default {
  props: {
        user:{
            type:Object,
            required:true
        },
  },
    data() {
        return {
            contacts: [],
          };
    },
   mounted(){
          window.Echo.private(`messages.${this.user.id}`)
            .listen('NewMessage', e => {

                          this.setMessage();
            });
             axios.get('/contacts')
            .then((response)=> {
               this.contacts= response.data;
                       this.setMessage();

        });

     },
    computed: {
        getMessage() {
          return this.$store.getters.getMessageFormGetters;
        },


    },

    methods: {
        setMessage(){

             this.contacts.map((single) => {
              if(single.unread){
             this.$store.state.message = true;
             return;
            }
            return;
           })


        },


        setSelected(contact){
              this.$store.state.selected = contact;
        },
  sortedContacts(contacts){

                return _.sortBy(this.contacts,[(contact) => {
                    if(contact == this.selected){
                        return Infinity;
                    }
                    return contact.unread;
                }]).reverse();
            },
    }

}
</script>
