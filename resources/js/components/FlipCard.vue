<template>
    <div class="flip-card" @click="flipCard">
        <div class="flip-card-inner" :class="{ flipped: isFlipped }">
            <div class="flip-card-front">
                <img src="path_to_front_image.jpg" alt="Front Image">
            </div>
            <div class="flip-card-back">
                <img src="path_to_back_image.jpg" alt="Back Image">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isFlipped: false
        };
    },
    methods: {
        flipCard() {
            this.isFlipped = !this.isFlipped;
        }
    }
}
</script>

<style scoped>
.flip-card {
    perspective: 1000px;
    width: 200px;
    height: 300px;
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transition: transform 0.6s;
    transform-style: preserve-3d;
}

.flipped {
    transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
}

.flip-card-back {
    transform: rotateY(180deg);
}
</style>
