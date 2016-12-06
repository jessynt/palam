<template>
    <div class="loader">
        <div class="inner one"></div>
        <div class="inner two"></div>
        <div class="inner three"></div>
    </div>
</template>

<style lang="scss" rel="stylesheet/scss" scoped>
    @import '../../../../sass/home/mixins.scss';
    @import '../../../../sass/home/variables.scss';

    .loader {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        perspective: 800px;
        margin-left: 50%;
        .inner {
            position: absolute;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
        .inner.one {
            left: 0;
            top: 0;
            @include css3-prefix(animation, rotate-one 1s infinite linear);
            border-bottom: 3px solid #000000;
        }

        .inner.two {
            right: 0;
            top: 0;
            @include css3-prefix(animation, rotate-two 1s infinite linear);
            border-right: 3px solid #000000;
        }

        .inner.three {
            right: 0;
            bottom: 0;
            @include css3-prefix(animation, rotate-three 1s infinite linear);
            border-top: 3px solid #000000;
        }
    }

    @keyframes rotate-one {
        0% {
            @include css3-prefix(transform, rotateX(35deg) rotateY(-45deg) rotateZ(0deg));
        }
        100% {
            @include css3-prefix(transform, rotateX(35deg) rotateY(-45deg) rotateZ(360deg));
        }
    }

    @keyframes rotate-two {
        0% {
            @include css3-prefix(transform, rotateX(50deg) rotateY(15deg) rotateZ(0deg));
        }
        100% {
            @include css3-prefix(transform, rotateX(50deg) rotateY(10deg) rotateZ(360deg));
        }
    }

    @keyframes rotate-three {
        0% {
            @include css3-prefix(transform, rotateX(35deg) rotateY(55deg) rotateZ(0deg));
        }
        100% {
            @include css3-prefix(transform, rotateX(35deg) rotateY(55deg) rotateZ(360deg));
        }
    }
</style>
<script>
    export default {
        name: 'loading'
    }
</script>
