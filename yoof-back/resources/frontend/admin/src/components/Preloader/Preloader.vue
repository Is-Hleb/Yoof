<template>
    <div>
        <a-spin size="large" class="preloader">
        </a-spin>
    </div>
</template>

<script>
export default {
    name: "Preloader"
}
</script>

<style scoped>
.preloader {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

</style>
