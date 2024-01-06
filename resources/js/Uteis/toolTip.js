import { ref, onMounted } from "vue";

export default function useTooltip(elementRef, options) {

    onMounted(() => {
        const element = elementRef.value;
        if (element) {
            new bootstrap.Tooltip(element, options);
         }
        });

    return {
        elementRef,
    };
}
