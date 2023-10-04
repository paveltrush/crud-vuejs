<template>
    <button @click="makeExport" :disabled="buttonDisable" :class="{ 'bg-gray-400': buttonDisable }"
            class="px-6 py-3 bg-blue-400 rounded-md text-white font-medium tracking-wide hover:bg-gray-400 ml-3">Export
    </button>
</template>

<script>
export default {
    mounted() {
        window.Echo.channel('export-channel')
            .listen('ProductsExportEvent', (data) => {
                const blob = new Blob([data.csvContent], {type: 'text/csv'});
                const link = document.createElement('a');

                link.href = window.URL.createObjectURL(blob);
                link.download = 'products.csv';

                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                this.buttonDisable = false;
            })
    },
    data() {
        return {
            buttonDisable: false
        }
    },
    methods: {
        makeExport() {

            if (!this.buttonDisable) {
                axios.post('/products-export', {})
                    .then((response) => {
                        console.log('success', response)
                    })
                    .catch((error) => {
                        console.log('error', error)
                    })
            }

            this.buttonDisable = true;
        }
    }
}
</script>
