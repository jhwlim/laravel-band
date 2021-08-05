<template>
    <v-img
        :src="imgSrc"
        width="100%"
        aspect-ratio="1"
        class="rounded-xl"
    ></v-img>
</template>

<script>
export default {
    name: "GroupImage",
    props: ['src'],
    computed: {
        imgSrc() {
            return `/storage/${this.src}`;
        }
    }
}
</script>

