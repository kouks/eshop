<template>
  <div class="banner-content">
    <h1 class="title is-main has-color-primary">h&amp;p</h1>
    <h2 class="subtitle is-3">The online store.</h2>

    <form class="global-search" action="/products/search" method="GET">
      <input
      class="global-search-input"
      type="text"
      name="query"
      placeholder="Type anything..."
      ></input>

      <button class="global-search-button" type="submit">Go!</button>
    </form>
  </div>
</template>

<script>
export default {
  //
}
</script>
