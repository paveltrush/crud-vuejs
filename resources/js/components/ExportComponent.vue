<template>
    <button @click="makeExport" class="px-6 py-3 bg-blue-400 rounded-md text-white font-medium tracking-wide hover:bg-gray-400 ml-3">Export</button>
</template>

<script>
export default {
    mounted() {
        window.Echo.channel('export-channel')
            .listen('ProductsExportEvent', (e) => {
                console.log('test successful ' + e)
            })
    },
    methods: {
        makeExport(){
            axios.post('/products-export', {})
                .then((response) => {console.log('response', response)})
                .catch((error) => {console.log('error', error)});
        }
    }
}
</script>
