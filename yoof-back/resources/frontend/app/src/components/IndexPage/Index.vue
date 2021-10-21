<template>
    <div>
        <Header />

    </div>
</template>

<script>
import Header from '../Templates'

export default {
    name: 'Index',
    components: {
        Header,
    },
    props: {
        msg: String
    },
    data() {
        return {

        }
    },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="css" src="./assets/main.css">
</style>
