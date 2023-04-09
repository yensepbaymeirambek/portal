<template>
    <div>
        <Kalendar></Kalendar>
    </div>
</template>

<script>
import { Kalendar } from 'kalendar-vue';

export default {
    components: {
        Kalendar,
    },
    data() {
        return {
            message: 'Hello, Vue!'
        }
    }
}
</script>
