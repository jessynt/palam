<template>
    <div class="spinner-box" v-show="loading">
        <div class="spinner-inner">
            <div class="la-ball-beat">
                <div :style="spinner_style"></div>
                <div :style="spinner_style"></div>
                <div :style="spinner_style"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'loading',
        props: {
            loading: {
                type: Boolean,
                default: true
            },
            color: {
                type: String,
                default: '#1B813E'
            },
            height: {
                type: String,
                default: '15px'
            },
            width: {
                type: String,
                default: '15px'
            },
            margin: {
                type: String,
                default: '5px'
            }
        },
        data () {
            return {
                spinner_style: {
                    backgroundColor: this.color,
                    height: this.height,
                    width: this.width,
                    margin: this.margin
                }
            }
        }
    }
</script>
<style lang="scss" rel="stylesheet/scss" scoped>
    @import '../../../../sass/home/mixins.scss';
    @import '../../../../sass/home/variables.scss';

    .spinner-box {
        position: relative;
        width: 100%;
        min-height: 50px;
        height: 100%;
        > .spinner-inner {
            width: 80px;
            height: 30px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -40px;
            margin-top: -15px;
            > .la-ball-beat {
                display: block;
                font-size: 0;
                color: #fff;
                width: 80px;
                height: 30px;
                > div {
                    display: inline-block;
                    width: 15px;
                    height: 15px;
                    margin: 5px;
                    background-color: $module-hover-bg;
                    @include css3-prefix(animation, ball-beat 0.86s -0.15s infinite linear);
                    &:nth-child(2n-1) {
                        @include css3-prefix(animation-delay, -.5s);
                    }
                }
            }
        }
    }

    @include keyframes(ball-beat) {
        50% {
            opacity: .2;
            @include css3-prefix(transform, scale(0.75));
        }
        100% {
            opacity: 1;
            @include css3-prefix(transform, scale(1));
        }
    }
</style>