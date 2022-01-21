<template>
    <div class="plans">
    <b-card bg-variant="light" :header=description class="text-center">
        <b-card-text>{{title}}</b-card-text>
      </b-card>
    </div>
</template>
<script>
export default {
    name:'Plans',
    props:['title', 'description']
}
</script>
<style>

</style>