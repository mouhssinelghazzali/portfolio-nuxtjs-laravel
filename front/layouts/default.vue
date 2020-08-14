  <template>
  <div>
  <nav class="navbar navbar-expand-lg navbar-light   bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Hidden brand</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <nuxt-link  class="baz" to="/"> Home</nuxt-link>
      </li>
      <li class="nav-item">
          <nuxt-link  class="baz" to="/teams"> Teams</nuxt-link>
      </li>
      <li class="nav-item">
          <nuxt-link  class="baz" to="/our_works"> Our works</nuxt-link>
      </li>
      <li class="nav-item">
           <nuxt-link  class="baz" to="/clients"> Client</nuxt-link>
      </li>
                             <li class="nav-item">

      <NuxtLink class="baz"  to="/pages/1" >
                                About us
                            </NuxtLink>
                        </li>

                             <li class="nav-item">
                            <NuxtLink class="baz"  to="/pages/2" >
                                Privacy
                            </NuxtLink>
                        </li>
                        <li class="nav-item">
                            <NuxtLink class="baz"  to="/pages/3" >
                                Terms and condtions
                            </NuxtLink>
                        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
      <Nuxt />
      </div>
  </template>
    <script>
  export default {
  head() {
            return {
                title: 'app-web',
            }
        }
  }
  </script>
  <style scoped>
  .baz {
  color: white;
  padding: 5px;
}
  </style>

