<template>
  <div>
    <div class="container">
  <div class="row">
         <h1>
                Clients
                ({{ total }})
            </h1>
    <div class="col" v-for="row in rows" :key="row.id">
    <div class="">
   <div class="card" >
        <div class="card-header">
          City Breaks
        </div>
        <div class="card-body">

      <img :src="'http://localhost:8000/storage/'+row.image" width="20%" alt="">
      <img :src="$images(row.image,'cropped')" width="20%" alt="">

        </div>
      </div>
      </div>
      </div>
      </div>
      </div>

<template v-if="currentPage != lastPage ">
   <vs-button relief loading @click="fetchData" v-if="!loading">
          <i class='bx bxs-cart-alt' >Products</i>
        </vs-button>
         <vs-button relief  @click="fetchData" v-else>
          <i class='bx bxs-cart-alt' >Products</i>
        </vs-button>
</template>
      </div>

</template>


<script>
 //import CubeSpin from 'vue-loading-spinner/components/Cube'
 export default {

    data:() => {
      return {
        rows: [],
        lastPage: 1,
        loading: false,
        nextUrl:'',
        currentPage:0,
        next_page_url:'',
        total: 0,

      }
    },
    mounted()
    {
      this.fetchData()
    },
    methods:{
       fetchData(){
         this.loading = true;
         let url = process.env.moduleUrl +"client";
         if(this.nextUrl !==''  && this.nextUrl != null ){
           url = this.nextUrl;
         }
    this.$axios.$get(url).then((res) => {
          if(this.rows.length > 0)
          {
            this.rows = [...this.rows , ...res.payload.data]
          }
          else{
            this.rows = res.payload.data;
          }
          this.nextUrl = res.payload.next_page_url;
          this.lastPage = res.payload.last_page;
          this.currentPage = res.payload.current_page;
          this.total = res.payload.total;
          this.rows = res.payload.data;
    })


      }
    }
  }
  </script>
</script>

<style>

</style>

