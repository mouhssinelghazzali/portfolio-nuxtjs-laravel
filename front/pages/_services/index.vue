<template>
    <div class="container" >
        <div>
            <h1>
                Services
                ({{ total }})
            </h1>
            <p>
                Happy for us
            </p>
            <br/>


<div class="card" style="width: 18rem;" v-for="row in rows" :key="row.id">

    <img class="card-img-top"  :src="$images(row.image)" >
  <div class="card-body">
    <NuxtLink :to="'/services/'+row.id ">
     <h5 class="card-title">{{ row.name }}</h5>
</NuxtLink>
  </div>
</div>
            <template v-if="currentPage != lastPage">
                <Button type="primary" :loading="loading" @click="fetchData">
                    <span v-if="!loading">Click me!</span>
                    <span v-else>Loading...</span>
                </Button>
            </template>
        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                rows: [],
                loading: false,
                lastPage: 1,
                nextUrl: '',
                currentPage: 1,
                total: 0
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.loading = true;
                let url = process.env.moduleUrl + 'services';
                if (this.nextUrl !== '' && this.nextUrl != null) {
                    url = this.nextUrl;
                }
                this.$axios.$get(url).then((res) => {
                    if (this.rows.length > 0) {
                        this.rows = [...this.rows, ...res.payload.data];
                    } else {
                        this.rows = res.payload.data;
                    }
                    this.nextUrl = res.payload.next_page_url;
                    this.lastPage = res.payload.last_page;
                    this.currentPage = res.payload.current_page;
                    this.total = res.payload.total;
                    this.loading = false;
                })
            }
        }
    }
</script>

