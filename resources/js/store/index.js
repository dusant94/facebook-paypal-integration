

export default {
 	state: {
         message : false,
         user:{
             type:Object,
             required:true},
         contacts:{
             type:Array,
             default:[]
         },
         selected: null,

	},

	getters: {
        getMessageFormGetters(state){
            return state.message;
        },
        getUserFromGetters(state){
            return state.user;
        },
        getContactsFormGetters(state){
            return state.contacts;
        },


    },



}

