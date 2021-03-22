<template>
<div class="mx-auto w-50" ref="paypal">

</div>
</template>
<script>
export default {
    data: function(){
        return{

        }
    },
    mounted: function(){
        const script=document.createElement("script");
        script.src ="https://www.paypal.com/sdk/js?client-id=AV92ckXko-iARrO7C58FwcAXmgih3bRxZmaFQ6xf4AMyxPrmfXhK5RXfQJe6U2FDa3LepzxAMMkIyxJu" ;
        script.addEventListener("load",this.setLoaded);
        document.body.appendChild(script);
    },


    methods:{
        setLoaded: function(){
            window.paypal
            .Buttons({
                   createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }]
      });
    },
        onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
    }).render(this.$refs.paypal);



        }

    }
}
</script>
