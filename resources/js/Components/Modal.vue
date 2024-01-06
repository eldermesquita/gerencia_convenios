<template>
    <div class="modal fade" :id="`${modalId}`" tabindex="-1" aria-modal="true" aria-hidden="true" role="dialog"
        :aria-labelledby="`modalLabel-${modalId}}`">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" :id="`modalLabel-${modalId}}`">{{ title }} {{ modalId }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <slot></slot>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        @click="closeModal()">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        modalId: {
            type: String,
            required: true,
        },
        title: {
            type: String,
            default: 'Modal Title',
        },
    },
    methods: {
        closeModal() {
            // Feche o modal manualmente
            const modal = new bootstrap.Modal(document.getElementById(this.modalId));
            modal.hide();
        },
    },
};
</script>
