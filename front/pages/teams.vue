<template>
    <div class="container">
        <div>
            <h1>
                Teams
                ({{ total }})
            </h1>
            <p>
                we are creative team
            </p>
            <br/>


                <div span="4" v-for="row in rows" :key="row.id">

                        <div style="text-align:center">
                            <img :src="$images(row.image)" size="large"/>
                            <h3>{{ row.name }}</h3>
                            <p>{{ row.job_tilte }}</p>
                            <template v-if="row.facebook">
                                <NuxtLink :to="row.facebook">
                                    facebook
                                </NuxtLink>
                            </template>
                            <template v-if="row.LinkedIn">
                                <NuxtLink :to="row.LinkedIn">
                                  LinkedIn
                                </NuxtLink>
                            </template>
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
                let url = process.env.moduleUrl + 'teams';
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
