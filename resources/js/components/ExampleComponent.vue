 <template>
 <div class="container" >
     <nav aria-label="Page navigation example">
     <ul class="pagination">

                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                    <a class="page-link" href="#" v-on:click="loadProducts(pagination.prev_page_url)">Previous</a></li>
                    <li class="page-item disabled"><a class="page-link text-dark" href="#">{{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>

                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                  <a class="page-link" href="#" v-on:click="loadProducts(pagination.next_page_url)">Next</a></li>
                    </ul>
                    </nav>
            <div class="container text-center" v-for="product in products" v-bind:key="product.id">


                <div  class="card mb-4 shadow-sm  " style="width: 18% ;float: left;margin: 10px;">

                    <div class="card-header">
                      <h4 class="my-0 font-weight-normal">{{product.name}}</h4>
                    </div>
                    <div class="card-body">
                      <h1 class="card-title pricing-card-title">{{product.price}} <small class="text-muted">  $</small></h1>

                    <button  class="btn btn-lg btn-block btn-outline-primary"  @click="deleteProduct(product.id)" > Delete from chart</button>
                    </div>

                </div>
            <!-- </form> -->

            </div>

            </div>

</template>

<script>
    export default {
        props: ['id','token'],
        data: function(){
            return {
                products: [],
                pagination:{},
                 config: {
            headers: {
              Authorization: 'Bearer ' + this.token,
              Accept: 'application/json'
            }
           },


            };
        },

        mounted() {
            this.loadProducts();
            // this.loadtokens();
        },
        methods:{
    //         loadtokens: function(){


    //     axios.get('/api/user',this.config)
    // .then(response => {
    //     console.log(response.data);
    // });},

            loadProducts:function(page_url){
                page_url=page_url || '/api/products/'+this.id;

                 axios.get(page_url,this.config)


                .then((response)=>{
                this.products=response.data.data;
                 this.makePagination(response.data.meta,response.data.links);
                                // console.log(response.data);

            })
            .catch(function(error){
                console.log(error);

            });
            },
            makePagination: function(meta,links){
                let pagination={

                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev,
                    };
                    this.pagination = pagination;
            },
            deleteProduct: function(id){
                    if(confirm('Are You Sure')){
                        axios.delete('/api/product/'+id,this.config


                        )

                        // .then(response => console.log(response))
                        .then(data => {

                            console.log(data);
                        this.loadProducts('/api/products/'+this.id + '?page='+this.pagination.current_page);
                        })
                         .catch(function(error){
                          console.log(error);

            });


                    }
            }

            }
        }


</script>
