<template>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item active">
                <Link v-if="data.prev_page_url" :href="data.prev_page_url" class="page-link" preserve-state
                    preserve-scroll> Voltar </Link>
            </li>
            <li class="page-item" v-for="link in cleanLinks" :key="link.label" :class="{ 'active': link.active }">
                <Link :href="link.url" class=" page-link" preserve-state preserve-scroll> {{ link.label }} </Link>
            </li>
            <li class="page-item active">
                <Link v-if="data.next_page_url" :href="data.next_page_url" class="page-link " preserve-state
                    preserve-scroll>Próximo</Link>
            </li>
        </ul>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    name: "Pagination",
    components: { Link },
    props: {
        data: Object,
    },
    computed: {
        cleanLinks() {
            const cleanLinks = [...this.data.links];
            cleanLinks.shift();
            cleanLinks.pop();
            return cleanLinks;
        },

    }

};
</script>
